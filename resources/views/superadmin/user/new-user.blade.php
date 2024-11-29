@extends('layouts.layout')
@section('title', 'Yeni Kullanıcı Oluştur')
@section('content')
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">Yeni Kullanıcı</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">Kullanıcılar</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Kullanıcı Oluştur</li>
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
                            Kullanıcı Oluştur
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">İsim:</label>
                                    <input type="text" name="name" class="form-control" placeholder="İsim" aria-label="İsim">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Soyisim:</label>
                                    <input type="text" name="surname" class="form-control" placeholder="Soyisim" aria-label="Soyisim">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Telefon:</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Telefon" aria-label="Telefon">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="row">
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">E-Posta:</label>
                                            <input type="email" name="email" class="form-control" placeholder="E-Posta" aria-label="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kullanıcı Türü:</label>
                                    <select name="role" id="inputUser" class="form-select">
                                        <option selected="">Seçilmedi</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kullanıcı Şirketi:</label>
                                    <select name="company_id" id="inputCompany" class="form-select">
                                        <option selected="">Seçilmedi</option>
                                        @foreach($companys as $company)
                                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                            {{ $company->name }}
                                        </option>
                                        @endforeach
                                    </select>
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
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">İl:</label>
                                    <input type="text" name="city" class="form-control" placeholder="İl" aria-label="İl">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Sokak:</label>
                                    <input type="text" name="street" class="form-control" placeholder="Sokak" aria-label="Sokak">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Posta Kodu:</label>
                                    <input type="text" name="zip_code" class="form-control" placeholder="Posta Kodu" aria-label="Posta Kodu">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Şifre:</label>
                                    <input type="password" name="password" class="form-control" placeholder="Şifre" aria-label="İsim Soyisim">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Şifre Tekrar:</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Şifre Tekrar" required>
                                </div>
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