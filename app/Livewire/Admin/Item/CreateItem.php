<?php

namespace App\Livewire\Admin\Item;

use App\Models\Item;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CreateItem extends Component
{
    public $title = 'Create Item';

    public $borrowing_qr;
    public $return_qr;

    #[Validate('required|unique:items')]
    public $code, $name;

    #[Validate('required')]
    public $type, $qty;

    public function save()
    {
        $validatedData = $this->validate();

        Item::create($validatedData);

        notify()->success('Item Berhasil Ditambah');

        $this->borrowing_qr = URL::to('borrowing/' . strtolower($this->code));
        $this->return_qr = URL::to('return/' . strtolower($this->code));

        session()->flash('qr');
    }

    public function download()
    {
        $name = strtoupper($this->name);
        $removeSpacingCapitalize = str_replace(' ', '_', $name);
        $finalName = $removeSpacingCapitalize . '_' . date('Y_m_d') . '.pdf';

        $qrCodeBorrowing = base64_encode(QrCode::format('png')->size(256)->generate($this->borrowing_qr));
        $qrCodeReturn = base64_encode(QrCode::format('png')->size(256)->generate($this->return_qr));

        $pdf = Pdf::loadView('pdf.qrcodes', compact('qrCodeBorrowing', 'qrCodeReturn', 'name'));

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
