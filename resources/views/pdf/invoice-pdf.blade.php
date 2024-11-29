<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>{{$invoice->i_no}}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Mongolian&display=swap');
        body {
            font-family: 'DejaVu Sans', sans-serif !important;
            text-align: center;
            color: #777;
        }
        
        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }
        
        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #000000;
        }
        
        body a {
            color: #06f;
        }
        
        .invoice-box {
            padding: 30px;
            font-size: 16px;
            line-height: 24px;
            font-family: 'DejaVu Sans', sans-serif !important;
            color: #000000;
        }
        
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }
        
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        
        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }
            
            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #fff; /* Arka plan rengi */
            padding: 10px 0;
            font-size: 13px;
            line-height: 20px;
            text-align: left;
            border-top: 1px solid #ccc; /* İsteğe bağlı, üst sınır */
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table>
            <tr>
                <td>
                    <b>
                        <h2 style="margin: 0px; border-bottom: 1px solid #ddd; padding: 4px;">Kunde</h2>
                    </b>
                    <br>
                </td>
            </tr>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td style="font-size: 12px;">
                                <span style="font-size: 8px;">{{$invoice->author_company['name']}}, {{$invoice->author_company['city']}}, {{$invoice->author_company['country']}}, {{$invoice->author_company['zip_code']}}<br></span>
                                <b>{{$invoice->author_company['name']}}</b><br/>
                                <b>{{$invoice->customer['name']}}</b><br/>
                                {{$invoice->customer['street']}}, {{$invoice->customer['zip_code']}} {{$invoice->customer['city']}}<br/>
                                {{$invoice->customer['country']}} <br>
                                {{$invoice->customer['phone']}} - {{$invoice->customer['email']}} 
                                <br> 
                                Umgekehrte Änderung: 
                                @if ($invoice->customer['reverse_charge'] == 2)
                                <span class="badge ms-3 bg-success-transparent">Aktiv</span>
                                @else
                                <span class="badge ms-3 bg-info-transparent">Pasiv</span>
                                @endif
                                <br><br><br>
                            </td>
                            <td style="font-size: 10px; text-align: left;">
                                <div style="border: 2px solid black; height: 150px; width: 250px; padding: 10px; margin-left: auto;">
                                    <table style="margin-top: 10px;">
                                        <tr>
                                            <td style="line-height: 14px; padding: 0px;">
                                                <b>Sachbearbeiter:</b> <br>
                                                <b>Telefon:</b> <br>
                                                <b>Telefax:</b> <br>
                                                <b>E-Mail:</b>
                                            </td>
                                            <td style="line-height: 14px; text-align: left; padding: 0px;">
                                                {{$invoice->author}} <br>
                                                {{$invoice->author_company['phone']}} <br>
                                                {{$invoice->author_company['fax']}} <br>
                                                <a href="">{{$invoice->author_company['email']}}</a> <br>
                                            </td>
                                        </tr>
                                    </table>
                                    <table style="margin-top: 15px;">
                                        <td style="padding: 0px; padding-bottom: 3px; line-height: 13px;"><b>Bankverbindung:</b></td>
                                        <tr>
                                            <td style="line-height: 13px; font-size: 9px; padding: 0px;">
                                                <b>IBAN</b> <br>
                                                <b>BIC</b>
                                            </td>
                                            <td style="line-height: 13px; font-size: 9px; text-align: left; padding: 0px;">
                                                {{$invoice->author_company['iban']}} <br>
                                                {{$invoice->author_company['bic']}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p style="text-align: left; font-size: 12px;"><b>Verladeadressen</b></p>
            <table>
                <tr class="heading">
                    <td style="font-size: 8px; text-align: left;">Pos.</td>
                    <td style="font-size: 8px; text-align: left;">Bezeichnung</td>
                    <td style="font-size: 8px; text-align: left;">Einzel €</td>
                    @if ($invoice->vat != 0)
                    <td style="font-size: 8px; text-align: left;">MwSt €</td>
                    @endif
                    <td style="font-size: 8px; text-align: left;">Gesamt €</td>
                </tr>
                
                <tr class="item">
                    <td style="font-size: 8px; text-align: left;">1</td>
                    <td style="font-size: 8px; text-align: left; line-height: 9px;">
                        <b>#{{$invoice->shipment->s_code}}</b> <br>
                        <ins>Adressen Hochladen:</ins> <br>
                        @foreach ($invoice->upload_info as $upload_info)
                        {{$upload_info['street']}}, {{$upload_info['zip_code']}} {{$upload_info['city']}}, {{$upload_info['country']}} <br>
                        @endforeach
                        <br>
                        <ins>Adressen Herunterladen:</ins> <br>
                        @foreach ($invoice->delivery_info as $delivery_info)
                        {{$delivery_info['street']}}, {{$delivery_info['zip_code']}} {{$delivery_info['city']}}, {{$delivery_info['country']}} <br>
                        @endforeach
                    </td>
                    <td style="font-size: 8px; text-align: left;">{{$invoice->price}} €</td>
                    @if ($invoice->vat != 0)
                    <td style="font-size: 8px; text-align: left;">{{$invoice->price * $invoice->vat}} € <small style="color: #06f ">{{$invoice->vat}}%</small></td>
                    <td style="font-size: 8px; text-align: left;">{{$invoice->price + $invoice->price * $invoice->vat}} €</td>
                    @else
                    <td style="font-size: 8px; text-align: left;">{{$invoice->price}} €</td>
                    @endif
                    
                </tr>
                <tr class="item">
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                </tr>
                <tr class="item">
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                </tr>
            </table>
        <br>
        <div style="font-size: 12px; line-height: 14px; text-align: left;">
            *Steuerschuldnerschaft des Leistungsempfängers (Reverse Charge) <br>
            Der Beleg ist innerhalb der nächsten 7 Tage fällig (spätestens am {{ $invoice->created_at->addDays(7)->format('d.m.Y') }} ) <br>
            Vielen Dank für die gute Zusammenarbeit. <br>
            Bewerten Sie uns jetzt gerne auf Google unter {{$invoice->author_company['name']}} <br>
        </div>

        <div class="footer">
            <table style="height: auto;">
                <tr style="margin-top: 80%;">
                    <td style="font-size: 11px; line-height: 14px; text-align: left;">
                        <span style="color: #0c2ac0"><b>{{$invoice->author_company['name']}}</b></span> <br>
                        {{$invoice->author_company['street']}}, {{$invoice->author_company['zip_code']}}, {{$invoice->author_company['city']}} <br>
                        <b>T</b> {{$invoice->author_company['phone']}}  <br>
                       <b>E-Mail</b> <a href="">{{$invoice->author_company['email']}}</a>, <br>
                        <b>Web</b> oeztep-transporte.de <br>
    
                    </td>
                    <td style="font-size: 11px; line-height: 14px; text-align: left;">
                        <b>IBAN</b> {{$invoice->author_company['iban']}} <br>
                        <b>BIC</b> {{$invoice->author_company['bic']}} <b>Bank</b> Sparkasse Essen  <br>
                        <b>StNr</b> {{$invoice->author_company['stnr']}} <br>
                        <b>Ust-Id Nr.</b> {{$invoice->author_company['ust_id_nr']}}<br>
                    </td>
                    <td style="font-size: 11px; line-height: 14px; text-align: left;">
                        <b>HRB</b> {{$invoice->author_company['hrb']}}<br>
                        <b>Registergericht</b> {{$invoice->author_company['registry_court']}} <br>
                        <b>Geschäftsführer</b><br>
                        {{$invoice->author_company['general_manager']}} <br>
    
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>