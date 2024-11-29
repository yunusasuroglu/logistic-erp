@extends('layouts.layout')
@section('title', 'Şirket Güncelle')
@section('content')
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">Şirket Güncelle</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('companies')}}" class="text-white-50">Şirketler</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Şirket Güncelle</li>
    </ol>
</div>
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start:: row-6 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Şirket Oluştur
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('companies.update', $company->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Şirket İsim:</label>
                                    <input type="text" name="name" value="{{$company->name}}" class="form-control" placeholder="İsim" aria-label="İsim">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Vergi NO:</label>
                                    <input type="text" name="tax_number" value="{{$company->tax_number}}" class="form-control" placeholder="Vergi No" aria-label="Vergi No">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Telefon:</label>
                                    <input type="text" name="phone" class="form-control" value="{{$company->phone}}" placeholder="Telefon" aria-label="Telefon">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">E-Posta:</label>
                                    <input type="email" name="email" value="{{$company->email}}" class="form-control" placeholder="E-Posta" aria-label="email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Fax:</label>
                                    <input type="text" name="fax" value="{{$company->fax}}" class="form-control" placeholder="Fax" aria-label="Fax">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">HRB:</label>
                                    <input type="text" name="hrb" value="{{$company->hrb}}" class="form-control" placeholder="HRB" aria-label="HRB">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">İban:</label>
                                    <input type="text" name="iban" value="{{$company->iban}}" class="form-control" placeholder="İban" aria-label="İban">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Bic:</label>
                                    <input type="text" name="bic" value="{{$company->bic}}" class="form-control" placeholder="bic" aria-label="bic">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">StNr:</label>
                                    <input type="text" name="stnr" value="{{$company->stnr}}" class="form-control" placeholder="StNr" aria-label="StNr">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Ust Id Nr:</label>
                                    <input type="text" name="ust_id_nr" value="{{$company->ust_id_nr}}" class="form-control" placeholder="Ust Id Nr" aria-label="Ust Id Nr">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Registry Court:</label>
                                    <input type="text" name="registry_court" value="{{$company->registry_court}}" class="form-control" placeholder="Registry Court" aria-label="Registry Court">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">General Manager:</label>
                                    <input type="text" name="general_manager" value="{{$company->general_manager}}" class="form-control" placeholder="General Manager" aria-label="General Manager">
                                </div>
                                {{-- Adres Bilgileri Başlangıç --}}
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Sokak:</label>
                                    <input type="text" name="street" value="{{ json_decode($company->address)->street  ?? '' }}" class="form-control" placeholder="Sokak" aria-label="Sokak">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Posta Kodu:</label>
                                    <input type="text" name="zip_code" value="{{ json_decode($company->address)->zip_code  ?? '' }}" class="form-control" placeholder="Posta Kodu" aria-label="Posta Kodu">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">İl:</label>
                                    <input type="text" name="city" value="{{ json_decode($company->address)->city  ?? '' }}" class="form-control" placeholder="İl" aria-label="İl">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Ülke:</label>
                                    <input type="text" name="country" value="{{ json_decode($company->address)->country  ?? '' }}" class="form-control" placeholder="Ülke" aria-label="Ülke">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Ülke:</label>
                                    <select class="form-select" name="country" id="country">
                                        <option value="Deutschland" {{ json_decode($company->address)->country == 'Deutschland' ? 'selected' : '' }}>Deutschland</option>
                                        <option value="Niederlande" {{ json_decode($company->address)->country == 'Niederlande' ? 'selected' : '' }}>Niederlande</option>
                                        <option value="Österreich" {{ json_decode($company->address)->country == 'Österreich' ? 'selected' : '' }}>Österreich</option>
                                        <option value="Dänemark" {{ json_decode($company->address)->country == 'Dänemark' ? 'selected' : '' }}>Dänemark</option>
                                        <option value="Schweden" {{ json_decode($company->address)->country == 'Schweden' ? 'selected' : '' }}>Schweden</option>
                                        <option value="Frankreich" {{ json_decode($company->address)->country == 'Frankreich' ? 'selected' : '' }}>Frankreich</option>
                                        <option value="Belgien" {{ json_decode($company->address)->country == 'Belgien' ? 'selected' : '' }}>Belgien</option>
                                        <option value="Italien" {{ json_decode($company->address)->country == 'Italien' ? 'selected' : '' }}>Italien</option>
                                        <option value="Griechenland" {{ json_decode($company->address)->country == 'Griechenland' ? 'selected' : '' }}>Griechenland</option>
                                        <option value="Schweiz" {{ json_decode($company->address)->country == 'Schweiz' ? 'selected' : '' }}>Schweiz</option>
                                        <option value="Polen" {{ json_decode($company->address)->country == 'Polen' ? 'selected' : '' }}>Polen</option>
                                        <option value="Kroatien" {{ json_decode($company->address)->country == 'Kroatien' ? 'selected' : '' }}>Kroatien</option>
                                        <option value="Rumänien" {{ json_decode($company->address)->country == 'Rumänien' ? 'selected' : '' }}>Rumänien</option>
                                        <option value="Tschechien" {{ json_decode($company->address)->country == 'Tschechien' ? 'selected' : '' }}>Tschechien</option>
                                        <option value="Serbien" {{ json_decode($company->address)->country == 'Serbien' ? 'selected' : '' }}>Serbien</option>
                                        <option value="Ungarn" {{ json_decode($company->address)->country == 'Ungarn' ? 'selected' : '' }}>Ungarn</option>
                                        <option value="Bulgarien" {{ json_decode($company->address)->country == 'Bulgarien' ? 'selected' : '' }}>Bulgarien</option>
                                        <option value="Russland" {{ json_decode($company->address)->country == 'Russland' ? 'selected' : '' }}>Russland</option>
                                        <option value="Weißrussland" {{ json_decode($company->address)->country == 'Weißrussland' ? 'selected' : '' }}>Weißrussland</option>
                                        <option value="Türkei" {{ json_decode($company->address)->country == 'Türkei' ? 'selected' : '' }}>Türkei</option>
                                        <option value="Norwegen" {{ json_decode($company->address)->country == 'Norwegen' ? 'selected' : '' }}>Norwegen</option>
                                        <option value="England" {{ json_decode($company->address)->country == 'England' ? 'selected' : '' }}>England</option>
                                        <option value="Irland" {{ json_decode($company->address)->country == 'Irland' ? 'selected' : '' }}>Irland</option>
                                        <option value="Ukraine" {{ json_decode($company->address)->country == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                        <option value="Spanien" {{ json_decode($company->address)->country == 'Spanien' ? 'selected' : '' }}>Spanien</option>
                                        <option value="Slowenien" {{ json_decode($company->address)->country == 'Slowenien' ? 'selected' : '' }}>Slowenien</option>
                                        <option value="Slowakei" {{ json_decode($company->address)->country == 'Slowakei' ? 'selected' : '' }}>Slowakei</option>
                                        <option value="Portugal" {{ json_decode($company->address)->country == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                        <option value="Luxemburg" {{ json_decode($company->address)->country == 'Luxemburg' ? 'selected' : '' }}>Luxemburg</option>
                                        <option value="Liechtenstein" {{ json_decode($company->address)->country == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                                        <option value="Litauen" {{ json_decode($company->address)->country == 'Litauen' ? 'selected' : '' }}>Litauen</option>
                                        <option value="Lettland" {{ json_decode($company->address)->country == 'Lettland' ? 'selected' : '' }}>Lettland</option>
                                        <option value="Kasachstan" {{ json_decode($company->address)->country == 'Kasachstan' ? 'selected' : '' }}>Kasachstan</option>
                                        <option value="Island" {{ json_decode($company->address)->country == 'Island' ? 'selected' : '' }}>Island</option>
                                        <option value="Estland" {{ json_decode($company->address)->country == 'Estland' ? 'selected' : '' }}>Estland</option>
                                        <option value="Finnland" {{ json_decode($company->address)->country == 'Finnland' ? 'selected' : '' }}>Finnland</option>
                                        <option value="Bosnien und Herzegowina" {{ json_decode($company->address)->country == 'Bosnien und Herzegowina' ? 'selected' : '' }}>Bosnien und Herzegowina</option>
                                    </select>
                                </div>
                                {{-- Adres Bilgileri Bitiş --}}
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
                                </div>
                            </div>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End:: row-6 -->
        
    </div>
</div>
@endsection