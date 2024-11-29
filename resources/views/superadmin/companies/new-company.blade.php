@extends('layouts.layout')
@section('title', 'Yeni Şirket Oluştur')
@section('content')
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">Yeni Şirket</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('companies')}}" class="text-white-50">Şirketler</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Yeni Şirket</li>
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
                        <form method="POST" action="{{ route('companies.add') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Şirket İsim:</label>
                                    <input type="text" name="name" class="form-control" placeholder="İsim" aria-label="İsim">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Vergi NO:</label>
                                    <input type="text" name="tax_number" class="form-control" placeholder="Vergi No" aria-label="Vergi No">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Telefon:</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Telefon" aria-label="Telefon">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">E-Posta:</label>
                                    <input type="email" name="email" class="form-control" placeholder="E-Posta" aria-label="email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Fax:</label>
                                    <input type="text" name="fax" class="form-control" placeholder="Fax" aria-label="Fax">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">HRB:</label>
                                    <input type="text" name="hrb" class="form-control" placeholder="HRB" aria-label="HRB">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">İban:</label>
                                    <input type="text" name="iban" class="form-control" placeholder="İban" aria-label="İban">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Bic:</label>
                                    <input type="text" name="bic" class="form-control" placeholder="bic" aria-label="bic">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">StNr:</label>
                                    <input type="text" name="stnr" class="form-control" placeholder="StNr" aria-label="StNr">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Ust Id Nr:</label>
                                    <input type="text" name="ust_id_nr" class="form-control" placeholder="Ust Id Nr" aria-label="Ust Id Nr">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Registry Court:</label>
                                    <input type="text" name="registry_court" class="form-control" placeholder="Registry Court" aria-label="Registry Court">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">General Manager:</label>
                                    <input type="text" name="general_manager" class="form-control" placeholder="General Manager" aria-label="General Manager">
                                </div>
                                {{-- Adres Bilgileri Başlangıç --}}
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Sokak:</label>
                                    <input type="text" name="street" class="form-control" placeholder="Sokak" aria-label="Sokak">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Posta Kodu:</label>
                                    <input type="text" name="zip_code" class="form-control" placeholder="Posta Kodu" aria-label="Posta Kodu">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">İl:</label>
                                    <input type="text" name="city" class="form-control" placeholder="İl" aria-label="İl">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Ülke:</label>
                                    <select class="form-select" name="country" id="country">
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
                                 {{-- Adres Bilgileri Bitiş --}}
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Oluştur</button>
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