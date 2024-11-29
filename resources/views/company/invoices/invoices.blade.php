@extends('layouts.layout')
@php
$title = trans_dynamic('company_invoices_page_title');
@endphp
@section('title', $title)

@section('content')
<link rel="stylesheet" href="{{asset('/')}}/assets/libs/gridjs/theme/mermaid.min.css">
<style>
    #responsiveDataTable_wrapper .row{
        margin-bottom: 20px;
    }
</style>
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">{{trans_dynamic('company_invoices_name')}}</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">{{trans_dynamic('company_invoices_sub_name')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{trans_dynamic('company_invoices_name')}}</li>
    </ol>
</div>
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="mt-1">
                                <h6 class="mb-1">{{trans_dynamic('company_invoices_cart_1')}}</h6>
                                <div class="">
                                    <span class="text-lg fw-semibold mb-2">€<span class="count-up" data-count="{{$monthlyTotalRevenue}}">{{$monthlyTotalRevenue}}</span></span> 
                                </div>
                            </div>
                            <div class="avatar avatar-lg bg-primary-transparent   ms-auto  p-2"> 
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" class="svg-primary">
                                    <path d="M13,16H7a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,10h2a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Zm12,2H18V3a1,1,0,0,0-.5-.87,1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0l-3,1.72-3-1.72a1,1,0,0,0-1,0A1,1,0,0,0,2,3V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM5,20a1,1,0,0,1-1-1V4.73L6,5.87a1.08,1.08,0,0,0,1,0l3-1.72,3,1.72a1.08,1.08,0,0,0,1,0l2-1.14V19a3,3,0,0,0,.18,1Zm15-1a1,1,0,0,1-2,0V14h2Zm-7-7H7a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z"></path>
                                </svg> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                                    <path d="M8 10.5H13" stroke="#8F56EA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 13.5H12" stroke="#8F56EA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15 8C14.3732 7.37209 13.5941 7 12.7498 7C10.6788 7 9 9.23858 9 12C9 14.7614 10.6788 17 12.7498 17C13.5941 17 14.3732 16.6279 15 16" stroke="#8F56EA" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="mt-1">
                                <h6 class="mb-1">{{trans_dynamic('company_invoices_cart_2')}}</h6>
                                <div class="">
                                    <span class="text-lg  fw-semibold mb-2">€<span class="count-up" data-count="{{$totalVat}}">{{$totalVat}}</span></span> 
                                </div>
                            </div>
                            <div class="avatar avatar-lg bg-secondary-transparent ms-auto p-2"> 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="svg-secondary"><path d="M11.5,20h-6a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1h5V7a3,3,0,0,0,3,3h3v5a1,1,0,0,0,2,0V9s0,0,0-.06a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.29.29,0,0,0-.1,0A1.1,1.1,0,0,0,11.56,2H5.5a3,3,0,0,0-3,3V19a3,3,0,0,0,3,3h6a1,1,0,0,0,0-2Zm1-14.59L15.09,8H13.5a1,1,0,0,1-1-1ZM7.5,14h6a1,1,0,0,0,0-2h-6a1,1,0,0,0,0,2Zm4,2h-4a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2Zm-4-6h1a1,1,0,0,0,0-2h-1a1,1,0,0,0,0,2Zm13.71,6.29a1,1,0,0,0-1.42,0l-3.29,3.3-1.29-1.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,1.42,0l4-4A1,1,0,0,0,21.21,16.29Z"></path></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                                    <path d="M8 10.5H13" stroke="#F56F4B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 13.5H12" stroke="#F56F4B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15 8C14.3732 7.37209 13.5941 7 12.7498 7C10.6788 7 9 9.23858 9 12C9 14.7614 10.6788 17 12.7498 17C13.5941 17 14.3732 16.6279 15 16" stroke="#F56F4B" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="mt-1">
                                <h6 class="mb-1">{{trans_dynamic('company_invoices_cart_3')}}</h6>
                                <div class="">
                                    <span class="text-lg  fw-semibold mb-2"><span class="count-up" data-count="{{$monthlyVatCount}}">{{$monthlyVatCount}}</span></span> 
                                </div>
                            </div>
                            <div class="avatar avatar-lg bg-pink-transparent ms-auto   p-2"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"/>
                                  </svg>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="mt-1">
                                <h6 class="mb-1">{{trans_dynamic('company_invoices_cart_4')}}</h6>
                                <div class="">
                                    <span class="text-lg  fw-semibold mb-2"><span class="count-up">{{$weeklyInvoiceCount}}</span></span> 
                                </div>
                            </div>
                            <div class="avatar avatar-lg bg-light ms-auto p-2"> 
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="svg-dark"><path d="M19,12h-7V5c0-0.6-0.4-1-1-1c-5,0-9,4-9,9s4,9,9,9s9-4,9-9C20,12.4,19.6,12,19,12z M12,19.9c-3.8,0.6-7.4-2.1-7.9-5.9C3.5,10.2,6.2,6.6,10,6.1V13c0,0.6,0.4,1,1,1h6.9C17.5,17.1,15.1,19.5,12,19.9z M15,2c-0.6,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1h6c0.6,0,1-0.4,1-1C22,5.1,18.9,2,15,2z M16,8V4.1C18,4.5,19.5,6,19.9,8H16z"></path></svg>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            {{trans_dynamic('company_invoices_cart_4')}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsiveDataTable" class="table text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">{{trans_dynamic('company_invoices_table_invoice_id')}}</th>
                                        <th scope="col">{{trans_dynamic('company_invoices_table_author')}}</th>
                                        <th scope="col">{{trans_dynamic('company_invoices_table_amount')}}</th>
                                        <th scope="col">{{trans_dynamic('company_invoices_table_created_time')}}</th>
                                        <th scope="col">{{trans_dynamic('company_invoices_table_updated_time')}}</th>
                                        <th scope="col">{{trans_dynamic('company_invoices_table_details')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                    <tr>
                                        <td><a href="javascript:void(0);" class="fw-semibold text-primary">{{$invoice->i_no}}</a></td>
                                        <td>{{$invoice->author}}</td>
                                        <td>
                                            {{$invoice->price}} € <br>
                                            @if ($invoice->vat != 0)
                                            <span class="badge bg-success-transparent">
                                                {{trans_dynamic('company_invoices_table_amount_vat')}} {{$invoice->vat * 100}}% + {{$invoice->price * $invoice->vat}} €
                                            </span>
                                            @endif
                                        </td>
                                        <td>{{$invoice->created_at->format('d/m/y')}}</td>
                                        <td>{{$invoice->updated_at->format('d/m/y')}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#showInvoiceModal{{$invoice->id}}"><i class="ri-eye-line"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($invoices as $invoice)
<div class="modal fade" id="showInvoiceModal{{$invoice->id}}" tabindex="-1" aria-labelledby="showInvoiceModal{{$invoice->id}}Label" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="fw-semibold text-primary" id="showInvoiceModal{{$invoice->id}}Label">#{{$invoice->i_no}} <span class="text-black">{{trans_dynamic('company_invoices_table_modal_header_invoice_no_text')}}</span></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Start::row-1 -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header d-md-flex d-block"  style="border: none;">
                                <div class="h5 mb-0 d-sm-flex d-bllock align-items-center">
                                    <div>
                                        <img style="width: 40px; height: 40px;" src="{{asset('/')}}{{ Auth::user()->company->profile_image ?? 'assets/images/default/default-profile.png'}}" alt="Logo">
                                    </div>
                                    <div class="ms-sm-2 ms-0 mt-sm-0 mt-2">
                                        <div class="h6 fw-semibold mb-0">{{trans_dynamic('company_invoices_table_modal_header_invoice_no_name')}} <span class="text-primary">#{{$invoice->s_code}}</span></div>
                                    </div>
                                </div>
                                <div class="ms-auto mt-md-0 mt-2">
                                    <a href="{{ route('company.invoice.download', ['invoice' => $invoice->id]) }}" class="btn btn-primary-light">{{trans_dynamic('company_invoices_table_modal_header_invoice_download')}} <i class="ri-download-2-line ms-1 align-middle"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                <p class="fw-bold mb-2">
                                                    {{trans_dynamic('company_invoices_table_modal_customer')}}  {{$invoice->customer['name']}}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{$invoice->customer['company_name']}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{$invoice->customer['street']}}, {{$invoice->customer['city']}},{{$invoice->customer['country']}},{{$invoice->customer['zip_code']}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{$invoice->customer['email']}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{$invoice->customer['phone']}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{trans_dynamic('company_invoices_table_modal_customer_reverse_label')}} 
                                                    @if ($invoice->customer['reverse_charge'] == 2)
                                                    <span class="badge ms-3 bg-success-transparent">                                                    {{trans_dynamic('company_invoices_table_modal_customer_reverse_active')}}</span>
                                                    @else
                                                    <span class="badge ms-3 bg-info-transparent">{{trans_dynamic('company_invoices_table_modal_customer_reverse_passive')}}</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6  mt-sm-0 mt-3"></div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-4">
                                                <p class="fw-bold mb-2">
                                                    {{trans_dynamic('company_invoices_table_modal_company')}} {{ $invoice->author_company['name'] ?? 'N/A' }}
                                                    - {{ $invoice->author_company['general_manager'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{trans_dynamic('company_invoices_table_modal_company_fax')}} {{ $invoice->author_company['fax'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{trans_dynamic('company_invoices_table_modal_company_hrb')}} {{ $invoice->author_company['hrb'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{trans_dynamic('company_invoices_table_modal_company_iban')}} {{ $invoice->author_company['iban'] ?? 'N/A' }} , {{trans_dynamic('company_invoices_table_modal_company_bic')}} {{ $invoice->author_company['bic'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                   {{trans_dynamic('company_invoices_table_modal_company_stnr')}} {{ $invoice->author_company['stnr'] ?? 'N/A' }} , {{trans_dynamic('company_invoices_table_modal_company_ustidnr')}} {{ $invoice->author_company['ust_id_nr'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{trans_dynamic('company_invoices_table_modal_company_registry_court')}} {{ $invoice->author_company['registry_court'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $invoice->author_company['street'] ?? 'N/A' }},
                                                    {{ $invoice->author_company['city'] ?? 'N/A' }},
                                                    {{ $invoice->author_company['country'] ?? 'N/A' }},
                                                    {{ $invoice->author_company['zip_code'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $invoice->author_company['email'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted">
                                                    {{ $invoice->author_company['phone'] ?? 'N/A' }}
                                                </p>
                                            </div>
                                            @if ($invoice->carrier !== null)
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6  mt-sm-0 mt-3">
                                                <p class="fw-bold mb-2">
                                                    {{trans_dynamic('company_invoices_table_modal_carrier')}} {{ $invoice->carrier['name'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $invoice->carrier['street'] ?? 'N/A' }},
                                                    {{ $invoice->carrier['city'] ?? 'N/A' }},
                                                    {{ $invoice->carrier['country'] ?? 'N/A' }},
                                                    {{ $invoice->carrier['zip_code'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $invoice->carrier['email'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted">
                                                    {{ $invoice->carrier['phone'] ?? 'N/A' }}
                                                </p>
                                            </div>                                                
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Versand-ID :</p>
                                        <p class="fs-15 mb-1">#{{$invoice->s_code}}</p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Erstellungsdatum :</p>
                                        <p class="fs-15 mb-1">{{ $invoice->created_at->format('d/m/Y')}} - <span class="text-muted fs-12">{{ $invoice->created_at->format('H:i')}}</span></p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Bearbeitungsdatum :</p>
                                        <p class="fs-15 mb-1">{{ $invoice->updated_at->format('d/m/Y')}}</p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Versandbetrag :</p>
                                        <p class="fs-16 mb-1 fw-semibold">{{ $invoice->price}} €</p>
                                    </div>

                                    <div class="col-xl-12">
                                        <p class="fw-semibold text-black mb-1">{{trans_dynamic('company_invoices_table_modal_upload_info_title')}}</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_upload_info_company')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_upload_info_name')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_upload_info_phone')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_upload_info_reference')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_upload_info_time')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_upload_info_time_period')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_upload_info_address')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_upload_info_details')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($invoice->upload_info as $u_info)
                                                    <tr>
                                                        <td>
                                                            <div class="fw-semibold">
                                                                {{ $u_info['company_name'] }}
                                                            </div>
                                                        </td>
                                                        <td>{{ $u_info['name'] }}</td>
                                                        <td>{{ $u_info['phone'] ?? 'N/A' }}</td>
                                                        <td>{{ $u_info['ref_no'] ?? 'N/A' }}</td>
                                                        <td>{{ $u_info['upload_date'] ?? 'N/A' }}</td>
                                                        <td>{{ $u_info['time_start'] ?? 'N/A' }} - {{ $u_info['time_end'] ?? 'N/A' }}</td>
                                                        <td>{{$u_info['street'] ?? 'N/A' }},{{$u_info['city'] ?? 'N/A' }}, {{$u_info['country'] ?? 'N/A' }},{{$u_info['zip_code'] ?? 'N/A' }}</td>
                                                        <td>{{ $u_info['content'] ?? 'N/A' }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <p class="fw-semibold text-black mt-4 mb-1">{{trans_dynamic('company_invoices_table_modal_delivery_info_title')}}</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_delivery_info_company')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_delivery_info_name')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_delivery_info_phone')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_delivery_info_reference')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_delivery_info_time')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_delivery_info_time_period')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_delivery_info_address')}}</th>
                                                        <th>{{trans_dynamic('company_invoices_table_modal_delivery_info_details')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($invoice->delivery_info as $d_info)
                                                    <tr>
                                                        <td>
                                                            <div class="fw-semibold">
                                                                {{ $d_info['company_name'] }}
                                                            </div>
                                                        </td>
                                                        <td>{{ $d_info['name'] }}</td>
                                                        <td>{{ $d_info['phone'] ?? 'N/A' }}</td>
                                                        <td>{{ $d_info['ref_no'] ?? 'N/A' }}</td>
                                                        <td>{{ $d_info['upload_date'] ?? 'N/A' }}</td>
                                                        <td>{{ $d_info['time_start'] ?? 'N/A' }} - {{ $d_info['time_end'] ?? 'N/A' }}</td>
                                                        <td>{{$d_info['street'] ?? 'N/A' }},{{$d_info['city'] ?? 'N/A' }}, {{$d_info['country'] ?? 'N/A' }},{{$d_info['zip_code'] ?? 'N/A' }}</td>
                                                        <td>{{ $d_info['content'] ?? 'N/A' }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <p class="fw-semibold text-black mt-4 mb-1">{{trans_dynamic('company_invoices_table_modal_footer_title')}}</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">{{trans_dynamic('company_invoices_table_modal_footer_amount')}}</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">{{$invoice->price}} €</p>
                                                        </td>
                                                    </tr>
                                                    @if ($invoice->vat != 0)
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">{{trans_dynamic('company_invoices_table_modal_footer_vat')}}</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">{{$invoice->price * $invoice->vat}} € <small class="text-success"> {{$invoice->vat * 100}}%</small></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">{{trans_dynamic('company_invoices_table_modal_footer_total_amount')}}</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">{{$invoice->price + $invoice->price * $invoice->vat}} €</p>
                                                        </td>
                                                    </tr>
                                                    @else
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">{{trans_dynamic('company_invoices_table_modal_footer_total_amount')}}</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">{{$invoice->price }} €</p>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if ($invoice->carrier !== null)
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">{{trans_dynamic('company_invoices_table_modal_footer_carrier_amount')}}</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">{{$invoice->carrier_price}} €</p>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end"  style="border: none;">
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-1 -->
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection