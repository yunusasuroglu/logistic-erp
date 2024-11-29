@extends('layouts.layout')
@php
    $title = trans_dynamic('persons_edit_page_title');
@endphp
@section('title', $title)
@section('content')
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">{{trans_dynamic('persons_edit_name')}}</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">{{trans_dynamic('persons_edit_persons')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{trans_dynamic('persons_edit_name')}}</li>
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
                        {{trans_dynamic('persons_edit_name')}}
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{trans_dynamic('persons_edit_form_name_surname')}}</label>
                                <input type="text" value="{{$contact->name}}" name="name" class="form-control" placeholder="{{trans_dynamic('persons_edit_form_placeholder_name_surname')}}" aria-label="{{trans_dynamic('persons_edit_form_placeholder_name_surname')}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{trans_dynamic('persons_edit_form_phone')}}</label>
                                <input type="text" value="{{$contact->phone}}" name="phone" class="form-control" placeholder="{{trans_dynamic('persons_edit_form_placeholder_phone')}}" aria-label="{{trans_dynamic('persons_edit_form_placeholder_phone')}}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{trans_dynamic('persons_edit_form_company')}}</label>
                                <input type="text" value="{{$contact->company_name}}" name="company_name" class="form-control" placeholder="{{trans_dynamic('persons_edit_form_placeholder_company')}}" aria-label="{{trans_dynamic('persons_edit_form_placeholder_company')}}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="row">
                                    <div class="col-xl-12 mb-3">
                                        <label class="form-label">{{trans_dynamic('persons_edit_form_email')}}</label>
                                        <input type="email" value="{{$contact->email}}" name="email" class="form-control" placeholder="{{trans_dynamic('persons_edit_form_placeholder_email')}}" aria-label="{{trans_dynamic('persons_edit_form_placeholder_email')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{trans_dynamic('persons_edit_form_person_type')}}</label>
                                <select name="contact_type" id="inputContactType" class="form-select">
                                    <option value="" disabled>{{ trans_dynamic('persons_edit_form_placeholder_person_type') }}</option>
                                    <option value="0" {{ $contact->contact_type == 0 ? 'selected' : '' }}>{{ trans_dynamic('persons_edit_form_person_type_customer') }}</option>
                                    <option value="1" {{ $contact->contact_type == 1 ? 'selected' : '' }}>{{ trans_dynamic('persons_edit_form_person_type_carrier') }}</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">{{ trans_dynamic('persons_edit_form_street') }}</label>
                                <input type="text" name="street" class="form-control" placeholder="{{ trans_dynamic('persons_edit_form_placeholder_street') }}" value="{{ $address['street'] }}" aria-label="{{ trans_dynamic('persons_edit_form_placeholder_street') }}">
                            </div>
                    
                            <div class="col-md-3 mb-3">
                                <label class="form-label">{{ trans_dynamic('persons_edit_form_zip_code') }}</label>
                                <input type="text" name="zip_code" class="form-control" placeholder="{{ trans_dynamic('persons_edit_form_placeholder_zip_code') }}" value="{{ $address['zip_code'] }}" aria-label="{{ trans_dynamic('persons_edit_form_placeholder_zip_code') }}">
                            </div>
                    
                            <div class="col-md-3 mb-3">
                                <label class="form-label">{{ trans_dynamic('persons_edit_form_city') }}</label>
                                <input type="text" name="city" class="form-control" placeholder="{{ trans_dynamic('persons_edit_form_placeholder_city') }}" value="{{ $address['city'] }}" aria-label="{{ trans_dynamic('persons_edit_form_placeholder_city') }}">
                            </div>
                    
                            <div class="col-md-3 mb-3">
                                <label class="form-label">{{trans_dynamic('persons_add_form_country')}}</label>
                                <select class="form-select" name="country" id="countrySelect">
                                    <option value="Deutschland" {{ $address['country'] == 'Deutschland' ? 'selected' : '' }}>Deutschland</option>
                                    <option value="Niederlande" {{ $address['country'] == 'Niederlande' ? 'selected' : '' }}>Niederlande</option>
                                    <option value="Österreich" {{ $address['country'] == 'Österreich' ? 'selected' : '' }}>Österreich</option>
                                    <option value="Dänemark" {{ $address['country'] == 'Dänemark' ? 'selected' : '' }}>Dänemark</option>
                                    <option value="Schweden" {{ $address['country'] == 'Schweden' ? 'selected' : '' }}>Schweden</option>
                                    <option value="Frankreich" {{ $address['country'] == 'Frankreich' ? 'selected' : '' }}>Frankreich</option>
                                    <option value="Belgien" {{ $address['country'] == 'Belgien' ? 'selected' : '' }}>Belgien</option>
                                    <option value="Italien" {{ $address['country'] == 'Italien' ? 'selected' : '' }}>Italien</option>
                                    <option value="Griechenland" {{ $address['country'] == 'Griechenland' ? 'selected' : '' }}>Griechenland</option>
                                    <option value="Schweiz" {{ $address['country'] == 'Schweiz' ? 'selected' : '' }}>Schweiz</option>
                                    <option value="Polen" {{ $address['country'] == 'Polen' ? 'selected' : '' }}>Polen</option>
                                    <option value="Kroatien" {{ $address['country'] == 'Kroatien' ? 'selected' : '' }}>Kroatien</option>
                                    <option value="Rumänien" {{ $address['country'] == 'Rumänien' ? 'selected' : '' }}>Rumänien</option>
                                    <option value="Tschechien" {{ $address['country'] == 'Tschechien' ? 'selected' : '' }}>Tschechien</option>
                                    <option value="Serbien" {{ $address['country'] == 'Serbien' ? 'selected' : '' }}>Serbien</option>
                                    <option value="Ungarn" {{ $address['country'] == 'Ungarn' ? 'selected' : '' }}>Ungarn</option>
                                    <option value="Bulgarien" {{ $address['country'] == 'Bulgarien' ? 'selected' : '' }}>Bulgarien</option>
                                    <option value="Russland" {{ $address['country'] == 'Russland' ? 'selected' : '' }}>Russland</option>
                                    <option value="Weißrussland" {{ $address['country'] == 'Weißrussland' ? 'selected' : '' }}>Weißrussland</option>
                                    <option value="Türkei" {{ $address['country'] == 'Türkei' ? 'selected' : '' }}>Türkei</option>
                                    <option value="Norwegen" {{ $address['country'] == 'Norwegen' ? 'selected' : '' }}>Norwegen</option>
                                    <option value="England" {{ $address['country'] == 'England' ? 'selected' : '' }}>England</option>
                                    <option value="Irland" {{ $address['country'] == 'Irland' ? 'selected' : '' }}>Irland</option>
                                    <option value="Ukraine" {{ $address['country'] == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                    <option value="Spanien" {{ $address['country'] == 'Spanien' ? 'selected' : '' }}>Spanien</option>
                                    <option value="Slowenien" {{ $address['country'] == 'Slowenien' ? 'selected' : '' }}>Slowenien</option>
                                    <option value="Slowakei" {{ $address['country'] == 'Slowakei' ? 'selected' : '' }}>Slowakei</option>
                                    <option value="Portugal" {{ $address['country'] == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                    <option value="Luxemburg" {{ $address['country'] == 'Luxemburg' ? 'selected' : '' }}>Luxemburg</option>
                                    <option value="Liechtenstein" {{ $address['country'] == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                                    <option value="Litauen" {{ $address['country'] == 'Litauen' ? 'selected' : '' }}>Litauen</option>
                                    <option value="Lettland" {{ $address['country'] == 'Lettland' ? 'selected' : '' }}>Lettland</option>
                                    <option value="Kasachstan" {{ $address['country'] == 'Kasachstan' ? 'selected' : '' }}>Kasachstan</option>
                                    <option value="Island" {{ $address['country'] == 'Island' ? 'selected' : '' }}>Island</option>
                                    <option value="Estland" {{ $address['country'] == 'Estland' ? 'selected' : '' }}>Estland</option>
                                    <option value="Finnland" {{ $address['country'] == 'Finnland' ? 'selected' : '' }}>Finnland</option>
                                    <option value="Bosnien und Herzegowina" {{ $address['country'] == 'Bosnien und Herzegowina' ? 'selected' : '' }}>Bosnien und Herzegowina</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-check">
                                    <input @if(isset($contact) && $contact->reverse_charge == 2) checked @endif class="form-check-input" name="reverse_charge" type="checkbox" value="2" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{trans_dynamic('persons_edit_form_reverse_charge')}}
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">{{trans_dynamic('persons_edit_form_create')}}</button>
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