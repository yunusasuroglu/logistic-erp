@extends('layouts.app')
@php
    $title = trans_dynamic('register_page_title');
@endphp
@section('title', $title)
@section('content')
<div class="error-page  ">
    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                <div class="my-5 d-flex justify-content-center">
                    <a href="{{route('login')}}">
                        <img style="width: 100%;" src="{{asset('/')}}assets/images/systems-logo/logo-dark.png" alt="logo" class="desktop-logo">
                        <img src="{{asset('/')}}assets/images/systems-logo/logo-dark.png" alt="logo" class="desktop-dark">
                    </a>
                </div>
                <div class="card custom-card rectangle2">
                    <div class="card-body p-5 rectangle3">
                        <div class="row gy-3">
                            <ul class="nav nav-pills mb-3 nav-justified tab-style-5 d-sm-flex d-block" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#company_register" type="button" role="tab" aria-controls="pills-home" aria-selected="false" tabindex="-1">{{trans_dynamic('register_company_register')}}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#user_register" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">{{trans_dynamic('register_person_register')}}</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div style="border: none;" class="tab-pane text-muted active show" id="company_register" role="tabpanel">
                                    <p class="h4 fw-semibold mb-2 text-center">{{trans_dynamic('register_company_page_name')}}</p>
                                    <p class="mb-4 text-muted op-7 fw-normal text-center">{{trans_dynamic('register_company_page_sub_name')}}</p>
                                    <form method="POST" class="" action="{{ route('register') }}">
                                        @csrf
                                        <input type="hidden" name="user_type" value="company" id="">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-company_name" class="form-label d-block">{{trans_dynamic('register_company_form_company_name')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name"  placeholder="{{trans_dynamic('register_company_form_company_placeholder_name')}}" required autocomplete="company_name">
                                                        @error('company_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-company_phone" class="form-label d-block">{{trans_dynamic('register_company_form_company_phone')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_phone" type="text" class="form-control @error('company_phone') is-invalid @enderror" name="company_phone"  placeholder="{{trans_dynamic('register_company_form_company_placeholder_phone')}}" required autocomplete="company_phone">
                                                        @error('company_phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-company_email" class="form-label d-block">{{trans_dynamic('register_company_form_company_email')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_email" type="email" class="form-control @error('company_email') is-invalid @enderror" name="company_email"  placeholder="{{trans_dynamic('register_company_form_company_placeholder_email')}}" required autocomplete="company_email">
                                                        @error('company_email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-company_tax-number" class="form-label d-block">{{trans_dynamic('register_company_form_company_tax')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_tax-number" type="text" class="form-control @error('tax_number') is-invalid @enderror" name="tax_number"  placeholder="{{trans_dynamic('register_company_form_company_placeholder_tax')}}" required autocomplete="tax_number">
                                                        @error('tax_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-company_fax" class="form-label d-block">Fax</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_fax" type="text" class="form-control @error('fax') is-invalid @enderror" name="fax"  placeholder="Fax" required autocomplete="fax">
                                                        @error('fax')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-company_hrb" class="form-label d-block">HRB</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_hrb" type="text" class="form-control @error('hrb') is-invalid @enderror" name="hrb"  placeholder="HRB" required autocomplete="hrb">
                                                        @error('hrb')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-company_stnr" class="form-label d-block">StNr</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_stnr" type="text" class="form-control @error('stnr') is-invalid @enderror" name="stnr"  placeholder="StNr" required autocomplete="stnr">
                                                        @error('stnr')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-company_ust_id_nr" class="form-label d-block">Ust-Id Nr</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_ust_id_nr" type="text" class="form-control @error('ust_id_nr') is-invalid @enderror" name="ust_id_nr"  placeholder="Ust Id Nr" required autocomplete="ust_id_nr">
                                                        @error('ust_id_nr')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-company_iban" class="form-label d-block">İban</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_iban" type="text" class="form-control @error('iban') is-invalid @enderror" name="iban"  placeholder="Iban" required autocomplete="iban">
                                                        @error('iban')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-company_bic" class="form-label d-block">Bic</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_bic" type="text" class="form-control @error('bic') is-invalid @enderror" name="bic"  placeholder="Bic" required autocomplete="bic">
                                                        @error('bic')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-company_registry_court" class="form-label d-block">Registry Court</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_registry_court" type="text" class="form-control @error('registry_court') is-invalid @enderror" name="registry_court"  placeholder="Registry Court" required autocomplete="registry_court">
                                                        @error('registry_court')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-company_general_manager" class="form-label d-block">General Manager</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_general_manager" type="text" class="form-control @error('general_manager') is-invalid @enderror" name="general_manager"  placeholder="General Manager" required autocomplete="general_manager">
                                                        @error('general_manager')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-company_street" class="form-label d-block">{{trans_dynamic('register_company_form_company_street')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_street" type="text" class="form-control @error('company_street') is-invalid @enderror" name="company_street"  placeholder="{{trans_dynamic('register_company_form_company_placeholder_street')}}" required autocomplete="company_street">
                                                        @error('company_street')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-company_zip_code" class="form-label d-block">{{trans_dynamic('register_company_form_company_zip_code')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_zip_code" type="text" class="form-control @error('company_zip_code') is-invalid @enderror" name="company_zip_code"  placeholder="{{trans_dynamic('register_company_form_company_placeholder_zip_code')}}" required autocomplete="company_zip_code">
                                                        @error('company_zip_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-company_city" class="form-label d-block">{{trans_dynamic('register_company_form_company_city')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-company_city" type="text" class="form-control @error('company_city') is-invalid @enderror" name="company_city"  placeholder="{{trans_dynamic('register_company_form_company_placeholder_city')}}" required autocomplete="company_city">
                                                        @error('company_city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-company_country" class="form-label d-block">{{trans_dynamic('register_company_form_company_country')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <select class="form-select @error('company_country') is-invalid @enderror" name="company_country" id="contactsSelect"  required autocomplete="company_country">
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
                                                        @error('company_country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="text-center my-4 authentication-barrier">
                                                    <span>{{trans_dynamic('register_company_admin_title')}}</span>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="signin-name" class="form-label">{{trans_dynamic('register_company_form_admin_name')}}</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{trans_dynamic('register_company_form_admin_placeholder_name')}}" required autocomplete="name" autofocus>
                                                    
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-xl-6">
                                                    <label for="signin-surname" class="form-label">{{trans_dynamic('register_company_form_admin_surname')}}</label>
                                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="{{trans_dynamic('register_company_form_admin_placeholder_surname')}}" required autocomplete="surname" autofocus>
                                                    
                                                    @error('surname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-email" class="form-label">{{trans_dynamic('register_company_form_admin_email')}}</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{trans_dynamic('register_company_form_admin_placeholder_email')}}" required autocomplete="email">
                                                    
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-phone" class="form-label">{{trans_dynamic('register_company_form_admin_phone')}}</label>
                                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="{{trans_dynamic('register_company_form_admin_placeholder_phone')}}" required autocomplete="phone">
                                                    
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-street" class="form-label d-block">{{trans_dynamic('register_company_form_admin_street')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-street"  type="text" class="form-control @error('street') is-invalid @enderror" name="street"  placeholder="{{trans_dynamic('register_company_form_admin_placeholder_street')}}" required autocomplete="street">
                                                        @error('street')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-zip_code" class="form-label d-block">{{trans_dynamic('register_company_form_admin_zip_code')}}:</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-zip_code"  type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code"  placeholder="{{trans_dynamic('register_company_form_admin_placeholder_zip_code')}}" required autocomplete="zip_code">
                                                        @error('zip_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-city" class="form-label d-block">{{trans_dynamic('register_company_form_admin_city')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-city" type="text" class="form-control @error('city') is-invalid @enderror" name="city"  placeholder="{{trans_dynamic('register_company_form_admin_placeholder_city')}}" required autocomplete="city">
                                                        @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 mt-2">
                                                    <label for="signin-country" class="form-label d-block">{{trans_dynamic('register_company_form_admin_country')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <select class="form-select @error('country') is-invalid @enderror" name="country" id="countrySelect"  required autocomplete="country">
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
                                                        @error('country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-password" class="form-label mt-2 d-block">{{trans_dynamic('register_company_form_password')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="{{trans_dynamic('register_company_form_placeholder_password')}}" required autocomplete="new-password">
                                                        <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 mt-2">
                                                    <label for="signin-password" class="form-label mt-2 d-block">{{trans_dynamic('register_company_form_password_confirm')}}</label>
                                                    <div class="input-group mt-2 ">
                                                        <input id="signin-new-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"  placeholder="{{trans_dynamic('register_company_form_placeholder_password_confirm')}}" required autocomplete="new-password">
                                                        <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('signin-new-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 d-grid mt-3">
                                                    <button type="submit" class="btn btn-lg btn-primary">{{trans_dynamic('register_company_form_register')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div style="border: none;" class="tab-pane text-muted" id="user_register" role="tabpanel">
                                    <p class="h4 fw-semibold mb-2 text-center">{{trans_dynamic('register_person_page_name')}}</p>
                                    <p class="mb-4 text-muted op-7 fw-normal text-center">{{trans_dynamic('register_person_page_sub_name')}}</p>
                                    <form method="POST" id="form2" action="{{ route('register') }}">
                                        @csrf
                                        <input type="hidden" name="user_type" value="person" id="">
                                        <div class="row">
                                            <div class="col-xl-6 mt-3">
                                                <label for="signin-name" class="form-label">{{trans_dynamic('register_person_form_name')}}</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{trans_dynamic('register_person_form_placeholder_name')}}" required autocomplete="name" autofocus>
                                                
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 mt-3">
                                                <label for="signin-surname" class="form-label">{{trans_dynamic('register_person_form_surname')}}</label>
                                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="{{trans_dynamic('register_person_form_placeholder_surname')}}" required autocomplete="surname" autofocus>
                                                
                                                @error('surname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 mt-2">
                                                <label for="signin-email" class="form-label">{{trans_dynamic('register_person_form_email')}}</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{trans_dynamic('register_person_form_placeholder_email')}}" required autocomplete="email">
                                                
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 mt-2">
                                                <label for="signin-phone" class="form-label">{{trans_dynamic('register_person_form_phone')}}</label>
                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="{{trans_dynamic('register_person_form_placeholder_phone')}}" required autocomplete="phone">
                                                
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-12 mt-2">
                                                <label for="signin-reference" class="form-label">{{trans_dynamic('register_person_form_reference_code')}}</label>
                                                <input id="company_reference" type="text" class="form-control @error('company_reference') is-invalid @enderror" name="company_reference" placeholder="{{trans_dynamic('register_person_form_placeholder_reference_code')}}" required autocomplete="Şirket Kodu">
                                                @error('company_reference')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-6 mt-2">
                                                <label for="signin-password" class="form-label mt-2 d-block">{{trans_dynamic('register_person_form_password')}}</label>
                                                <div class="input-group mt-2 ">
                                                    <input id="signin-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="{{trans_dynamic('register_person_form_placeholder_password')}}" required autocomplete="new-password">
                                                    <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mt-2">
                                                <label for="signin-password" class="form-label mt-2 d-block">{{trans_dynamic('register_person_form_password_confirm')}}</label>
                                                <div class="input-group mt-2 ">
                                                    <input id="signin-new-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"  placeholder="{{trans_dynamic('register_person_form_placeholder_password_confirm')}}" required autocomplete="new-password">
                                                    <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('signin-new-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-12 d-grid mt-3">
                                                <button type="submit" href="index.html" class="btn btn-lg btn-primary">{{trans_dynamic('register_person_form_register')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="fs-12 text-muted mt-2">{{trans_dynamic('register_form_do_you_have_an_account')}} <a href="{{route('login')}}" class="text-primary">{{trans_dynamic('register_form_do_you_have_an_account_login')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
