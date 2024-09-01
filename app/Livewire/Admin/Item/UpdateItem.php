<?php

namespace App\Livewire\Admin\Item;

use App\Models\Item;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UpdateItem extends Component
{
    public $title = 'Update Item';

    public $borrow_qr;
    public $return_qr;

    public $item, $code, $name, $type, $qty;

    protected $token;

    public function mount($token)
    {
        $this->item = Item::where('token', $token)->firstOrFail();
        $this->code = $this->item->code;
        $this->name = $this->item->name;
        $this->type = $this->item->type;
        $this->qty = $this->item->qty;
        $this->borrow_qr = URL::to('borrow/' . $this->item->token);
        $this->return_qr = URL::to('return/' . $this->item->token);
    }

    public function update()
    {
        $code = strtoupper($this->code);
        $cleanCode = str_replace([' ', '-'], '', $code);

        $this->code = $cleanCode;
        $this->name = ucwords($this->name);

        $validatedData = $this->validate([
            'code' => ['required', Rule::unique('items')->ignore($this->item->id)],
            'name' => ['required', Rule::unique('items')->ignore($this->item->id)],
            'type' => 'required',
            'qty' => 'required',
        ]);

        $this->item->update($validatedData);

        $this->dispatch('showToast', 'Data updated successfully!', 'success');
    }

    public function download()
    {
        $name = strtoupper($this->name);
        $removeSpacingCapitalize = str_replace(' ', '_', $name);
        $finalName = $removeSpacingCapitalize . '_' . date('Y_m_d') . '.pdf';

        $qrCodeBorrow = base64_encode(QrCode::format('png')->size(256)->generate($this->borrow_qr));
        $qrCodeReturn = base64_encode(QrCode::format('png')->size(256)->generate($this->return_qr));

        $pdf = Pdf::loadView('pdf.qrcodes', compact('qrCodeBorrow', 'qrCodeReturn', 'name'));

        return response()->streamDownload(
            fn() => print($pdf->output()),
            $finalName
        );
    }

    public function render()
    {
        view()->share('title', $this->title);
        return view('livewire.admin.item.update-item');
    }
}
