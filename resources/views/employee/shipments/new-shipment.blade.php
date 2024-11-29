@extends('layouts.layout')
@section('title', 'Sendung Erstellen')
@section('content')
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">Sendung Erstellen</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">Sendungen</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Sendung Erstellen</li>
    </ol>
</div>
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start:: row-6 -->
        <div class="row justify-content-center">
            <div class="col-xl-8 ">
                <div class="card custom-card">
                    <div class="card-header d-md-flex d-block">
                        <div class="h5 mb-0 d-sm-flex d-block align-items-center">
                            <div>
                                <img src="{{ asset($company->profile_image) }}" style="width:40px; height:40px;" alt="">
                            </div>
                        </div>
                    </div>
                    <form action="{{route('shipments.store')}}" method="POST">
                        <div class="card-body">
                            <div class="row gy-3">
                                @csrf
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6">
                                            <p class="dw-semibold mb-2">
                                                Kunden Information :
                                            </p>
                                            <div class="row gy-2">
                                                <div class="col-xl-12 choices-control">
                                                    <select class="form-control" data-trigger name="customer_select" id="customer_select">
                                                        <option value="new_customer">Neukunde</option>
                                                        @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{$customer->name}} ({{$customer->company_name}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-xl-6">
                                                    <input type="text" name="customer-company-name" class="form-control" id="customer-company-name" placeholder="Name der Firma" value="">
                                                </div>
                                                <div class="col-xl-6">
                                                    <input type="text" name="customer-name-surname" class="form-control" id="customer-name-surname" placeholder="Vorname Familienname" value="">
                                                </div>
                                                <div class="col-xl-5">
                                                    <input type="text" name="customer-street" class="form-control" id="customer-street-and-house-number" placeholder="Straße und Hausnummer" value="">
                                                </div>
                                                <div class="col-xl-3">
                                                    <input type="text" name="customer-zip-code" class="form-control" id="customer-zip-code" placeholder="Postleitzahl" value="">
                                                </div>
                                                <div class="col-xl-4">
                                                    <input type="text" name="customer-city" class="form-control" id="customer-city" placeholder="Stadt" value="">
                                                </div>
                                                <div class="col-xl-12">
                                                    <select class="form-select" name="customer-country" id="customer-country-select">
                                                        <option value="Deutschland">Deutschland</option>
                                                        <option value="Niederlande">Niederlande</option>
                                                        <option value="Österreich">Österreich</option>
                                                        <option value="Dänemark">Dänemark</option>
                                                        <option value="Schweden">Schweden</option>
                                                        <option value="Frankreich">Frankreich</option>
                                                        <option value="Belgien">Belgien</option>
                                                        <option value="Italien">Italien</option>
                                                        <option value="Griechenland">Griechenland</option>
                                                        <option value="Schweiz">Schweiz</option>
                                                        <option value="Polen">Polen</option>
                                                        <option value="Kroatien">Kroatien</option>
                                                        <option value="Rumänien">Rumänien</option>
                                                        <option value="Tschechien">Tschechien</option>
                                                        <option value="Serbien">Serbien</option>
                                                        <option value="Ungarn">Ungarn</option>
                                                        <option value="Bulgarien">Bulgarien</option>
                                                        <option value="Russland">Russland</option>
                                                        <option value="Weißrussland">Weißrussland</option>
                                                        <option value="Türkei">Türkei</option>
                                                        <option value="Norwegen">Norwegen</option>
                                                        <option value="England">England</option>
                                                        <option value="Irland">Irland</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="Spanien">Spanien</option>
                                                        <option value="Slowenien">Slowenien</option>
                                                        <option value="Slowakei">Slowakei</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Luxemburg">Luxemburg</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Litauen">Litauen</option>
                                                        <option value="Lettland">Lettland</option>
                                                        <option value="Kasachstan">Kasachstan</option>
                                                        <option value="Island">Island</option>
                                                        <option value="Estland">Estland</option>
                                                        <option value="Finnland">Finnland</option>
                                                        <option value="Bosnien und Herzegowina">Bosnien und Herzegowina</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-6">
                                                    <input type="text" name="customer-email" class="form-control" id="customer-email" placeholder="Kunden E-Mail" value="">
                                                </div>
                                                <div class="col-xl-6">
                                                    <input type="text" name="customer-phone" class="form-control" id="customer-phone" placeholder="Kunden Telefon" value="">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-12">
                                            <div class="form-check mt-3 mb-3">
                                                <input class="form-check-input" name="carrier_check" type="checkbox" value="carrier_yes" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Ich werde den Transport nicht selbst durchführen
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div id="carrier_info" class="col-xl-12 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-3" style="display: none">
                                            <p class="dw-semibold mb-2">
                                                Transporter:
                                            </p>
                                            <div class="row gy-2">
                                                <div class="col-xl-12 choices-control">
                                                    <select class="form-control" data-trigger name="carrier_select" id="carrier_select">
                                                        <option value="new_carrier">Neuer Transporter</option>
                                                        @foreach($carriers as $carrier)
                                                        <option value="{{ $carrier->id }}">{{$carrier->name}} ({{$carrier->company_name}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-xl-6">
                                                    <input type="text" name="carrier-company-name" class="form-control" id="carrier-company-name" placeholder="Name der Firma" value="">
                                                </div>
                                                <div class="col-xl-6">
                                                    <input type="text" name="carrier-name-surname" class="form-control" id="carrier-name-surname" placeholder="Vorname Familienname" value="">
                                                </div>
                                                <div class="col-xl-5">
                                                    <input type="text" name="carrier-street" class="form-control" id="carrier-street-and-house-number" placeholder="Straße und Hausnummer" value="">
                                                </div>
                                                <div class="col-xl-3">
                                                    <input type="text" name="carrier-zip-code" class="form-control" id="carrier-zip-code" placeholder="Postleitzahl" value="">
                                                </div>
                                                <div class="col-xl-4">
                                                    <input type="text" name="carrier-city" class="form-control" id="carrier-city" placeholder="Stadt" value="">
                                                </div>
                                                <div class="col-xl-12">
                                                    <select class="form-select" name="carrier-country" id="carrier-country-select">
                                                        <option value="Deutschland">Deutschland</option>
                                                        <option value="Niederlande">Niederlande</option>
                                                        <option value="Österreich">Österreich</option>
                                                        <option value="Dänemark">Dänemark</option>
                                                        <option value="Schweden">Schweden</option>
                                                        <option value="Frankreich">Frankreich</option>
                                                        <option value="Belgien">Belgien</option>
                                                        <option value="Italien">Italien</option>
                                                        <option value="Griechenland">Griechenland</option>
                                                        <option value="Schweiz">Schweiz</option>
                                                        <option value="Polen">Polen</option>
                                                        <option value="Kroatien">Kroatien</option>
                                                        <option value="Rumänien">Rumänien</option>
                                                        <option value="Tschechien">Tschechien</option>
                                                        <option value="Serbien">Serbien</option>
                                                        <option value="Ungarn">Ungarn</option>
                                                        <option value="Bulgarien">Bulgarien</option>
                                                        <option value="Russland">Russland</option>
                                                        <option value="Weißrussland">Weißrussland</option>
                                                        <option value="Türkei">Türkei</option>
                                                        <option value="Norwegen">Norwegen</option>
                                                        <option value="England">England</option>
                                                        <option value="Irland">Irland</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="Spanien">Spanien</option>
                                                        <option value="Slowenien">Slowenien</option>
                                                        <option value="Slowakei">Slowakei</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Luxemburg">Luxemburg</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Litauen">Litauen</option>
                                                        <option value="Lettland">Lettland</option>
                                                        <option value="Kasachstan">Kasachstan</option>
                                                        <option value="Island">Island</option>
                                                        <option value="Estland">Estland</option>
                                                        <option value="Finnland">Finnland</option>
                                                        <option value="Bosnien und Herzegowina">Bosnien und Herzegowina</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-6">
                                                    <input type="text" name="carrier-email" class="form-control" id="carrier-email" placeholder="Weiterleitungs-E-Mail" value="">
                                                </div>
                                                <div class="col-xl-6">
                                                    <input type="text" name="carrier-phone" class="form-control" id="carrier-phone" placeholder="Trägertelefon" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                             
                                </div>
                                
                                {{-- Yükleme Yerleri --}}
                                <div class="row gy-3" id="shipments_location_container">
                                    <div class="row gy-3" id="shipment-location-1">
                                        <p class="dw-semibold mb-2">Standorte werden geladen : <b>Installationsort 1</b></p>
                                        <div class="col-xl-12 choices-control">
                                            <select class="form-control shipment-upload-address" data-trigger name="shipments_select-1" id="shipments_select-1">
                                                <option value="new_shipment">Neuer Installationsort</option>
                                                @foreach ($shipmentsInfo as $shipmentInfo)
                                                <option value="{{ $shipmentInfo->id }}">{{ $shipmentInfo->infoArray['name'] }} ({{ $shipmentInfo->infoArray['company_name'] }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4"> 
                                            <label for="company-name" class="form-label">Unternehmen :</label>
                                            <input type="text" name="shipments_company_1" class="form-control" id="shipments-company-1" placeholder="Name der Firma">
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" name="shipments_name_1" class="form-control" id="shipments-name-1" placeholder="Name">
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="phone" class="form-label">Telefon:</label>
                                            <input type="text" name="shipments_phone_1" class="form-control" id="shipments-phone-1" placeholder="Telefon">
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="street" class="form-label">Straße und Hausnummer:</label>
                                            <input type="text" name="shipments_street_1" class="form-control" id="shipments-street-1" placeholder="Straße und Hausnummer">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="zip" class="form-label">Postleitzahl:</label>
                                            <input type="text" name="shipments_zip_1" class="form-control" id="shipments-zip-1" placeholder="Postleitzahl">
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="city" class="form-label">Stadt:</label>
                                            <input type="text" name="shipments_city_1" class="form-control" id="shipments-city-1" placeholder="Stadt">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="country" class="form-label">Land:</label>
                                            <select class="form-select" name="shipments_country_1" id="shipments-country-1">
                                                <option value="Deutschland">Deutschland</option>
                                                <option value="Niederlande">Niederlande</option>
                                                <option value="Österreich">Österreich</option>
                                                <option value="Dänemark">Dänemark</option>
                                                <option value="Schweden">Schweden</option>
                                                <option value="Frankreich">Frankreich</option>
                                                <option value="Belgien">Belgien</option>
                                                <option value="Italien">Italien</option>
                                                <option value="Griechenland">Griechenland</option>
                                                <option value="Schweiz">Schweiz</option>
                                                <option value="Polen">Polen</option>
                                                <option value="Kroatien">Kroatien</option>
                                                <option value="Rumänien">Rumänien</option>
                                                <option value="Tschechien">Tschechien</option>
                                                <option value="Serbien">Serbien</option>
                                                <option value="Ungarn">Ungarn</option>
                                                <option value="Bulgarien">Bulgarien</option>
                                                <option value="Russland">Russland</option>
                                                <option value="Weißrussland">Weißrussland</option>
                                                <option value="Türkei">Türkei</option>
                                                <option value="Norwegen">Norwegen</option>
                                                <option value="England">England</option>
                                                <option value="Irland">Irland</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="Spanien">Spanien</option>
                                                <option value="Slowenien">Slowenien</option>
                                                <option value="Slowakei">Slowakei</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Luxemburg">Luxemburg</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Litauen">Litauen</option>
                                                <option value="Lettland">Lettland</option>
                                                <option value="Kasachstan">Kasachstan</option>
                                                <option value="Island">Island</option>
                                                <option value="Estland">Estland</option>
                                                <option value="Finnland">Finnland</option>
                                                <option value="Bosnien und Herzegowina">Bosnien und Herzegowina</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="loaded-date" class="form-label">Datum des Hochladens:</label>
                                            <input type="date" name="shipments_upload_date_1" class="form-control">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="start-time" class="form-label">Beginn des Zeitbereichs:</label>
                                            <input type="time" name="shipments_time_start_1" class="form-control">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="end-time" class="form-label">Ende des Zeitbereichs:</label>
                                            <input type="time" name="shipments_time_end_1" class="form-control">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="ref-no" class="form-label">Referenznummer:</label>
                                            <input type="text" name="shipments_ref_no_1" class="form-control" placeholder="Referenznummer">
                                        </div>
                                        <div class="col-xl-12"> 
                                            <label for="content" class="form-label">Inhalt:</label>
                                            <textarea class="form-control" name="shipments_content_1" placeholder="Inhalt" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button class="btn btn-light" id="add-shipment-location" type="button"><i class="bi bi-plus-lg"></i> Installationsort hinzufügen</button>
                                </div>
                                {{-- Yükleme Yerleri Bitiş --}}
                                
                                {{-- Teslimat Yerleri --}}
                                <div class="row gy-3" id="deliverys_location_container">
                                    <div class="row gy-3" id="delivery-location-1">
                                        <p class="dw-semibold mb-2">Lieferorte : <b>Lieferort 1</b>
                                        </p>
                                        <div class="col-xl-12 choices-control">
                                            <select class="form-control delivery-upload-address" data-trigger name="deliverys_select-1" id="deliverys_select-1">
                                                <option value="new_delivery">Neuer Lieferort</option>
                                                @foreach ($deliveryInfo as $delivery)
                                                <option value="{{ $delivery->id }}">{{ $delivery->infoArray['name'] }} ({{ $delivery->infoArray['company_name'] }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4"> 
                                            <label for="deliverys-company-1" class="form-label">Unternehmen :</label>
                                            <input type="text" name="deliverys_company_1" class="form-control" id="deliverys-company-1" placeholder="Name der Firma">
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="deliverys-name-1" class="form-label">Name:</label>
                                            <input type="text" name="deliverys_name_1" class="form-control" id="deliverys-name-1" placeholder="Name">
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="deliverys-phone-1" class="form-label">Telefon:</label>
                                            <input type="text" name="deliverys_phone_1" class="form-control" id="deliverys-phone-1" placeholder="Telefon">
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="deliverys-street-1" class="form-label">Straße und Hausnummer:</label>
                                            <input type="text" name="deliverys_street_1" class="form-control" id="deliverys-street-1" placeholder="Straße und Hausnummer">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="deliverys-zip-1" class="form-label">Postleitzahl:</label>
                                            <input type="text" name="deliverys_zip_1" class="form-control" id="deliverys-zip-1" placeholder="Postleitzahl">
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="deliverys-city-1" class="form-label">Stadt:</label>
                                            <input type="text" name="deliverys_city_1" class="form-control" id="deliverys-city-1" placeholder="Stadt">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="deliverys-country-1" class="form-label">Land:</label>
                                            <select class="form-select" name="deliverys_country_1" id="deliverys-country-1">
                                                <option value="Deutschland">Deutschland</option>
                                                <option value="Niederlande">Niederlande</option>
                                                <option value="Österreich">Österreich</option>
                                                <option value="Dänemark">Dänemark</option>
                                                <option value="Schweden">Schweden</option>
                                                <option value="Frankreich">Frankreich</option>
                                                <option value="Belgien">Belgien</option>
                                                <option value="Italien">Italien</option>
                                                <option value="Griechenland">Griechenland</option>
                                                <option value="Schweiz">Schweiz</option>
                                                <option value="Polen">Polen</option>
                                                <option value="Kroatien">Kroatien</option>
                                                <option value="Rumänien">Rumänien</option>
                                                <option value="Tschechien">Tschechien</option>
                                                <option value="Serbien">Serbien</option>
                                                <option value="Ungarn">Ungarn</option>
                                                <option value="Bulgarien">Bulgarien</option>
                                                <option value="Russland">Russland</option>
                                                <option value="Weißrussland">Weißrussland</option>
                                                <option value="Türkei">Türkei</option>
                                                <option value="Norwegen">Norwegen</option>
                                                <option value="England">England</option>
                                                <option value="Irland">Irland</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="Spanien">Spanien</option>
                                                <option value="Slowenien">Slowenien</option>
                                                <option value="Slowakei">Slowakei</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Luxemburg">Luxemburg</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Litauen">Litauen</option>
                                                <option value="Lettland">Lettland</option>
                                                <option value="Kasachstan">Kasachstan</option>
                                                <option value="Island">Island</option>
                                                <option value="Estland">Estland</option>
                                                <option value="Finnland">Finnland</option>
                                                <option value="Bosnien und Herzegowina">Bosnien und Herzegowina</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="deliverys-loaded-date-1" class="form-label">Datum des Hochladens:</label>
                                            <input type="date" name="deliverys_upload_date_1" class="form-control" id="deliverys-loaded-date-1">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="deliverys-start-time-1" class="form-label">Beginn des Zeitbereichs:</label>
                                            <input type="time" name="deliverys_time_start_1" class="form-control" id="deliverys-start-time-1">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="deliverys-end-time-1" class="form-label">Ende des Zeitbereichs:</label>
                                            <input type="time" name="deliverys_time_end_1" class="form-control" id="deliverys-end-time-1">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <label for="deliverys-ref-no-1" class="form-label">Referenznummer:</label>
                                            <input type="text" name="deliverys_ref_no_1" class="form-control" id="deliverys-ref-no-1" placeholder="Referenznummer">
                                        </div>
                                        <div class="col-xl-12"> 
                                            <label for="deliverys-content-1" class="form-label">Inhalt:</label>
                                            <textarea class="form-control" name="deliverys_content_1" id="deliverys-content-1" placeholder="Inhalt" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12"> 
                                    <button class="btn btn-light" id="add-delivery-location" type="button"><i class="bi bi-plus-lg"></i> Lieferort hinzufügen</button>
                                </div>
                                {{-- Teslimat Yerleri Bitiş --}}
                                
                                {{-- price --}}
                                <div class="col-xl-12"> 
                                    <label for="delivery-company-name-1" class="form-label">Gebühr :</label>
                                    <input type="number" name="price" class="form-control" id="delivery-company-name-1" placeholder="Gebühr">
                                </div>
                                <div class="col-xl-12" id="shipment_price" style="display: none"> 
                                    <label for="shipment_price" class="form-label">Versand Gebühr :</label>
                                    <input type="number" name="carrier_price" class="form-control" placeholder="Versand Gebühr">
                                </div>
                                {{-- price --}}
                                
                            </div>
                        </div>
                        
                        <div class="card-footer text-end">
                            <button class="btn btn-primary d-inline-flex ">Entwurf Erstellen <i class="ri-send-plane-2-line ms-1 align-middle"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End:: row-6 -->
        
    </div>
</div> 
<script>
    var customers = @json($customers);
    var carriers = @json($carriers);
    var shipmentsInfo = @json($shipmentsInfo);
    var deliverysInfo = @json($deliveryInfo);
</script>

<script src="{{asset('/assets/js/logispro-new-shipment.js')}}"></script>
@endsection