@extends('layouts.layout')
@php
$title = trans_dynamic('company_shipments_edit_page_title');
@endphp
@section('title', $title)
@section('content')
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">{{$shipment->s_code}}</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">{{trans_dynamic('company_shipments_edit_name')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{$shipment->s_code}}</li>
    </ol>
</div>
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start:: row-6 -->
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card custom-card">
                    <div class="card-header d-md-flex d-block">
                        <div class="h5 mb-0 d-sm-flex d-block align-items-center">
                            <div>
                                <img src="{{ asset($company->profile_image) }}" style="width:40px; height:40px;" alt="">
                            </div>
                        </div>
                        <div class="ms-auto mt-md-0 mt-2">
                            <button type="button" disabled class="btn  btn-success-light me-2">{{$shipment->author_company['name']}}</button>
                        </div>
                    </div>
                    <form action="{{route('shipments.update',$shipment->id)}}" method="POST">
                        <div class="card-body">
                            <div class="row gy-3">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-12 mt-4">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6">
                                            <p class="dw-semibold mb-2">
                                                {{trans_dynamic('company_shipments_edit_form_customer_title')}}
                                            </p>
                                            <!-- Customer Select Dropdown -->
                                            <div class="row gy-2">
                                                <div class="col-xl-12 choices-control">
                                                    <select class="form-control" data-trigger name="customer_select" id="customer_select">
                                                        <option value="new_customer">{{trans_dynamic('company_shipments_edit_form_customer_new_select')}}</option>
                                                        @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}" 
                                                            {{ isset($shipment->customer['name']) && $shipment->customer['name'] == $customer->name ? 'selected' : '' }}>
                                                            {{$customer->name}} ({{$customer->company_name}})
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-xl-6">
                                                    <input type="text" class="form-control" id="customer-company-name" placeholder="{{trans_dynamic('company_shipments_edit_form_customer_company_name')}}" name="customer-company-name" value="{{ $shipment->customer['company_name'] ?? '' }}">
                                                </div>
                                                
                                                <div class="col-xl-6">
                                                    <input type="text" class="form-control" placeholder="{{trans_dynamic('company_shipments_edit_form_customer_name_and_surname')}}"id="customer-name-surname" name="customer-name-surname" value="{{ $shipment->customer['name'] ?? '' }}">
                                                </div>
                                                
                                                <div class="col-xl-5">
                                                    <input type="text" class="form-control" placeholder="{{trans_dynamic('company_shipments_edit_form_customer_street')}}"id="customer-street-and-house-number" name="customer-street" value="{{ $shipment->customer['street'] ?? '' }}">
                                                </div>
                                                
                                                <div class="col-xl-3">
                                                    <input type="text" class="form-control" placeholder="{{trans_dynamic('company_shipments_edit_form_customer_zip_code')}}"id="customer-zip-code" name="customer-zip-code" value="{{ $shipment->customer['zip_code'] ?? '' }}">
                                                </div>
                                                
                                                <div class="col-xl-4">
                                                    <input type="text" class="form-control" placeholder="{{trans_dynamic('company_shipments_edit_form_customer_city')}}"id="customer-city" name="customer-city" value="{{ $shipment->customer['city'] ?? '' }}">
                                                </div>
                                                
                                                <div class="col-xl-12">
                                                    <select class="form-select" id="customer-country" name="customer-country">
                                                        <option value="Deutschland" {{ $shipment->customer['country'] == 'Deutschland' ? 'selected' : '' }}>Deutschland</option>
                                                        <option value="Niederlande" {{ $shipment->customer['country'] == 'Niederlande' ? 'selected' : '' }}>Niederlande</option>
                                                        <option value="Österreich" {{ $shipment->customer['country'] == 'Österreich' ? 'selected' : '' }}>Österreich</option>
                                                        <option value="Dänemark" {{ $shipment->customer['country'] == 'Dänemark' ? 'selected' : '' }}>Dänemark</option>
                                                        <option value="Schweden" {{ $shipment->customer['country'] == 'Schweden' ? 'selected' : '' }}>Schweden</option>
                                                        <option value="Frankreich" {{ $shipment->customer['country'] == 'Frankreich' ? 'selected' : '' }}>Frankreich</option>
                                                        <option value="Belgien" {{ $shipment->customer['country'] == 'Belgien' ? 'selected' : '' }}>Belgien</option>
                                                        <option value="Italien" {{ $shipment->customer['country'] == 'Italien' ? 'selected' : '' }}>Italien</option>
                                                        <option value="Griechenland" {{ $shipment->customer['country'] == 'Griechenland' ? 'selected' : '' }}>Griechenland</option>
                                                        <option value="Schweiz" {{ $shipment->customer['country'] == 'Schweiz' ? 'selected' : '' }}>Schweiz</option>
                                                        <option value="Polen" {{ $shipment->customer['country'] == 'Polen' ? 'selected' : '' }}>Polen</option>
                                                        <option value="Kroatien" {{ $shipment->customer['country'] == 'Kroatien' ? 'selected' : '' }}>Kroatien</option>
                                                        <option value="Rumänien" {{ $shipment->customer['country'] == 'Rumänien' ? 'selected' : '' }}>Rumänien</option>
                                                        <option value="Tschechien" {{ $shipment->customer['country'] == 'Tschechien' ? 'selected' : '' }}>Tschechien</option>
                                                        <option value="Serbien" {{ $shipment->customer['country'] == 'Serbien' ? 'selected' : '' }}>Serbien</option>
                                                        <option value="Ungarn" {{ $shipment->customer['country'] == 'Ungarn' ? 'selected' : '' }}>Ungarn</option>
                                                        <option value="Bulgarien" {{ $shipment->customer['country'] == 'Bulgarien' ? 'selected' : '' }}>Bulgarien</option>
                                                        <option value="Russland" {{ $shipment->customer['country'] == 'Russland' ? 'selected' : '' }}>Russland</option>
                                                        <option value="Weißrussland" {{ $shipment->customer['country'] == 'Weißrussland' ? 'selected' : '' }}>Weißrussland</option>
                                                        <option value="Türkei" {{ $shipment->customer['country'] == 'Türkei' ? 'selected' : '' }}>Türkei</option>
                                                        <option value="Norwegen" {{ $shipment->customer['country'] == 'Norwegen' ? 'selected' : '' }}>Norwegen</option>
                                                        <option value="England" {{ $shipment->customer['country'] == 'England' ? 'selected' : '' }}>England</option>
                                                        <option value="Irland" {{ $shipment->customer['country'] == 'Irland' ? 'selected' : '' }}>Irland</option>
                                                        <option value="Ukraine" {{ $shipment->customer['country'] == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                                        <option value="Spanien" {{ $shipment->customer['country'] == 'Spanien' ? 'selected' : '' }}>Spanien</option>
                                                        <option value="Slowenien" {{ $shipment->customer['country'] == 'Slowenien' ? 'selected' : '' }}>Slowenien</option>
                                                        <option value="Slowakei" {{ $shipment->customer['country'] == 'Slowakei' ? 'selected' : '' }}>Slowakei</option>
                                                        <option value="Portugal" {{ $shipment->customer['country'] == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                                        <option value="Luxemburg" {{ $shipment->customer['country'] == 'Luxemburg' ? 'selected' : '' }}>Luxemburg</option>
                                                        <option value="Liechtenstein" {{ $shipment->customer['country'] == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                                                        <option value="Litauen" {{ $shipment->customer['country'] == 'Litauen' ? 'selected' : '' }}>Litauen</option>
                                                        <option value="Lettland" {{ $shipment->customer['country'] == 'Lettland' ? 'selected' : '' }}>Lettland</option>
                                                        <option value="Kasachstan" {{ $shipment->customer['country'] == 'Kasachstan' ? 'selected' : '' }}>Kasachstan</option>
                                                        <option value="Island" {{ $shipment->customer['country'] == 'Island' ? 'selected' : '' }}>Island</option>
                                                        <option value="Estland" {{ $shipment->customer['country'] == 'Estland' ? 'selected' : '' }}>Estland</option>
                                                        <option value="Finnland" {{ $shipment->customer['country'] == 'Finnland' ? 'selected' : '' }}>Finnland</option>
                                                        <option value="Bosnien und Herzegowina" {{ $shipment->customer['country'] == 'Bosnien und Herzegowina' ? 'selected' : '' }}>Bosnien und Herzegowina</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-xl-6">
                                                    <input type="text" class="form-control" placeholder="{{trans_dynamic('company_shipments_edit_form_customer_phone')}}"id="customer-phone" name="customer-phone" value="{{ $shipment->customer['phone'] ?? '' }}">
                                                </div>
                                                <div class="col-xl-6">
                                                    <input type="email" class="form-control" placeholder="{{trans_dynamic('company_shipments_edit_form_customer_email')}}"id="customer-email" name="customer-email" value="{{ $shipment->customer['email'] ?? '' }}">
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="reverse_charge" type="checkbox" value="2" id="reverse_charge" 
                                                                {{ $shipment->reverse_charge == 2 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="reverse_charge">
                                                                {{trans_dynamic('company_shipments_edit_form_customer_reverse_charge')}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if ($shipment->carrier !== null)
                                    <div id="carrier_info" class="col-xl-12 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-3">
                                        <p class="dw-semibold mt-3 mb-3">
                                            {{trans_dynamic('company_shipments_edit_form_carrier_title')}}
                                        </p>
                                        <div class="row gy-2">
                                            <div class="col-xl-12 choices-control">
                                                <select class="form-control" data-trigger name="carrier_select" id="carrier_select">
                                                    <option value="new_carrier">{{trans_dynamic('company_shipments_edit_form_carrier_new_select')}}</option>
                                                    @foreach($carriers as $carrier)
                                                    <option value="{{ $carrier->id }}" 
                                                        {{ isset($shipment->carrier['name']) && $shipment->carrier['name'] == $carrier->name ? 'selected' : '' }}>
                                                        {{$carrier->name}} ({{$carrier->company_name}})
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xl-6">
                                                <input type="text" name="carrier-company-name" class="form-control" id="carrier-company-name" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_company_name')}}" value="{{ $shipment->carrier['company_name'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-6">
                                                <input type="text" name="carrier-name-surname" class="form-control" id="carrier-name-surname" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_name_and_surname')}}" value="{{ $shipment->carrier['name'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-5">
                                                <input type="text" name="carrier-street" class="form-control" id="carrier-street-and-house-number" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_street')}}" value="{{ $shipment->carrier['street'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-3">
                                                <input type="text" name="carrier-zip-code" class="form-control" id="carrier-zip-code" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_zip_code')}}" value="{{ $shipment->carrier['zip_code'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-4">
                                                <input type="text" name="carrier-city" class="form-control" id="carrier-city" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_city')}}" value="{{ $shipment->carrier['city'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-12">
                                                <select class="form-select mb-3" id="carrier-country-select" name="carrier-country">
                                                    <option value="Deutschland" {{ $shipment->carrier['country'] == 'Deutschland' ? 'selected' : '' }}>Deutschland</option>
                                                    <option value="Niederlande" {{ $shipment->carrier['country'] == 'Niederlande' ? 'selected' : '' }}>Niederlande</option>
                                                    <option value="Österreich" {{ $shipment->carrier['country'] == 'Österreich' ? 'selected' : '' }}>Österreich</option>
                                                    <option value="Dänemark" {{ $shipment->carrier['country'] == 'Dänemark' ? 'selected' : '' }}>Dänemark</option>
                                                    <option value="Schweden" {{ $shipment->carrier['country'] == 'Schweden' ? 'selected' : '' }}>Schweden</option>
                                                    <option value="Frankreich" {{ $shipment->carrier['country'] == 'Frankreich' ? 'selected' : '' }}>Frankreich</option>
                                                    <option value="Belgien" {{ $shipment->carrier['country'] == 'Belgien' ? 'selected' : '' }}>Belgien</option>
                                                    <option value="Italien" {{ $shipment->carrier['country'] == 'Italien' ? 'selected' : '' }}>Italien</option>
                                                    <option value="Griechenland" {{ $shipment->carrier['country'] == 'Griechenland' ? 'selected' : '' }}>Griechenland</option>
                                                    <option value="Schweiz" {{ $shipment->carrier['country'] == 'Schweiz' ? 'selected' : '' }}>Schweiz</option>
                                                    <option value="Polen" {{ $shipment->carrier['country'] == 'Polen' ? 'selected' : '' }}>Polen</option>
                                                    <option value="Kroatien" {{ $shipment->carrier['country'] == 'Kroatien' ? 'selected' : '' }}>Kroatien</option>
                                                    <option value="Rumänien" {{ $shipment->carrier['country'] == 'Rumänien' ? 'selected' : '' }}>Rumänien</option>
                                                    <option value="Tschechien" {{ $shipment->carrier['country'] == 'Tschechien' ? 'selected' : '' }}>Tschechien</option>
                                                    <option value="Serbien" {{ $shipment->carrier['country'] == 'Serbien' ? 'selected' : '' }}>Serbien</option>
                                                    <option value="Ungarn" {{ $shipment->carrier['country'] == 'Ungarn' ? 'selected' : '' }}>Ungarn</option>
                                                    <option value="Bulgarien" {{ $shipment->carrier['country'] == 'Bulgarien' ? 'selected' : '' }}>Bulgarien</option>
                                                    <option value="Russland" {{ $shipment->carrier['country'] == 'Russland' ? 'selected' : '' }}>Russland</option>
                                                    <option value="Weißrussland" {{ $shipment->carrier['country'] == 'Weißrussland' ? 'selected' : '' }}>Weißrussland</option>
                                                    <option value="Türkei" {{ $shipment->carrier['country'] == 'Türkei' ? 'selected' : '' }}>Türkei</option>
                                                    <option value="Norwegen" {{ $shipment->carrier['country'] == 'Norwegen' ? 'selected' : '' }}>Norwegen</option>
                                                    <option value="England" {{ $shipment->carrier['country'] == 'England' ? 'selected' : '' }}>England</option>
                                                    <option value="Irland" {{ $shipment->carrier['country'] == 'Irland' ? 'selected' : '' }}>Irland</option>
                                                    <option value="Ukraine" {{ $shipment->carrier['country'] == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                                    <option value="Spanien" {{ $shipment->carrier['country'] == 'Spanien' ? 'selected' : '' }}>Spanien</option>
                                                    <option value="Slowenien" {{ $shipment->carrier['country'] == 'Slowenien' ? 'selected' : '' }}>Slowenien</option>
                                                    <option value="Slowakei" {{ $shipment->carrier['country'] == 'Slowakei' ? 'selected' : '' }}>Slowakei</option>
                                                    <option value="Portugal" {{ $shipment->carrier['country'] == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                                    <option value="Luxemburg" {{ $shipment->carrier['country'] == 'Luxemburg' ? 'selected' : '' }}>Luxemburg</option>
                                                    <option value="Liechtenstein" {{ $shipment->carrier['country'] == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                                                    <option value="Litauen" {{ $shipment->carrier['country'] == 'Litauen' ? 'selected' : '' }}>Litauen</option>
                                                    <option value="Lettland" {{ $shipment->carrier['country'] == 'Lettland' ? 'selected' : '' }}>Lettland</option>
                                                    <option value="Kasachstan" {{ $shipment->carrier['country'] == 'Kasachstan' ? 'selected' : '' }}>Kasachstan</option>
                                                    <option value="Island" {{ $shipment->carrier['country'] == 'Island' ? 'selected' : '' }}>Island</option>
                                                    <option value="Estland" {{ $shipment->carrier['country'] == 'Estland' ? 'selected' : '' }}>Estland</option>
                                                    <option value="Finnland" {{ $shipment->carrier['country'] == 'Finnland' ? 'selected' : '' }}>Finnland</option>
                                                    <option value="Bosnien und Herzegowina" {{ $shipment->carrier['country'] == 'Bosnien und Herzegowina' ? 'selected' : '' }}>Bosnien und Herzegowina</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6">
                                                <input type="text" name="carrier-email" class="form-control" id="carrier-email" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_email')}}" value="{{ $shipment->carrier['email'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-6">
                                                <input type="text" name="carrier-phone" class="form-control" id="carrier-phone" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_phone')}}" value="{{ $shipment->carrier['phone'] ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-xl-12">
                                        <div class="form-check mt-3 mb-3">
                                            <input class="form-check-input" name="carrier_check" type="checkbox" value="carrier_yes" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                {{trans_dynamic('company_shipments_edit_form_carrier_check')}}
                                            </label>
                                        </div>
                                    </div>
                                    <div id="carrier_info" class="col-xl-12 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-3" style="display: none">
                                        <p class="dw-semibold mt-3 mb-3">
                                            {{trans_dynamic('company_shipments_edit_form_carrier_title')}}
                                        </p>
                                        <div class="row gy-2">
                                            <div class="col-xl-12 choices-control">
                                                <select class="form-control" data-trigger name="carrier_select" id="carrier_select">
                                                    <option value="new_carrier">{{trans_dynamic('company_shipments_edit_form_carrier_new_select')}}</option>
                                                    @foreach($carriers as $carrier)
                                                    <option value="{{ $carrier->id }}">{{$carrier->name}} ({{$carrier->company_name}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xl-6">
                                                <input type="text" name="carrier-company-name" class="form-control" id="carrier-company-name" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_company_name')}}" value="{{ $shipment->carrier['company_name'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-6">
                                                <input type="text" name="carrier-name-surname" class="form-control" id="carrier-name-surname" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_name_and_surname')}}" value="{{ $shipment->carrier['name'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-5">
                                                <input type="text" name="carrier-street" class="form-control" id="carrier-street-and-house-number" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_street')}}" value="{{ $shipment->carrier['street'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-3">
                                                <input type="text" name="carrier-zip-code" class="form-control" id="carrier-zip-code" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_zip_code')}}" value="{{ $shipment->carrier['zip_code'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-4">
                                                <input type="text" name="carrier-city" class="form-control" id="carrier-city" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_city')}}" value="{{ $shipment->carrier['city'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-12">
                                                <select class="form-select mb-3" name="carrier-country" id="carrier-country-select">
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
                                                <input type="text" name="carrier-email" class="form-control" id="carrier-email" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_email')}}" value="{{ $shipment->carrier['email'] ?? '' }}">
                                            </div>
                                            <div class="col-xl-6">
                                                <input type="text" name="carrier-phone" class="form-control" id="carrier-phone" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_phone')}}" value="{{ $shipment->carrier['phone'] ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                {{-- Yükleme Yerleri --}}
                                <div class="row gy-3" id="shipments_edit_location_container">
                                    @foreach ($shipment->upload_info as $index => $location)
                                    <div class="row gy-3" id="shipment-edit-location-{{ $index + 1 }}">
                                        <p class="dw-semibold mb-2">{{trans_dynamic('company_shipments_edit_form_upload_info_title')}} <b>{{trans_dynamic('company_shipments_edit_form_upload_info_sub_title')}} {{ $index + 1 }}</b></p>
                                        <div class="col-xl-12 choices-control">
                                            <select class="form-control shipment-upload-address" data-trigger name="shipments_select-{{ $index + 1 }}" id="shipments_edit_select-{{ $index + 1 }}">
                                                <option value="new_shipment">{{trans_dynamic('company_shipments_edit_form_upload_info_new_select')}}</option>
                                                @foreach ($shipmentsInfo as $shipmentInfo)
                                                <option value="{{ $shipmentInfo->id }}" {{ $location['name'] == $shipmentInfo->infoArray['name'] ? 'selected' : '' }}>
                                                    {{ $shipmentInfo->infoArray['name'] }} ({{ $shipmentInfo->infoArray['company_name'] }})
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4"> 
                                            <input type="text" name="shipments_company_{{ $index + 1 }}" class="form-control" id="shipments-edit-company-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_upload_info_company_name')}}" value="{{ $location['company_name'] }}">
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" name="shipments_name_{{ $index + 1 }}" class="form-control" id="shipments-edit-name-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_upload_info_name_and_surname')}}" value="{{ $location['name'] }}">
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" name="shipments_phone_{{ $index + 1 }}" class="form-control" id="shipments-edit-phone-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_upload_info_phone')}}" value="{{ $location['phone'] }}">
                                        </div>
                                        <div class="col-xl-3">
                                            <input type="text" name="shipments_street_{{ $index + 1 }}" class="form-control" id="shipments-edit-street-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_upload_info_street')}}" value="{{ $location['street'] }}">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <input type="text" name="shipments_zip_{{ $index + 1 }}" class="form-control" id="shipments-edit-zip-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_upload_info_zip_code')}}" value="{{ $location['zip_code'] }}">
                                        </div>
                                        <div class="col-xl-3">
                                            <input type="text" name="shipments_city_{{ $index + 1 }}" class="form-control" id="shipments-edit-city-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_upload_info_city')}}" value="{{ $location['city'] }}">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <select class="form-select" name="shipments_country_{{ $index + 1 }}" id="shipments-edit-country-{{ $index + 1 }}">
                                                <option value="Deutschland" {{ $location['country'] == 'Deutschland' ? 'selected' : '' }}>Deutschland</option>
                                                <option value="Niederlande" {{ $location['country'] == 'Niederlande' ? 'selected' : '' }}>Niederlande</option>
                                                <option value="Österreich" {{ $location['country'] == 'Österreich' ? 'selected' : '' }}>Österreich</option>
                                                <option value="Dänemark" {{ $location['country'] == 'Dänemark' ? 'selected' : '' }}>Dänemark</option>
                                                <option value="Schweden" {{ $location['country'] == 'Schweden' ? 'selected' : '' }}>Schweden</option>
                                                <option value="Frankreich" {{ $location['country'] == 'Frankreich' ? 'selected' : '' }}>Frankreich</option>
                                                <option value="Belgien" {{ $location['country'] == 'Belgien' ? 'selected' : '' }}>Belgien</option>
                                                <option value="Italien" {{ $location['country'] == 'Italien' ? 'selected' : '' }}>Italien</option>
                                                <option value="Griechenland" {{ $location['country'] == 'Griechenland' ? 'selected' : '' }}>Griechenland</option>
                                                <option value="Schweiz" {{ $location['country'] == 'Schweiz' ? 'selected' : '' }}>Schweiz</option>
                                                <option value="Polen" {{ $location['country'] == 'Polen' ? 'selected' : '' }}>Polen</option>
                                                <option value="Kroatien" {{ $location['country'] == 'Kroatien' ? 'selected' : '' }}>Kroatien</option>
                                                <option value="Rumänien" {{ $location['country'] == 'Rumänien' ? 'selected' : '' }}>Rumänien</option>
                                                <option value="Tschechien" {{ $location['country'] == 'Tschechien' ? 'selected' : '' }}>Tschechien</option>
                                                <option value="Serbien" {{ $location['country'] == 'Serbien' ? 'selected' : '' }}>Serbien</option>
                                                <option value="Ungarn" {{ $location['country'] == 'Ungarn' ? 'selected' : '' }}>Ungarn</option>
                                                <option value="Bulgarien" {{ $location['country'] == 'Bulgarien' ? 'selected' : '' }}>Bulgarien</option>
                                                <option value="Russland" {{ $location['country'] == 'Russland' ? 'selected' : '' }}>Russland</option>
                                                <option value="Weißrussland" {{ $location['country'] == 'Weißrussland' ? 'selected' : '' }}>Weißrussland</option>
                                                <option value="Türkei" {{ $location['country'] == 'Türkei' ? 'selected' : '' }}>Türkei</option>
                                                <option value="Norwegen" {{ $location['country'] == 'Norwegen' ? 'selected' : '' }}>Norwegen</option>
                                                <option value="England" {{ $location['country'] == 'England' ? 'selected' : '' }}>England</option>
                                                <option value="Irland" {{ $location['country'] == 'Irland' ? 'selected' : '' }}>Irland</option>
                                                <option value="Ukraine" {{ $location['country'] == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                                <option value="Spanien" {{ $location['country'] == 'Spanien' ? 'selected' : '' }}>Spanien</option>
                                                <option value="Slowenien" {{ $location['country'] == 'Slowenien' ? 'selected' : '' }}>Slowenien</option>
                                                <option value="Slowakei" {{ $location['country'] == 'Slowakei' ? 'selected' : '' }}>Slowakei</option>
                                                <option value="Portugal" {{ $location['country'] == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                                <option value="Luxemburg" {{ $location['country'] == 'Luxemburg' ? 'selected' : '' }}>Luxemburg</option>
                                                <option value="Liechtenstein" {{ $location['country'] == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                                                <option value="Litauen" {{ $location['country'] == 'Litauen' ? 'selected' : '' }}>Litauen</option>
                                                <option value="Lettland" {{ $location['country'] == 'Lettland' ? 'selected' : '' }}>Lettland</option>
                                                <option value="Kasachstan" {{ $location['country'] == 'Kasachstan' ? 'selected' : '' }}>Kasachstan</option>
                                                <option value="Island" {{ $location['country'] == 'Island' ? 'selected' : '' }}>Island</option>
                                                <option value="Estland" {{ $location['country'] == 'Estland' ? 'selected' : '' }}>Estland</option>
                                                <option value="Finnland" {{ $location['country'] == 'Finnland' ? 'selected' : '' }}>Finnland</option>
                                                <option value="Bosnien und Herzegowina" {{ $location['country'] == 'Bosnien und Herzegowina' ? 'selected' : '' }}>Bosnien und Herzegowina</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3"> 
                                            <input type="date" name="shipments_upload_date_{{ $index + 1 }}" class="form-control" value="{{ $location['upload_date'] }}">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <input type="time" name="shipments_time_start_{{ $index + 1 }}" class="form-control" value="{{ $location['time_start'] }}">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <input type="time" name="shipments_time_end_{{ $index + 1 }}" class="form-control" value="{{ $location['time_end'] }}">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <input type="text" name="shipments_ref_no_{{ $index + 1 }}" class="form-control" placeholder="{{trans_dynamic('company_shipments_edit_form_upload_info_reference')}}" value="{{ $location['ref_no'] }}">
                                        </div>
                                        <div class="col-xl-12"> 
                                            <textarea class="form-control" name="shipments_content_{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_upload_info_details')}}" rows="3">{{ $location['content'] }}</textarea>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-xl-12">
                                    <button class="btn btn-light" id="edit-add-shipment-location" type="button"><i class="bi bi-plus-lg"></i> {{trans_dynamic('company_shipments_edit_form_upload_info_button')}}</button>
                                </div>
                                {{-- Yükleme Yerleri Bitiş --}}
                                {{-- Teslimat Yerleri --}}
                                <div class="row gy-3" id="deliverys_location_container">
                                    @foreach ($shipment->delivery_info as $index => $delivery)
                                    <div class="row gy-3" id="delivery-location-{{ $index + 1 }}">
                                        <p class="dw-semibold mb-2">{{trans_dynamic('company_shipments_edit_form_delivery_info_title')}} <b>{{trans_dynamic('company_shipments_edit_form_delivery_info_sub_title')}} {{ $index + 1 }}</b></p>
                                        <div class="col-xl-12 choices-control">
                                            <select class="form-control delivery-upload-address" data-trigger name="deliverys_select-{{ $index + 1 }}" id="deliverys_select-{{ $index + 1 }}">
                                                <option value="new_delivery">{{trans_dynamic('company_shipments_edit_form_delivery_info_new_select')}}</option>
                                                @foreach ($deliveryInfo as $deliveryItem)
                                                <option value="{{ $deliveryItem->id }}" {{ $delivery['name'] == $deliveryItem->infoArray['name'] ? 'selected' : '' }}>
                                                    {{ $deliveryItem->infoArray['name'] }} ({{ $deliveryItem->infoArray['company_name'] }})
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4"> 
                                            <input type="text" name="deliverys_company_{{ $index + 1 }}" class="form-control" id="deliverys-company-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_delivery_info_company_name')}}" value="{{ $delivery['company_name'] }}">
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" name="deliverys_name_{{ $index + 1 }}" class="form-control" id="deliverys-name-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_delivery_info_name_and_surname')}}" value="{{ $delivery['name'] }}">
                                        </div>
                                        <div class="col-xl-4">
                                            <input type="text" name="deliverys_phone_{{ $index + 1 }}" class="form-control" id="deliverys-phone-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_delivery_info_phone')}}" value="{{ $delivery['phone'] }}">
                                        </div>
                                        <div class="col-xl-3">
                                            <input type="text" name="deliverys_street_{{ $index + 1 }}" class="form-control" id="deliverys-street-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_delivery_info_street')}}" value="{{ $delivery['street'] }}">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <input type="text" name="deliverys_zip_{{ $index + 1 }}" class="form-control" id="deliverys-zip-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_delivery_info_zip_code')}}" value="{{ $delivery['zip_code'] }}">
                                        </div>
                                        <div class="col-xl-3">
                                            <input type="text" name="deliverys_city_{{ $index + 1 }}" class="form-control" id="deliverys-city-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_delivery_info_city')}}" value="{{ $delivery['city'] }}">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <select class="form-select" name="deliverys_country_{{ $index + 1 }}" id="deliverys-country-{{ $index + 1 }}">
                                                <option value="Deutschland" {{ $delivery['country'] == 'Deutschland' ? 'selected' : '' }}>Deutschland</option>
                                                <option value="Niederlande" {{ $delivery['country'] == 'Niederlande' ? 'selected' : '' }}>Niederlande</option>
                                                <option value="Österreich" {{ $delivery['country'] == 'Österreich' ? 'selected' : '' }}>Österreich</option>
                                                <option value="Dänemark" {{ $delivery['country'] == 'Dänemark' ? 'selected' : '' }}>Dänemark</option>
                                                <option value="Schweden" {{ $delivery['country'] == 'Schweden' ? 'selected' : '' }}>Schweden</option>
                                                <option value="Frankreich" {{ $delivery['country'] == 'Frankreich' ? 'selected' : '' }}>Frankreich</option>
                                                <option value="Belgien" {{ $delivery['country'] == 'Belgien' ? 'selected' : '' }}>Belgien</option>
                                                <option value="Italien" {{ $delivery['country'] == 'Italien' ? 'selected' : '' }}>Italien</option>
                                                <option value="Griechenland" {{ $delivery['country'] == 'Griechenland' ? 'selected' : '' }}>Griechenland</option>
                                                <option value="Schweiz" {{ $delivery['country'] == 'Schweiz' ? 'selected' : '' }}>Schweiz</option>
                                                <option value="Polen" {{ $delivery['country'] == 'Polen' ? 'selected' : '' }}>Polen</option>
                                                <option value="Kroatien" {{ $delivery['country'] == 'Kroatien' ? 'selected' : '' }}>Kroatien</option>
                                                <option value="Rumänien" {{ $delivery['country'] == 'Rumänien' ? 'selected' : '' }}>Rumänien</option>
                                                <option value="Tschechien" {{ $delivery['country'] == 'Tschechien' ? 'selected' : '' }}>Tschechien</option>
                                                <option value="Serbien" {{ $delivery['country'] == 'Serbien' ? 'selected' : '' }}>Serbien</option>
                                                <option value="Ungarn" {{ $delivery['country'] == 'Ungarn' ? 'selected' : '' }}>Ungarn</option>
                                                <option value="Bulgarien" {{ $delivery['country'] == 'Bulgarien' ? 'selected' : '' }}>Bulgarien</option>
                                                <option value="Russland" {{ $delivery['country'] == 'Russland' ? 'selected' : '' }}>Russland</option>
                                                <option value="Weißrussland" {{ $delivery['country'] == 'Weißrussland' ? 'selected' : '' }}>Weißrussland</option>
                                                <option value="Türkei" {{ $delivery['country'] == 'Türkei' ? 'selected' : '' }}>Türkei</option>
                                                <option value="Norwegen" {{ $delivery['country'] == 'Norwegen' ? 'selected' : '' }}>Norwegen</option>
                                                <option value="England" {{ $delivery['country'] == 'England' ? 'selected' : '' }}>England</option>
                                                <option value="Irland" {{ $delivery['country'] == 'Irland' ? 'selected' : '' }}>Irland</option>
                                                <option value="Ukraine" {{ $delivery['country'] == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                                <option value="Spanien" {{ $delivery['country'] == 'Spanien' ? 'selected' : '' }}>Spanien</option>
                                                <option value="Slowenien" {{ $delivery['country'] == 'Slowenien' ? 'selected' : '' }}>Slowenien</option>
                                                <option value="Slowakei" {{ $delivery['country'] == 'Slowakei' ? 'selected' : '' }}>Slowakei</option>
                                                <option value="Portugal" {{ $delivery['country'] == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                                <option value="Luxemburg" {{ $delivery['country'] == 'Luxemburg' ? 'selected' : '' }}>Luxemburg</option>
                                                <option value="Liechtenstein" {{ $delivery['country'] == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                                                <option value="Litauen" {{ $delivery['country'] == 'Litauen' ? 'selected' : '' }}>Litauen</option>
                                                <option value="Lettland" {{ $delivery['country'] == 'Lettland' ? 'selected' : '' }}>Lettland</option>
                                                <option value="Kasachstan" {{ $delivery['country'] == 'Kasachstan' ? 'selected' : '' }}>Kasachstan</option>
                                                <option value="Island" {{ $delivery['country'] == 'Island' ? 'selected' : '' }}>Island</option>
                                                <option value="Estland" {{ $delivery['country'] == 'Estland' ? 'selected' : '' }}>Estland</option>
                                                <option value="Finnland" {{ $delivery['country'] == 'Finnland' ? 'selected' : '' }}>Finnland</option>
                                                <option value="Bosnien und Herzegowina" {{ $delivery['country'] == 'Bosnien und Herzegowina' ? 'selected' : '' }}>Bosnien und Herzegowina</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3"> 
                                            <input type="date" name="deliverys_upload_date_{{ $index + 1 }}" class="form-control" id="deliverys-loaded-date-{{ $index + 1 }}" value="{{ $delivery['upload_date'] }}">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <input type="time" name="deliverys_time_start_{{ $index + 1 }}" class="form-control" id="deliverys-start-time-{{ $index + 1 }}" value="{{ $delivery['time_start'] }}">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <input type="time" name="deliverys_time_end_{{ $index + 1 }}" class="form-control" id="deliverys-end-time-{{ $index + 1 }}" value="{{ $delivery['time_end'] }}">
                                        </div>
                                        <div class="col-xl-3"> 
                                            <input type="text" name="deliverys_ref_no_{{ $index + 1 }}" class="form-control" id="deliverys-ref-no-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_delivery_info_reference')}}" value="{{ $delivery['ref_no'] }}">
                                        </div>
                                        <div class="col-xl-12"> 
                                            {{-- <label for="deliverys-content-{{ $index + 1 }}" class="form-label">Inhalt:</label> --}}
                                            <textarea class="form-control" name="deliverys_content_{{ $index + 1 }}" id="deliverys-content-{{ $index + 1 }}" placeholder="{{trans_dynamic('company_shipments_edit_form_delivery_info_details')}}" rows="3">{{ $delivery['content'] }}</textarea>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-xl-12"> 
                                    <button class="btn btn-light" id="edit-add-delivery-location" type="button"><i class="bi bi-plus-lg"></i> {{trans_dynamic('company_shipments_edit_form_delivery_info_button')}}</button>
                                </div>
                                {{-- Teslimat Yerleri Bitiş --}}
                                
                                {{-- price --}}
                                <div class="col-xl-12"> 
                                    {{-- <label for="delivery-company-name-1" class="form-label">Gebühr :</label> --}}
                                    <input type="number" name="price" class="form-control" id="delivery-company-name-1" value="{{$shipment->price}}" placeholder="{{trans_dynamic('company_shipments_edit_form_price')}}">
                                </div>
                                @if ($shipment->carrier !== null)
                                <div class="col-xl-12"> 
                                    <input type="number" name="carrier_price" class="form-control" value="{{$shipment->carrier_price}}" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_price')}}">
                                </div>
                                @else
                                <div class="col-xl-12" id="shipment_price" style="display: none"> 
                                    <input type="number" name="carrier_price" class="form-control" placeholder="{{trans_dynamic('company_shipments_edit_form_carrier_price')}}">
                                </div>
                                @endif
                                {{-- price --}}
                                
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            {{-- <button class="btn btn-light me-1 d-inline-flex "><i class="ri-eye-line me-1 align-middle"></i>Sicht</button> --}}
                            <button type="submit" class="btn btn-primary d-inline-flex ">{{trans_dynamic('company_shipments_edit_form_button_save')}} <i class="ri-send-plane-2-line ms-1 align-middle"></i></button>
                        </div>
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
    var uploadInfo = @json($shipment->upload_info);
    var shipmentIndex = {{ count($shipment->upload_info) }};
    var deliveryIndex = {{ count($shipment->delivery_info) }};
</script>

<script src="{{asset('/assets/js/logispro-edit-shipment.js')}}"></script>
@endsection