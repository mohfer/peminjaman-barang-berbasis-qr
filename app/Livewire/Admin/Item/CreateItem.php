<?php

namespace App\Livewire\Admin\Item;

use App\Models\Item;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CreateItem extends Component
{
    use WithFileUploads;

    public $title = 'Create Item';

    public $borrow_qr;
    public $return_qr;

    #[Validate('nullable|image|mimes:png,jpg,jpeg|max:2048')]
    public $image;

    #[Validate('required|unique:items')]
    public $code, $name;

    #[Validate('required')]
    public $type, $qty;

    protected $token;

    public function save()
    {
        $code = strtoupper($this->code);
        $cleanCode = str_replace([' ', '-'], '', $code);

        $this->code = $cleanCode;
        $this->name = ucwords($this->name);
        $this->token = strtolower(Str::random(10));

        $validatedData = $this->validate();

        $validatedData['token'] = $this->token;

        if ($this->image) {
            $filename = $this->code . '_' . $this->name . '.' . $this->image->extension();
            $this->image->storeAs('public/images/items', $filename);
            $validatedData['image'] = $filename;
        }

        Item::create($validatedData);

        $this->dispatch('showToast', 'Data created successfully!', 'success');

        $this->borrow_qr = URL::to('borrow/' . $this->token);
        $this->return_qr = URL::to('return/' . $this->token);

        session()->flash('qr');
    }

    public function download()
    {
        $name = strtoupper($this->name);
        $cleanName = str_replace(' ', '_', $name);
        $finalName = $cleanName . '_' . date('Y_m_d') . '.pdf';

        $qrCodeBorrow = base64_encode(QrCode::format('png')->size(256)->generate($this->borrow_qr));
        $qrCodeReturn = base64_encode(QrCode::format('png')->size(256)->generate($this->return_qr));

        $pdf = Pdf::loadView('pdf.qrcodes', compact('qrCodeBorrow', 'qrCodeReturn', 'name'));

        $this->clear();

        return response()->streamDownload(
            fn() => print($pdf->output()),
            $finalName
        );
    }

    public function clear()
    {
        $this->image = '';
        $this->code = '';
        $this->name = '';
        $this->type = '';
        $this->qty = '';
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.admin.item.create-item');
    }
}
