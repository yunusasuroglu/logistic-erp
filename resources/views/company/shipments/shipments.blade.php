@extends('layouts.layout')
@php
$title = trans_dynamic('company_shipments_page_title');
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
    <h4 class="fw-medium mb-0">{{trans_dynamic('company_shipments_name')}}</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{trans_dynamic('company_shipments_sub_name')}}</li>
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
                                <h6 class="mb-1">{{trans_dynamic('company_shipments_cart_1')}}</h6>
                                <div class="">
                                    <span class="text-lg fw-semibold mb-2">€<span class="count-up" data-count="{{ number_format($monthlyTotalRevenue, 2) }}">{{ number_format($monthlyTotalRevenue, 2) }}</span></span> 
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
                                <h6 class="mb-1">{{trans_dynamic('company_shipments_cart_2')}}</h6>
                                <div class="">
                                    <span class="text-lg  fw-semibold mb-2">€<span class="count-up" data-count="{{ number_format($monthlyCarrierExpense, 2) }}">{{ number_format($monthlyCarrierExpense, 2) }}</span></span> 
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
                                <h6 class="mb-1">{{trans_dynamic('company_shipments_cart_3')}}</h6>
                                <div class="">
                                    <span class="text-lg  fw-semibold mb-2">€<span class="count-up" data-count="{{ number_format($monthlyNetGainExpense, 2) }}">{{ number_format($monthlyNetGainExpense, 2) }}</span></span> 
                                </div>
                            </div>
                            <div class="avatar avatar-lg bg-pink-transparent ms-auto   p-2"> 
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="svg-pink"><path d="M19,12h-7V5c0-0.6-0.4-1-1-1c-5,0-9,4-9,9s4,9,9,9s9-4,9-9C20,12.4,19.6,12,19,12z M12,19.9c-3.8,0.6-7.4-2.1-7.9-5.9C3.5,10.2,6.2,6.6,10,6.1V13c0,0.6,0.4,1,1,1h6.9C17.5,17.1,15.1,19.5,12,19.9z M15,2c-0.6,0-1,0.4-1,1v6c0,0.6,0.4,1,1,1h6c0.6,0,1-0.4,1-1C22,5.1,18.9,2,15,2z M16,8V4.1C18,4.5,19.5,6,19.9,8H16z"></path></svg>
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
                                <h6 class="mb-1">{{trans_dynamic('company_shipments_cart_4')}}</h6>
                                <div class="">
                                    <span class="text-lg  fw-semibold mb-2"><span class="count-up">{{ $weeklyShipmentCount }}</span></span> 
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
                            {{trans_dynamic('company_shipments_table_name')}}
                        </div>
                        <div class="d-flex">
                            <a href="{{route('shipments.add')}}" class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"><i class="ri-add-line fw-semibold align-middle me-1"></i> {{trans_dynamic('company_shipments_table_add_shipment_button')}}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsiveDataTable" class="table text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">{{trans_dynamic('company_shipments_table_shipment_no')}}</th>
                                        <th scope="col">{{trans_dynamic('company_shipments_table_customer')}}</th>
                                        <th scope="col">{{trans_dynamic('company_shipments_table_author')}}</th>
                                        <th scope="col">{{trans_dynamic('company_shipments_table_carrier')}}</th>
                                        <th scope="col">{{trans_dynamic('company_shipments_table_amount')}}</th>
                                        <th scope="col">{{trans_dynamic('company_shipments_table_gain')}}</th>
                                        <th scope="col">{{trans_dynamic('company_shipments_table_status')}}</th>
                                        <th scope="col">{{trans_dynamic('company_shipments_table_details')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shipments as $shipment)
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0);" class="fw-semibold text-primary">#{{$shipment->s_code}}</a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 fw-semibold">{{$shipment->customer['name']}}</p>
                                                    <p class="mb-0 fs-12 text-muted">{{$shipment->customer['email']}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <p class="mb-0 fw-semibold">{{$shipment->author}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        @if ($shipment->carrier == null)
                                        <td>{{trans_dynamic('company_shipments_table_carrier_no')}}</td>
                                        @else
                                        <td>{{trans_dynamic('company_shipments_table_carrier_yes')}} ({{$shipment->carrier_price}} €)</td>
                                        @endif
                                        <td>
                                            {{$shipment->price}} € <br>
                                            @if ($shipment->vat != 0)
                                            <span class="badge bg-success-transparent">
                                                {{trans_dynamic('company_shipments_table_amount_vat')}} {{$shipment->vat * 100}}% + {{$shipment->price * $shipment->vat}} €
                                            </span>
                                            @endif
                                        </td>
                                        <td>{{$shipment->net_gain}} €</td>
                                        <td>
                                            @if ($shipment->status == 4)
                                            <span class="badge bg-danger-transparent">{{trans_dynamic('company_shipments_table_span_1_cancel')}}</span>
                                            @elseif ($shipment->status == 3)
                                            <span class="badge bg-primary-transparent">{{trans_dynamic('company_shipments_table_span_2_draft')}}</span>
                                            @elseif ($shipment->status == 2)
                                            <span class="badge bg-warning-transparent">{{trans_dynamic('company_shipments_table_span_3_continues')}}</span>
                                            @elseif ($shipment->status == 1)
                                            <span class="badge bg-success-transparent">{{trans_dynamic('company_shipments_table_span_4_approved')}}</span>
                                            @else
                                            <span class="badge bg-warning-transparent">{{trans_dynamic('company_shipments_table_span_5_not')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#showShipmentModal{{$shipment->id}}" data-bs-title="{{trans_dynamic('company_shipments_table_details_view')}}"><i class="ri-eye-line"></i></button>
                                            <a href="{{route('shipments.edit', $shipment->id)}}" class="btn btn-success-light btn-icon ms-1 btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{trans_dynamic('company_shipments_table_details_edit')}}"><i class="ri-pencil-line"></i></a>
                                            <button class="btn btn-danger-light btn-icon ms-1 btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{trans_dynamic('company_shipments_table_details_del')}}"><i class="ri-delete-bin-5-line"></i></button>
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
@foreach ($shipments as $shipment)
<div class="modal fade" id="showShipmentModal{{$shipment->id}}" tabindex="-1" aria-labelledby="showShipmentModal{{$shipment->id}}Label" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="fw-semibold text-primary" id="showShipmentModal{{$shipment->id}}Label">#{{$shipment->s_code}} <span class="text-black">{{trans_dynamic('company_shipments_table_modal_header_shipment_no_text')}}</span></h6>
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
                                        <div class="h6 fw-semibold mb-0">{{trans_dynamic('company_shipments_table_modal_header_shipment_no_name')}} <span class="text-primary">#{{$shipment->s_code}}</span></div>
                                    </div>
                                </div>
                                <div class="ms-auto mt-md-0 mt-2">
                                    @if ($shipment->status != 4 && $shipment->status != 1)
                                    <a href="{{ route('shipments.status', ['shipment_id' => $shipment->id, 'status' => 4]) }}" class="btn btn-danger me-1" >{{trans_dynamic('company_shipments_table_modal_header_button_1_cancel')}}</a>
                                    @endif
                                    @if ($shipment->status == 3)
                                    <a href="{{ route('shipments.status', ['shipment_id' => $shipment->id, 'status' => 2]) }}" class="btn btn-primary me-1" >{{trans_dynamic('company_shipments_table_modal_header_button_2_approve')}}</a>
                                    @elseif ($shipment->status == 2)
                                    <a href="{{ route('shipments.status', ['shipment_id' => $shipment->id, 'status' => 1]) }}" class="btn btn-primary me-1" >{{trans_dynamic('company_shipments_table_modal_header_button_4_shipment_finish')}}</a>
                                    @elseif ($shipment->status == 1)
                                    @if ($shipment->invoice_id == null && $shipment->status == 1)
                                    <button class="btn btn-primary-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rechung_{{$shipment->id}}" aria-expanded="false" aria-controls="rechung_{{$shipment->id}}">
                                        {{trans_dynamic('company_shipments_table_modal_header_button_5_add_invoice')}} <i class="ri-download-2-line ms-1 align-middle"></i>
                                    </button>
                                    @else
                                    <a href="{{ route('company.invoice.download', ['invoice' => $shipment->invoice_id]) }}" class="btn btn-primary-light">{{trans_dynamic('company_shipments_table_modal_header_button_6_invoice_download')}} <i class="ri-download-2-line ms-1 align-middle"></i></a>
                                    @endif
                                    @endif
                                    @if ($shipment->status != 3 && $shipment->status != 4)
                                    <a href="{{ route('shipment.company.pdf',$shipment->id)}}" class="btn btn-danger-light">{{trans_dynamic('company_shipments_table_modal_header_button_3_pdf_download')}} <i class="ri-download-2-line ms-1 align-middle"></i></a>
                                    @endif
                                    @if ($shipment->status == 4)
                                    <span class="badge ms-3 bg-danger-transparent">{{trans_dynamic('company_shipments_table_modal_header_span_1_cancel')}}</span>
                                    @elseif ($shipment->status == 3)
                                    <span class="badge ms-3 bg-primary-transparent">{{trans_dynamic('company_shipments_table_modal_header_span_2_draft')}}</span>
                                    @elseif ($shipment->status == 2)
                                    <span class="badge ms-3 bg-warning-transparent">{{trans_dynamic('company_shipments_table_modal_header_span_3_continues')}}</span>
                                    @elseif ($shipment->status == 1)
                                    <span class="badge ms-3 bg-success-transparent">{{trans_dynamic('company_shipments_table_modal_header_span_4_approved')}}</span>
                                    @else
                                    <span class="badge ms-3 bg-warning-transparent">{{trans_dynamic('company_shipments_table_modal_header_span_5_not')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            @if ($shipment->invoice_id == null && $shipment->status == 1 )
                                            <div class="collapse-horizontal collapse" id="rechung_{{$shipment->id}}" style="">
                                                <div class="col-xl-12 mb-3">
                                                    <p class="fw-semibold">
                                                        {{trans_dynamic('company_shipments_table_modal_invoice_form_name')}}
                                                    </p>
                                                    <form action="{{route('company.invoice.add')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="shipment_id" value="{{$shipment->id}}">
                                                        <div class="row g-3 mb-3">
                                                            <div class="col-sm-6">
                                                                <label for="form-text" class="form-label fs-14 text-dark">{{trans_dynamic('company_shipments_table_modal_invoice_form_amount')}}</label>
                                                                <input type="number" name="price" value="{{$shipment->price}}" class="form-control" placeholder="{{trans_dynamic('company_shipments_table_modal_invoice_form_amount')}}" aria-label="{{trans_dynamic('company_shipments_table_modal_invoice_form_amount')}}">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="form-text" class="form-label fs-14 text-dark">{{trans_dynamic('company_shipments_table_modal_invoice_form_date')}}</label>
                                                                <input type="date" name="date" value="{{ $shipment->created_at->format('Y-m-d') }}" class="form-control" placeholder="{{trans_dynamic('company_shipments_table_modal_invoice_form_date')}}" aria-label="{{trans_dynamic('company_shipments_table_modal_invoice_form_date')}}">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <button type="submit" class="btn w-100 btn-success">{{trans_dynamic('company_shipments_table_modal_invoice_form_add_button')}}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            @endif
                                            <script>
                                                function toggleInvoiceForm() {
                                                    var id = {{$shipment->id}};
                                                    var form = document.getElementById('InvoiceForm' + id);
                                                    if (form.style.display === 'none' || form.style.display === '') {
                                                        form.style.display = 'block';
                                                    } else {
                                                        form.style.display = 'none';
                                                    }
                                                }
                                            </script>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                <p class="fw-bold mb-2">
                                                    {{trans_dynamic('company_shipments_table_modal_customer')}}  {{$shipment->customer['name']}}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{$shipment->customer['company_name']}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{$shipment->customer['street']}}, {{$shipment->customer['city']}},{{$shipment->customer['country']}},{{$shipment->customer['zip_code']}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{$shipment->customer['email']}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{$shipment->customer['phone']}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{trans_dynamic('company_shipments_table_modal_reverse_charge')}} 
                                                    @if ($shipment->customer['reverse_charge'] == 2)
                                                    <span class="badge ms-3 bg-success-transparent">                                                    {{trans_dynamic('company_shipments_table_modal_reverse_charge_active')}} </span>
                                                    @else
                                                    <span class="badge ms-3 bg-info-transparent">                                                    {{trans_dynamic('company_shipments_table_modal_reverse_charge_passive')}} </span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6  mt-sm-0 mt-3"></div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-4">
                                                <p class="fw-bold mb-2">
                                                    {{trans_dynamic('company_shipments_table_modal_company')}} {{ $shipment->author_company['name'] ?? 'N/A' }}
                                                    - {{ $shipment->author_company['general_manager'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{trans_dynamic('company_shipments_table_modal_fax')}} {{ $shipment->author_company['fax'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{trans_dynamic('company_shipments_table_modal_hrb')}} {{ $shipment->author_company['hrb'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{trans_dynamic('company_shipments_table_modal_reverse_charge_passive')}} {{ $shipment->author_company['iban'] ?? 'N/A' }} , {{trans_dynamic('company_shipments_table_modal_bic')}} {{ $shipment->author_company['bic'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{trans_dynamic('company_shipments_table_modal_stnr')}} {{ $shipment->author_company['stnr'] ?? 'N/A' }} , {{trans_dynamic('company_shipments_table_modal_ustidnr')}} {{ $shipment->author_company['ust_id_nr'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{trans_dynamic('company_shipments_table_modal_registry_court')}} {{ $shipment->author_company['registry_court'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $shipment->author_company['street'] ?? 'N/A' }},
                                                    {{ $shipment->author_company['city'] ?? 'N/A' }},
                                                    {{ $shipment->author_company['country'] ?? 'N/A' }},
                                                    {{ $shipment->author_company['zip_code'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $shipment->author_company['email'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted">
                                                    {{ $shipment->author_company['phone'] ?? 'N/A' }}
                                                </p>
                                            </div>
                                            @if ($shipment->carrier !== null)
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6  mt-sm-0 mt-3">
                                                <p class="fw-bold mb-2">
                                                    {{trans_dynamic('company_shipments_table_modal_carrier')}} {{ $shipment->carrier['name'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $shipment->carrier['street'] ?? 'N/A' }},
                                                    {{ $shipment->carrier['city'] ?? 'N/A' }},
                                                    {{ $shipment->carrier['country'] ?? 'N/A' }},
                                                    {{ $shipment->carrier['zip_code'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $shipment->carrier['email'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted">
                                                    {{ $shipment->carrier['phone'] ?? 'N/A' }}
                                                </p>
                                            </div>                                                
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">{{trans_dynamic('company_shipments_table_modal_shipment_no')}}</p>
                                        <p class="fs-15 mb-1">#{{$shipment->s_code}}</p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">{{trans_dynamic('company_shipments_table_modal_created_time')}}</p>
                                        <p class="fs-15 mb-1">{{ $shipment->created_at->format('d/m/Y')}} - <span class="text-muted fs-12">{{ $shipment->created_at->format('H:i')}}</span></p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">{{trans_dynamic('company_shipments_table_modal_created_updated')}}</p>
                                        <p class="fs-15 mb-1">{{ $shipment->updated_at->format('d/m/Y')}}</p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">{{trans_dynamic('company_shipments_table_modal_amount')}}</p>
                                        <p class="fs-16 mb-1 fw-semibold">{{ $shipment->price}} €</p>
                                    </div>
                                    <div class="col-xl-12">
                                        <p class="fw-semibold text-black mb-1">{{trans_dynamic('company_shipments_table_modal_upload_table_title')}}</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_upload_table_company')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_upload_table_name')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_upload_table_phone')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_upload_table_reference')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_upload_table_upload_date')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_upload_table_time_range')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_upload_table_address')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_upload_table_details')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($shipment->upload_info as $u_info)
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
                                        
                                        <p class="fw-semibold text-black mt-4 mb-1">{{trans_dynamic('company_shipments_table_modal_delivery_table_title')}}</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_delivery_table_company')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_delivery_table_name')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_delivery_table_phone')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_delivery_table_reference')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_delivery_table_upload_date')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_delivery_table_time_range')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_delivery_table_address')}}</th>
                                                        <th>{{trans_dynamic('company_shipments_table_modal_delivery_table_details')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($shipment->delivery_info as $d_info)
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
                                        
                                        <p class="fw-semibold text-black mt-4 mb-1">{{trans_dynamic('company_shipments_table_modal_amount_table_name')}} :</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <tbody>
                                                    @if ($shipment->vat != 0)
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">{{trans_dynamic('company_shipments_table_modal_amount_table_vat')}}</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">+ 
                                                                {{$shipment->price * $shipment->vat}} € <small class="text-success"> {{$shipment->vat * 100}}%</small>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">{{trans_dynamic('company_shipments_table_modal_amount_table_amount')}}</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">{{$shipment->price}} €</p>
                                                        </td>
                                                    </tr>
                                                    @if ($shipment->carrier !== null)
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">{{trans_dynamic('company_shipments_table_modal_amount_table_carrier_price')}}</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">- {{$shipment->carrier_price}} €</p>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0 fs-14">{{trans_dynamic('company_shipments_table_modal_amount_table_total_amount')}}</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-16 text-success">{{$shipment->net_gain}} €</p>
                                                        </td>
                                                    </tr>
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