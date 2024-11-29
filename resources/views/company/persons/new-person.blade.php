@extends('layouts.layout')
@php
    $title = trans_dynamic('employees_table_page_title');
@endphp
@section('title', $title)
@section('content')
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">{{ trans_dynamic('employee_add_name') }}</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">{{ trans_dynamic('employee_add_employees') }}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans_dynamic('employee_add_name') }}</li>
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
                        {{ trans_dynamic('employee_add_name') }}
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('persons.add') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ trans_dynamic('employee_add_form_name') }}</label>
                                <input type="text" name="name" class="form-control" placeholder="{{ trans_dynamic('employee_add_form_placeholder_name') }}" aria-label="{{ trans_dynamic('employee_add_form_placeholder_name') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ trans_dynamic('employee_add_form_surname') }}</label>
                                <input type="text" name="surname" class="form-control" placeholder="{{ trans_dynamic('employee_add_form_placeholder_surname') }}" aria-label="{{ trans_dynamic('employee_add_form_placeholder_surname') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ trans_dynamic('employee_add_form_phone') }}</label>
                                <input type="text" name="phone" class="form-control" placeholder="{{ trans_dynamic('employee_add_form_placeholder_phone') }}" aria-label="{{ trans_dynamic('employee_add_form_placeholder_phone') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="row">
                                    <div class="col-xl-12 mb-3">
                                        <label class="form-label">{{ trans_dynamic('employee_add_form_email') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="{{ trans_dynamic('employee_add_form_placeholder_email') }}" aria-label="{{ trans_dynamic('employee_add_form_placeholder_email') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ trans_dynamic('employee_add_form_class') }}</label>
                                <select name="role" id="inputCountry" class="form-select">
                                    <option selected="">Nicht ausgewählt</option>
                                    @foreach($rol as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ trans_dynamic('employee_add_form_country') }}</label>
                                <select class="form-select" name="country" id="countrySelect">
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ trans_dynamic('employee_add_form_city') }}</label>
                                <input type="text" name="city" class="form-control" placeholder="{{ trans_dynamic('employee_add_form_placeholder_city') }}" aria-label="{{ trans_dynamic('employee_add_form_placeholder_city') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ trans_dynamic('employee_add_form_street') }}</label>
                                <input type="text" name="street" class="form-control" placeholder="{{ trans_dynamic('employee_add_form_placeholder_street') }}" aria-label="{{ trans_dynamic('employee_add_form_placeholder_street') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ trans_dynamic('employee_add_form_zip_code') }}</label>
                                <input type="text" name="zip_code" class="form-control" placeholder="{{ trans_dynamic('employee_add_form_placeholder_zip_code') }}" aria-label="{{ trans_dynamic('employee_add_form_placeholder_zip_code') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ trans_dynamic('employee_add_form_password') }}</label>
                                <input type="password" name="password" class="form-control" placeholder="{{ trans_dynamic('employee_add_form_placeholder_password') }}" aria-label="{{ trans_dynamic('employee_add_form_placeholder_password') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ trans_dynamic('employee_add_form_password_confirm') }}</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans_dynamic('employee_add_form_placeholder_password_confirm') }}" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">{{ trans_dynamic('employee_add_form_create') }}</button>
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