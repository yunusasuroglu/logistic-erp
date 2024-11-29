<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Queue\SerializesModels;

class ShipmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $shipment;
    public $shipmentNumber;
    public $shipmentCompany;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shipment,$shipmentNumber,$shipmentCompany)
    {
        $this->shipment = $shipment;
        $this->shipmentNumber = $shipmentNumber;
        $this->shipmentCompany = $shipmentCompany;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // PDF dosyasını oluşturma
        $pdf = PDF::loadView('pdf.shipments-pdf', ['shipment' => $this->shipment]);
        $pdfFileName = 'shipment_details_' . $this->shipmentNumber . '.pdf';
        // E-posta oluşturma ve PDF'i ekleme
        return $this->view('emails.shipments-send')->subject('Ihre Sendungsnummer #' . $this->shipmentNumber.' wurde erstellt. Erstellerfirma: '. $this->shipmentCompany)->attachData($pdf->output(), $pdfFileName, ['mime' => 'application/pdf',]);
    }
}
