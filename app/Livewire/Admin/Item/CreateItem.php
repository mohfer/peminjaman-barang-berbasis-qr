<?php

namespace App\Livewire\Admin\Item;

use App\Models\Item;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CreateItem extends Component
{
    public $title = 'Create Item';

    public $borrow_qr;
    public $return_qr;

    #[Validate('required|unique:items,code')]
    public $code, $name;

    #[Validate('required')]
    public $type, $qty;

    protected $token;

    public function save()
    {
        $this->code = strtoupper($this->code);
        $this->name = ucwords($this->name);

        $validatedData = $this->validate();

        $this->token = strtolower(Str::random(10));

        $validatedData['token'] = $this->token;
        Item::create($validatedData);

        $this->dispatch('showToast', 'Data created successfully!', 'success');

        $this->borrow_qr = URL::to('borrow/' . $this->token);
        $this->return_qr = URL::to('return/' . $this->token);

        session()->flash('qr');
    }

    public function download()
    {
        $name = strtoupper($this->name);
        $removeSpacingCapitalize = str_replace(' ', '_', $name);
        $finalName = $removeSpacingCapitalize . '_' . date('Y_m_d') . '.pdf';

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
