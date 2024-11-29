@extends('layouts.layout')
@php
$title = trans_dynamic('edit_profile_page_title');
@endphp
@section('title', $title)
@section('content')
<!-- Page Header -->
<div class="d-sm-flex d-block align-items-center justify-content-between page-header-breadcrumb">
    <h4 class="fw-medium mb-0">{{trans_dynamic('company_profile_edit_name')}}</h4>
    <div class="ms-sm-1 ms-0">
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('company.profile')}}">{{trans_dynamic('company_profile_edit_name')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$company->name}}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header Close -->



<!-- Start::app-content -->
<div class="main-content app-content">
    <div class="container">
        
        <!-- Start::row-1 -->
        <div class="card custom-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 col-lg-3">
                        <nav class="nav nav-tabs flex-column nav-style-5" role="tablist">
                            <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page" href="#personal-info" aria-selected="true"><i class="bx bx-cog me-2 fs-18 align-middle"></i>{{trans_dynamic('company_profile_edit_tab_company_info')}}</a>
                            <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#personal-add" aria-selected="true"><i class="bx bx-home me-2 fs-18 align-middle"></i>{{trans_dynamic('company_profile_edit_tab_company_address')}}</a>
                        </nav>
                    </div>
                    <div class="col-xl-10 col-lg-9">
                        <div class="tab-content mail-setting-tab mt-4 mt-lg-0">
                            <div class="tab-pane text-muted active show" id="personal-info" role="tabpanel">
                                <div class="p-3">
                                    <h6 class="fw-semibold mb-3">
                                        {{trans_dynamic('company_profile_edit_company_info_name')}}
                                    </h6>
                                    <div class="mb-4 d-sm-flex align-items-center">
                                        <div class="mb-0 me-sm-5 d-sm-flex align-items-center">
                                            <form action="{{ route('company.profile.photo.update') }}" method="POST" enctype="multipart/form-data" id="profile-form">
                                                @csrf
                                                @method('PUT')
                                            
                                                <span class="avatar avatar-xxl">
                                                    <img src="{{ asset($company->profile_image) }}" alt="" id="profile-img">
                                                    <label for="profile-change" class="badge rounded-pill bg-primary avatar-badge" style="cursor: pointer;">
                                                        <i class="fe fe-camera"></i>
                                                    </label>
                                                    <input type="file" name="photo" class="position-absolute w-100 h-100 opacity-0" id="profile-change" accept="image/*">
                                                </span>
                                            </form>
                                            
                                            <div class="ms-sm-3">
                                                <h5 class="text-dark mb-1">{{$company->name}}</h5>
                                                <p class="text-muted mb-0">
                                                    <span class=" me-2">{{trans_dynamic('company_profile_edit_company_info_phone')}}</span><span>{{$company->phone}}</span>
                                                </p>
                                                <p class="text-muted mb-0">
                                                    <span class="">{{trans_dynamic('company_profile_edit_company_info_email')}}</span><span> {{$company->email}}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <button type="button" id="submit-btn" class="btn btn-success" style="display: none;">{{trans_dynamic('company_profile_edit_company_info_profile_image_save')}}</button>
                                        <script>
                                            document.getElementById('profile-change').addEventListener('change', function() {
                                                if (this.files && this.files[0]) {
                                                    var reader = new FileReader();
                                        
                                                    reader.onload = function(e) {
                                                        document.getElementById('profile-img').setAttribute('src', e.target.result);
                                                        document.getElementById('submit-btn').style.display = 'block'; // Butonu görünür yap
                                                    }
                                        
                                                    reader.readAsDataURL(this.files[0]);
                                                }
                                            });
                                        
                                            // Butona tıklanınca formu gönder
                                            document.getElementById('submit-btn').addEventListener('click', function() {
                                                document.getElementById('profile-form').submit();
                                            });
                                        </script>
                                    </div>
                                    <form action="{{route('company.profile.update')}}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row gy-4 mb-4">
                                            <div class="col-xl-6">
                                                <label for="first-name" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_company_name')}}</label>
                                                <input type="text" name="name" class="form-control" id="first-name" value="{{$company->name}}" placeholder="{{trans_dynamic('company_profile_edit_company_info_form_placeholder_company_name')}}">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="tax_number" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_tax_number')}}</label>
                                                <input type="text" name="tax_number" class="form-control" id="tax_number" value="{{$company->tax_number}}" placeholder="{{trans_dynamic('company_profile_edit_company_info_form_placeholder_tax_number')}}">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="phone" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_phone')}}</label>
                                                <input type="text" name="phone" class="form-control" id="phone" value="{{$company->phone}}" placeholder="{{trans_dynamic('company_profile_edit_company_info_form_placeholder_phone')}}">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="email-address" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_email')}}</label>
                                                <input type="text" name="email" class="form-control" value="{{$company->email}}" id="email-address" placeholder="{{trans_dynamic('edit_profile_info_form_placeholder_placeholder_email')}}">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="fax" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_fax')}}</label>
                                                <input type="text" name="fax" class="form-control" id="fax" value="{{$company->fax}}" placeholder="{{trans_dynamic('company_profile_edit_company_info_form_placeholder_fax')}}">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="hrb" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_hrb')}}</label>
                                                <input type="text" name="hrb" class="form-control" id="hrb" value="{{$company->hrb}}" placeholder="{{trans_dynamic('company_profile_edit_company_info_form_placeholder_hrb')}}">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="iban" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_iban')}}</label>
                                                <input type="text" name="iban" class="form-control" id="iban" value="{{$company->iban}}" placeholder="{{trans_dynamic('company_profile_edit_company_info_form_placeholder_iban')}}">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="bic" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_bic')}}</label>
                                                <input type="text" name="bic" class="form-control" id="bic" value="{{$company->bic}}" placeholder="{{trans_dynamic('company_profile_edit_company_info_form_placeholder_bic')}}">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="stnr" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_stnr')}}</label>
                                                <input type="text" name="stnr" class="form-control" id="stnr" value="{{$company->stnr}}" placeholder="{{trans_dynamic('company_profile_edit_company_info_form_placeholder_stnr')}}">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="ust_id_nr" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_ustidmr')}}</label>
                                                <input type="text" name="ust_id_nr" class="form-control" id="ust_id_nr" value="{{$company->ust_id_nr}}" placeholder="{{trans_dynamic('company_profile_edit_company_info_form_placeholder_ustidnr')}}">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="registry_court" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_registry_court')}}</label>
                                                <input type="text" name="registry_court" class="form-control" id="registry_court" value="{{$company->registry_court}}" placeholder="{{trans_dynamic('company_profile_edit_company_info_form_placeholder_registry_court')}}">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="general_manager" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_general_manager')}}</label>
                                                <input type="text" name="general_manager" class="form-control" id="general_manager" value="{{$company->general_manager}}" placeholder="{{trans_dynamic('company_profile_edit_company_info_form_placeholder_general_manager')}}">
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="logo" class="form-label">{{trans_dynamic('company_profile_edit_company_info_form_logo')}}</label>
                                                <input type="file" name="logo" class="form-control" value="{{$company->logo}}" id="logo">
                                            </div>
                                            <div class="col-xl-12">
                                                <button type="submit" class="btn btn-primary">{{trans_dynamic('company_profile_edit_company_info_form_save')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane text-muted" id="personal-add" role="tabpanel">
                                <div class="p-3">
                                    <h6 class="fw-semibold mb-3">
                                        Firmenadresse :
                                    </h6>
                                    <form action="{{route('company.profile.address.update')}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row gy-4 mb-4">
                                            <div class="col-xl-3">
                                                <label for="address-street" class="form-label">{{trans_dynamic('company_profile_edit_company_address_form_street')}}</label>
                                                <input type="text" name="street" value="{{ json_decode($company->address)->street  ?? '' }}" class="form-control" id="address-street" placeholder="{{trans_dynamic('company_profile_edit_company_address_form_placeholder_street')}}">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="address-zip-code" class="form-label">{{trans_dynamic('company_profile_edit_company_address_form_zip_code')}}</label>
                                                <input type="text" name="zip_code" value="{{ json_decode($company->address)->zip_code  ?? '' }}" class="form-control" id="address-zip-code" placeholder="{{trans_dynamic('company_profile_edit_company_address_form_placeholder_zip_code')}}">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="address-city" class="form-label">{{trans_dynamic('company_profile_edit_company_address_form_city')}}</label>
                                                <input type="text" value="{{ json_decode($company->address)->city  ?? '' }}" name="city" class="form-control" id="address-city" placeholder="{{trans_dynamic('company_profile_edit_company_address_form_placeholder_city')}}">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="address-country" class="form-label">{{trans_dynamic('company_profile_edit_company_address_form_country')}}</label>
                                                <select class="form-select" name="country" id="CountrySelect">
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
                                            <div class="col-xl-12">
                                                <button type="submit" class="btn btn-primary">{{trans_dynamic('company_profile_edit_company_address_form_save')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
<!-- End::app-content -->
@endsection