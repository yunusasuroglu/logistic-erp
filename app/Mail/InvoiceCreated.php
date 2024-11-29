<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Queue\SerializesModels;

class InvoiceCreated extends Mailable
{
    use Queueable, SerializesModels;
    
    public $invoice;
    public $invoiceNumber;
    public $invoiceCompany;
    /**
    * Create a new message instance.
    *
    * @return void
    */
    public function __construct($invoice,$invoiceNumber,$invoiceCompany)
    {
        $this->invoice = $invoice;
        $this->invoiceNumber = $invoiceNumber;
        $this->invoiceCompany = $invoiceCompany;
    }
    
    /**
    * Build the message.
    *
    * @return $this
    */
    
    public function build()
    {
        // PDF dosyasını oluşturma
        $pdf = PDF::loadView('pdf.invoice-pdf', ['invoice' => $this->invoice]);
        $pdfFileName = 'invoice_details_' . $this->invoiceNumber . '.pdf';
        // E-posta oluşturma ve PDF'i ekleme
        return $this->view('emails.invoiceCreated')->subject('Ihre Rechnungsnummer #' . $this->invoiceNumber.' wurde erstellt. Erstellerfirma: '. $this->invoiceCompany)->attachData($pdf->output(), $pdfFileName, ['mime' => 'application/pdf',]);
    }
}