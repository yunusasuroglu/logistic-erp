@extends('layouts.layout')
@php
$title = trans_dynamic('company_dashboard_page_title');
@endphp

@section('title', $title)
@section('content')
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">{{ trans_dynamic('company_dashboard_page_name') }}</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">{{env('APP_NAME')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans_dynamic('company_dashboard_page_name') }}</li>
    </ol>
</div>
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="row row-cols-xxl-5 row-cols-xl-3 row-cols-md-2">
                    <div class="col card-background flex-fill">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <p class="fw-medium mb-1 text-muted">{{ trans_dynamic('company_dashboard_card1_name') }}</p>
                                        <h3 class="mb-0">{{$contactCount}}</h3>
                                    </div>
                                    <div class="avatar avatar-md br-4 bg-primary-transparent ms-auto">
                                        <i class="bx bxs-user-detail fs-20"></i>
                                    </div>
                                </div>
                                <div class="d-flex mt-2">
                                    <a href="{{route('contacts.customer')}}" class="text-muted fs-11 ms-auto text-decoration-underline mt-auto">{{ trans_dynamic('company_dashboard_card1_more_info') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col card-background flex-fill">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <p class="fw-medium mb-1 text-muted">{{ trans_dynamic('company_dashboard_card2_name') }}</p>
                                        <h3 class="mb-0">{{$userCount}}</h3>
                                    </div>
                                    <div class="avatar avatar-md br-4 bg-secondary-transparent ms-auto">
                                        <i class="bx bx-user fs-20"></i>
                                    </div>
                                </div>
                                <div class="d-flex mt-2">
                                    <a href="{{route('persons')}}" class="text-muted fs-11 ms-auto text-decoration-underline mt-auto">{{ trans_dynamic('company_dashboard_card2_more_info') }}i</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col card-background flex-fill">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <p class="fw-medium text-muted mb-1">{{ trans_dynamic('company_dashboard_card3_name') }}</p>
                                        <h3 class="mb-0">{{$invoiceCount}}</h3>
                                    </div>
                                    <div class="avatar avatar-md br-4 bg-info-transparent ms-auto">
                                        <i class="bx bx-receipt fs-20"></i>
                                    </div>
                                </div>
                                <div class="d-flex mt-2">
                                    <a href="{{route('company.invoices')}}" class="text-muted fs-11 ms-auto text-decoration-underline mt-auto">{{ trans_dynamic('company_dashboard_card3_more_info') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col card-background flex-fill">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <p class="fw-medium mb-1 text-muted">{{ trans_dynamic('company_dashboard_card4_name') }}</p>
                                        <h3 class="mb-0">{{$shipmentCount}}</h3>
                                    </div>
                                    <div class="avatar avatar-md br-4 bg-danger-transparent ms-auto">
                                        <i class="bx bxs-truck fs-20"></i>
                                    </div>
                                </div>
                                <div class="d-flex mt-2">
                                    <a href="{{route('shipments')}}" class="text-muted fs-11 ms-auto text-decoration-underline mt-auto">{{ trans_dynamic('company_dashboard_card4_more_info') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col card-background flex-fill">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <p class="fw-medium text-muted mb-1">{{ trans_dynamic('company_dashboard_card5_name') }}</p>
                                        <h3 class="mb-0">{{$totalInvoiceAmount}} €</h3>
                                    </div>
                                    <div class="avatar avatar-md br-4 bg-warning-transparent ms-auto">
                                        <i class="bi bi-currency-euro fs-20"></i>
                                    </div>
                                </div>
                                <div class="d-flex mt-2">
                                    <a href="javascript:void(0);" class="text-muted fs-11 ms-auto text-decoration-underline mt-auto">{{ trans_dynamic('company_dashboard_card5_more_info') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW-1 -->
        <div class="row">
            <div class="col-xxl-6 col-xl-12">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Die heutigen Bestellungen
                                </div>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-outline-light btn-icons btn-sm text-muted my-1" data-bs-toggle="dropdown">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu mb-0">
                                        <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                        <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table text-nowrap table-hover rounded-3 overflow-hidden">
                                                <thead>
                                                    <tr>
                                                        <th scope="row" class="ps-4">{{ trans_dynamic('company_dashboard_shipments_table_customer') }}</th>
                                                        <th scope="row">{{ trans_dynamic('company_dashboard_shipments_table_status') }}</th>
                                                        <th scope="row">{{ trans_dynamic('company_dashboard_shipments_table_price') }}</th>
                                                        <th scope="row">{{ trans_dynamic('company_dashboard_shipments_table_type') }}</th>
                                                        <th scope="row">Geschichte</th>
                                                        <th scope="row">{{ trans_dynamic('company_dashboard_shipments_table_detail') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($todayShipments as $shipment)
                                                    <tr>
                                                        <td class=" ps-4">
                                                            <a class="text-primary" href="product-details.html">{{$shipment->customer['name']}}</a>
                                                        </td>
                                                        <td>
                                                            <div class="mt-sm-1 d-block">
                                                                @if ($shipment->status == 4)
                                                                <span class="badge bg-danger-transparent">Storniert</span>
                                                                @elseif ($shipment->status == 3)
                                                                <span class="badge bg-primary-transparent">Entwurf</span>
                                                                @elseif ($shipment->status == 2)
                                                                <span class="badge bg-warning-transparent">Unterwegs</span>
                                                                @elseif ($shipment->status == 1)
                                                                <span class="badge bg-success-transparent">Zugestellt und Bestätigt</span>
                                                                @else
                                                                <span class="badge bg-warning-transparent">Unbekannter Status</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>{{$shipment->price}} €</td>
                                                        <td>
                                                            @if ($shipment->carrier == null)
                                                            Meine Bestellung
                                                            @else
                                                            Subunternehmer
                                                            @endif
                                                        </td>
                                                        <td>{{$shipment->created_at->format('d.m.y')}}</td>
                                                        <td>
                                                            <div class="g-2">
                                                                <a href="{{route('shipments.edit', $shipment->id)}}" aria-label="anchor" class="btn  btn-success-light btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Bearbeiten">
                                                                    <span class="ri-pencil-line fs-14"></span>
                                                                </a>
                                                                <a aria-label="anchor" class="btn btn-primary-light btn-sm ms-2"  data-bs-toggle="modal" data-bs-target="#showShipmentModal{{$shipment->id}}"  data-bs-original-title="Detail">
                                                                    <span class="ri-eye-line fs-14"></span>
                                                                </a>
                                                            </div>
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
                    <div class="col-xxl-12 col-xl-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Sendungen, für die heute keine Rechnung erstellt wurde
                                </div>
                                <div class="dropdown">
                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-outline-light btn-icons btn-sm text-muted my-1" data-bs-toggle="dropdown">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu mb-0">
                                        <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                        <li class="border-bottom"><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table text-nowrap table-hover rounded-3 overflow-hidden">
                                                <thead>
                                                    <tr>
                                                        <th scope="row" class="ps-4">{{ trans_dynamic('company_dashboard_shipments_table_customer') }}</th>
                                                        <th scope="row">{{ trans_dynamic('company_dashboard_shipments_table_status') }}</th>
                                                        <th scope="row">{{ trans_dynamic('company_dashboard_shipments_table_price') }}</th>
                                                        <th scope="row">{{ trans_dynamic('company_dashboard_shipments_table_type') }}</th>
                                                        <th scope="row">{{ trans_dynamic('company_dashboard_shipments_table_detail') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($unbilledShipments as $invoiceShipment)
                                                    <tr>
                                                        <td class=" ps-4">
                                                            <a class="text-primary" href="product-details.html">{{$invoiceShipment->customer['name']}}</a>
                                                        </td>
                                                        <td>
                                                            <div class="mt-sm-1 d-block">
                                                                @if ($invoiceShipment->status == 4)
                                                                <span class="badge bg-danger-transparent">Storniert</span>
                                                                @elseif ($invoiceShipment->status == 3)
                                                                <span class="badge bg-primary-transparent">Entwurf</span>
                                                                @elseif ($invoiceShipment->status == 2)
                                                                <span class="badge bg-warning-transparent">Unterwegs</span>
                                                                @elseif ($invoiceShipment->status == 1)
                                                                <span class="badge bg-success-transparent">Zugestellt und Bestätigt</span>
                                                                @else
                                                                <span class="badge bg-warning-transparent">Unbekannter Status</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>{{$invoiceShipment->price}} €</td>
                                                        <td>{{$invoiceShipment->created_at->format('d.m.y')}}</td>
                                                        <td>
                                                            <div class="g-2">
                                                                <a aria-label="anchor" class="btn btn-primary-light btn-sm ms-2"  data-bs-toggle="modal" data-bs-target="#showShipmentInvoiceModal{{$invoiceShipment->id}}"  data-bs-original-title="Detail">
                                                                    <span class="ri-eye-line fs-14"></span>
                                                                </a>
                                                            </div>
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
            </div>

            <div class="col-xxl-6  col-xl-12">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header  justify-content-between">
                                <div class="card-title">{{ trans_dynamic('company_dashboard_company_earnings_statistics') }}</div>
                                <div class="dropdown d-flex">
                                    <a href="javascript:void(0);" class="btn dropdown-toggle btn-sm btn-wave waves-effect waves-light btn-primary d-flex align-items-center" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-calendar-2-line me-1"></i><span id="selectedOption">Wöchentliche Analyse</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="javascript:void(0);" id="yearly" onclick="fetchAndRefreshChartData('yearly')">Yıllık Analiz</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);" id="monthly" onclick="fetchAndRefreshChartData('monthly')">Aylık Analiz</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);" id="weekly" onclick="fetchAndRefreshChartData('weekly')">Haftalık Analiz</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="earnings"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-xl-6 col-lg-6">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    {{ trans_dynamic('company_dashboard_personnel_earnings_table') }}
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="row" class="fw-semibold ps-4">{{ trans_dynamic('company_dashboard_personnel_earnings_table_name_surname') }}</th>
                                                <th scope="row" class="fw-semibold">{{ trans_dynamic('company_dashboard_personnel_earnings_table_earning') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="top-selling">
                                            @foreach ($employeesData as $data)
                                            <tr>
                                                <td  class=" ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="ms-2">
                                                            <p class="mb-0 fw-semibold">{{ $data['employee']->name }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="fw-semibold">{{ $data['totalRevenue'] }} €</span>
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
    </div>
</div>
<!-- ROW-1 END -->
<!-- End::row-1 -->

</div>
</div>
@foreach ($todayShipments as $shipment)
<div class="modal fade" id="showShipmentModal{{$shipment->id}}" tabindex="-1" aria-labelledby="showShipmentModal{{$shipment->id}}Label" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="fw-semibold text-primary" id="showShipmentModal{{$shipment->id}}Label">#{{$shipment->s_code}} <span class="text-black">Nummerierte Versandinformationen</span></h6>
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
                                        <div class="h6 fw-semibold mb-0">Sevkiyat NO : <span class="text-primary">#{{$shipment->s_code}}</span></div>
                                    </div>
                                </div>
                                <div class="ms-auto mt-md-0 mt-2">
                                    @if ($shipment->status != 4 && $shipment->status != 1)
                                    <a href="{{ route('shipments.status', ['shipment_id' => $shipment->id, 'status' => 4]) }}" class="btn btn-danger me-1" >Versand Stornieren</a>
                                    @endif
                                    @if ($shipment->status == 3)
                                    <a href="{{ route('shipments.status', ['shipment_id' => $shipment->id, 'status' => 2]) }}" class="btn btn-primary me-1" >Versand Bestätigen</a>
                                    @elseif ($shipment->status == 2)
                                    <a href="{{ route('shipments.status', ['shipment_id' => $shipment->id, 'status' => 1]) }}" class="btn btn-primary me-1" >Versand Abschließen</a>
                                    @elseif ($shipment->status == 1)
                                    @if ($shipment->invoice_date == null)
                                    <button type="button" class="btn btn-primary-light" onclick="toggleInvoiceForm()">Rechnung Erstellen <i class="ri-download-2-line ms-1 align-middle"></i></button>
                                    @else
                                    <a href="{{ route('company.invoice.download', ['invoice' => $shipment->invoice_id]) }}" class="btn btn-primary-light">Rechnung Herunterladen <i class="ri-download-2-line ms-1 align-middle"></i></a>
                                    @endif
                                    @endif
                                    @if ($shipment->status != 3 && $shipment->status != 4)
                                    <a href="{{ route('shipment.company.pdf',$shipment->id)}}" class="btn btn-danger-light">PDF Herunterladen <i class="ri-download-2-line ms-1 align-middle"></i></a>
                                    @endif
                                    @if ($shipment->status == 4)
                                    <span class="badge ms-3 bg-danger-transparent">Storniert</span>
                                    @elseif ($shipment->status == 3)
                                    <span class="badge ms-3 bg-primary-transparent">Entwurf</span>
                                    @elseif ($shipment->status == 2)
                                    <span class="badge ms-3 bg-warning-transparent">Unterwegs</span>
                                    @elseif ($shipment->status == 1)
                                    <span class="badge ms-3 bg-success-transparent">Zugestellt und Bestätigt</span>
                                    @else
                                    <span class="badge ms-3 bg-warning-transparent">Unbekannter Status</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            @if ($shipment->status == 1)
                                            <div style="display: none;" id="InvoiceForm" class="col-xl-12 mb-3">
                                                <p class="fw-semibold">
                                                    Rechnung Erstellen:
                                                </p>
                                                <form action="{{route('company.invoice.add')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="shipment_id" value="{{$shipment->id}}">
                                                    <div class="row g-3 mb-3">
                                                        <div class="col-sm-6">
                                                            <label for="form-text" class="form-label fs-14 text-dark">Preis</label>
                                                            <input type="number" name="price" value="{{$shipment->price}}" class="form-control" placeholder="Preis" aria-label="Preis">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="form-text" class="form-label fs-14 text-dark">Geschichte</label>
                                                            <input type="date" name="date" value="{{ $shipment->created_at->format('Y-m-d') }}" class="form-control" placeholder="Geschichte" aria-label="Geschichte">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <button type="submit" class="btn w-100 btn-success">Rechnung Erstellen</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            @endif
                                            <script>
                                                function toggleInvoiceForm() {
                                                    var form = document.getElementById('InvoiceForm');
                                                    if (form.style.display === 'none' || form.style.display === '') {
                                                        form.style.display = 'block';
                                                    } else {
                                                        form.style.display = 'none';
                                                    }
                                                }
                                            </script>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                <p class="fw-bold mb-2">
                                                    Kunden :  {{$shipment->customer['name']}}
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
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6  mt-sm-0 mt-3"></div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-4">
                                                <p class="fw-bold mb-2">
                                                    Firma : {{ $shipment->author_company['name'] ?? 'N/A' }}
                                                    - {{ $shipment->author_company['general_manager'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    Tax: {{ $shipment->author_company['tax_number'] ?? 'N/A' }} , Fax: {{ $shipment->author_company['fax'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    HRB: {{ $shipment->author_company['hrb'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    İban: {{ $shipment->author_company['iban'] ?? 'N/A' }} , Bic: {{ $shipment->author_company['bic'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    StNr: {{ $shipment->author_company['stnr'] ?? 'N/A' }} , Ust Id Nr: {{ $shipment->author_company['ust_id_nr'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    Registry Court: {{ $shipment->author_company['registry_court'] ?? 'N/A' }}
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
                                                    Transporter : {{ $shipment->carrier['name'] ?? 'N/A' }}
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
                                        <p class="fw-semibold text-muted mb-1">Versand-ID :</p>
                                        <p class="fs-15 mb-1">#{{$shipment->s_code}}</p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Erstellungsdatum :</p>
                                        <p class="fs-15 mb-1">{{ $shipment->created_at->format('d/m/Y')}} - <span class="text-muted fs-12">{{ $shipment->created_at->format('H:i')}}</span></p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Bearbeitungsdatum :</p>
                                        <p class="fs-15 mb-1">{{ $shipment->updated_at->format('d/m/Y')}}</p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Versandbetrag :</p>
                                        <p class="fs-16 mb-1 fw-semibold">{{ $shipment->price}} €</p>
                                    </div>
                                    <div class="col-xl-12">
                                        <p class="fw-semibold text-black mb-1">Adresse Hochladen :</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Firma</th>
                                                        <th>Name</th>
                                                        <th>Telefon</th>
                                                        <th>Referenz</th>
                                                        <th>Verladedatum</th>
                                                        <th>Zeitfenster</th>
                                                        <th>Adresse</th>
                                                        <th>Details</th>
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
                                        
                                        <p class="fw-semibold text-black mt-4 mb-1">Liefer Adresse :</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Firma</th>
                                                        <th>Name</th>
                                                        <th>Telefon</th>
                                                        <th>Referenz</th>
                                                        <th>Verladedatum</th>
                                                        <th>Zeitfenster</th>
                                                        <th>Adresse</th>
                                                        <th>Details</th>
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
                                        
                                        <p class="fw-semibold text-black mt-4 mb-1">Betrags Informationen :</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">Gesamtmenge :</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">{{$shipment->price}} €</p>
                                                        </td>
                                                    </tr>
                                                    @if ($shipment->carrier !== null)
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">Versandkosten :</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">{{$shipment->carrier_price}} €</p>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0 fs-14">Gesamteinnahmen :</p>
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

@foreach ($unbilledShipments as $invoiceShipment)
<div class="modal fade" id="showShipmentInvoiceModal{{$invoiceShipment->id}}" tabindex="-1" aria-labelledby="showShipmentModal{{$invoiceShipment->id}}Label" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="fw-semibold text-primary" id="showShipmentModal{{$invoiceShipment->id}}Label">#{{$invoiceShipment->s_code}} <span class="text-black">Nummerierte Versandinformationen</span></h6>
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
                                        <div class="h6 fw-semibold mb-0">Sevkiyat NO : <span class="text-primary">#{{$invoiceShipment->s_code}}</span></div>
                                    </div>
                                </div>
                                <div class="ms-auto mt-md-0 mt-2">
                                    @if ($invoiceShipment->status != 4 && $invoiceShipment->status != 1)
                                    <a href="{{ route('shipments.status', ['shipment_id' => $invoiceShipment->id, 'status' => 4]) }}" class="btn btn-danger me-1" >Versand Stornieren</a>
                                    @endif
                                    @if ($invoiceShipment->status == 3)
                                    <a href="{{ route('shipments.status', ['shipment_id' => $invoiceShipment->id, 'status' => 2]) }}" class="btn btn-primary me-1" >Versand Bestätigen</a>
                                    @elseif ($invoiceShipment->status == 2)
                                    <a href="{{ route('shipments.status', ['shipment_id' => $invoiceShipment->id, 'status' => 1]) }}" class="btn btn-primary me-1" >Versand Abschließen</a>
                                    @elseif ($invoiceShipment->status == 1)
                                    @if ($invoiceShipment->invoice_date == null)
                                    <button type="button" class="btn btn-primary-light" onclick="toggleInvoiceForm()">Rechnung Erstellen <i class="bx bx-plus ms-1 align-middle"></i></button>
                                    @else
                                    <a href="{{ route('company.invoice.download', ['invoice' => $invoiceShipment->invoice_id]) }}" class="btn btn-primary-light">Rechnung Herunterladen <i class="ri-download-2-line ms-1 align-middle"></i></a>
                                    @endif
                                    @endif
                                    @if ($invoiceShipment->status != 3 && $invoiceShipment->status != 4)
                                    <a href="{{ route('shipment.company.pdf',$invoiceShipment->id)}}" class="btn btn-danger-light">PDF Herunterladen <i class="ri-download-2-line ms-1 align-middle"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            @if ($invoiceShipment->status == 1)
                                            <div style="display: none;" id="InvoiceForm" class="col-xl-12 mb-3">
                                                <p class="fw-semibold">
                                                    Rechnung Erstellen:
                                                </p>
                                                <form action="{{route('company.invoice.add')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="shipment_id" value="{{$invoiceShipment->id}}">
                                                    <div class="row g-3 mb-3">
                                                        <div class="col-sm-6">
                                                            <label for="form-text" class="form-label fs-14 text-dark">Preis</label>
                                                            <input type="number" name="price" value="{{$invoiceShipment->price}}" class="form-control" placeholder="Preis" aria-label="Preis">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="form-text" class="form-label fs-14 text-dark">Geschichte</label>
                                                            <input type="date" name="date" value="{{ $invoiceShipment->created_at->format('Y-m-d') }}" class="form-control" placeholder="Geschichte" aria-label="Geschichte">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <button type="submit" class="btn w-100 btn-success">Rechnung Erstellen</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            @endif
                                            <script>
                                                function toggleInvoiceForm() {
                                                    var form = document.getElementById('InvoiceForm');
                                                    if (form.style.display === 'none' || form.style.display === '') {
                                                        form.style.display = 'block';
                                                    } else {
                                                        form.style.display = 'none';
                                                    }
                                                }
                                            </script>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                <p class="fw-bold mb-2">
                                                    Kunden :  {{$invoiceShipment->customer['name']}}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{$invoiceShipment->customer['company_name']}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{$invoiceShipment->customer['street']}}, {{$invoiceShipment->customer['city']}},{{$invoiceShipment->customer['country']}},{{$invoiceShipment->customer['zip_code']}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{$invoiceShipment->customer['email']}}
                                                </p>
                                                <p class="mb-1 text-muted">
                                                    {{$invoiceShipment->customer['phone']}}
                                                </p>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6  mt-sm-0 mt-3"></div>
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-4">
                                                <p class="fw-bold mb-2">
                                                    Firma : {{ $invoiceShipment->author_company['name'] ?? 'N/A' }}
                                                    - {{ $invoiceShipment->author_company['general_manager'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    Tax: {{ $invoiceShipment->author_company['tax_number'] ?? 'N/A' }} , Fax: {{ $invoiceShipment->author_company['fax'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    HRB: {{ $invoiceShipment->author_company['hrb'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    İban: {{ $invoiceShipment->author_company['iban'] ?? 'N/A' }} , Bic: {{ $invoiceShipment->author_company['bic'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    StNr: {{ $invoiceShipment->author_company['stnr'] ?? 'N/A' }} , Ust Id Nr: {{ $invoiceShipment->author_company['ust_id_nr'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    Registry Court: {{ $invoiceShipment->author_company['registry_court'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $invoiceShipment->author_company['street'] ?? 'N/A' }},
                                                    {{ $invoiceShipment->author_company['city'] ?? 'N/A' }},
                                                    {{ $invoiceShipment->author_company['country'] ?? 'N/A' }},
                                                    {{ $invoiceShipment->author_company['zip_code'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $invoiceShipment->author_company['email'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted">
                                                    {{ $invoiceShipment->author_company['phone'] ?? 'N/A' }}
                                                </p>
                                            </div>
                                            @if ($invoiceShipment->carrier !== null)
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6  mt-sm-0 mt-3">
                                                <p class="fw-bold mb-2">
                                                    Transporter : {{ $invoiceShipment->carrier['name'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $invoiceShipment->carrier['street'] ?? 'N/A' }},
                                                    {{ $invoiceShipment->carrier['city'] ?? 'N/A' }},
                                                    {{ $invoiceShipment->carrier['country'] ?? 'N/A' }},
                                                    {{ $invoiceShipment->carrier['zip_code'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted mb-1">
                                                    {{ $invoiceShipment->carrier['email'] ?? 'N/A' }}
                                                </p>
                                                <p class="text-muted">
                                                    {{ $invoiceShipment->carrier['phone'] ?? 'N/A' }}
                                                </p>
                                            </div>                                                
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Versand-ID :</p>
                                        <p class="fs-15 mb-1">#{{$invoiceShipment->s_code}}</p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Erstellungsdatum :</p>
                                        <p class="fs-15 mb-1">{{ $invoiceShipment->created_at->format('d/m/Y')}} - <span class="text-muted fs-12">{{ $invoiceShipment->created_at->format('H:i')}}</span></p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Bearbeitungsdatum :</p>
                                        <p class="fs-15 mb-1">{{ $invoiceShipment->updated_at->format('d/m/Y')}}</p>
                                    </div>
                                    <div class="col-xl-3">
                                        <p class="fw-semibold text-muted mb-1">Versandbetrag :</p>
                                        <p class="fs-16 mb-1 fw-semibold">{{ $invoiceShipment->price}} €</p>
                                    </div>
                                    <div class="col-xl-12">
                                        <p class="fw-semibold text-black mb-1">Adresse Hochladen :</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Firma</th>
                                                        <th>Name</th>
                                                        <th>Telefon</th>
                                                        <th>Referenz</th>
                                                        <th>Verladedatum</th>
                                                        <th>Zeitfenster</th>
                                                        <th>Adresse</th>
                                                        <th>Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($invoiceShipment->upload_info as $u_info)
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
                                        
                                        <p class="fw-semibold text-black mt-4 mb-1">Liefer Adresse :</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Firma</th>
                                                        <th>Name</th>
                                                        <th>Telefon</th>
                                                        <th>Referenz</th>
                                                        <th>Verladedatum</th>
                                                        <th>Zeitfenster</th>
                                                        <th>Adresse</th>
                                                        <th>Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($invoiceShipment->delivery_info as $d_info)
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
                                        
                                        <p class="fw-semibold text-black mt-4 mb-1">Betrags Informationen :</p>
                                        <div class="table-responsive">
                                            <table class="table nowrap text-nowrap border mt-2">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">Gesamtmenge :</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">{{$invoiceShipment->price}} €</p>
                                                        </td>
                                                    </tr>
                                                    @if ($invoiceShipment->carrier !== null)
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0">Versandkosten :</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-15">{{$invoiceShipment->carrier_price}} €</p>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <th scope="row">
                                                            <p class="mb-0 fs-14">Gesamteinnahmen :</p>
                                                        </th>
                                                        <td>
                                                            <p class="mb-0 fw-semibold fs-16 text-success">{{$invoiceShipment->net_gain}} €</p>
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
