@extends('layouts.layout')
@section('title', 'Sendungen')
@section('content')
<link rel="stylesheet" href="{{asset('/')}}/assets/libs/gridjs/theme/mermaid.min.css">
<style>
    #responsiveDataTable_wrapper .row{
        margin-bottom: 20px;
    }
</style>
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">Sendungen</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Sendungen</li>
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
                                <h6 class="mb-1">Gesamtmonatsumsatz</h6>
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
                                <h6 class="mb-1">Monatliche Versandkosten</h6>
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
                                <h6 class="mb-1">Monatliches Nettoeinkommen</h6>
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
                                <h6 class="mb-1">Wöchentlicher Versand</h6>
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
                            Sendungen
                        </div>
                        <div class="d-flex">
                            <a href="{{route('shipments.add')}}" class="btn btn-sm btn-primary btn-wave waves-light waves-effect waves-light"><i class="ri-add-line fw-semibold align-middle me-1"></i> Sevkiyat Oluştur</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsiveDataTable" class="table text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Versand-ID</th>
                                        <th scope="col">Kunde</th>
                                        <th scope="col">Erstellt von</th>
                                        <th scope="col">Spediteur</th>
                                        <th scope="col">Kosten</th>
                                        <th scope="col">Gewinn</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Erstellungsdatum</th>
                                        <th scope="col">Letztes Aktualisierungsdatum</th>
                                        <th scope="col">Details</th>
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
                                        <td>Yok</td>
                                        @else
                                        <td>Var ({{$shipment->carrier_price}} €)</td>
                                        
                                        @endif
                                        <td>{{$shipment->price}} €</td>
                                        <td>{{$shipment->net_gain}} €</td>
                                        <td>
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
                                        </td>
                                        <td>{{ $shipment->created_at->format('d/m/Y')}}</td>
                                        <td>{{ $shipment->updated_at->format('d/m/Y')}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary-light btn-icon btn-sm" data-bs-toggle="modal" data-bs-target="#showShipmentModal{{$shipment->id}}" data-bs-title="Görüntüle"><i class="ri-eye-line"></i></button>
                                            <a href="{{route('shipments.edit', $shipment->id)}}" class="btn btn-success-light btn-icon ms-1 btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Düzenle"><i class="ri-pencil-line"></i></a>
                                            <button class="btn btn-danger-light btn-icon ms-1 btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Sil"><i class="ri-delete-bin-5-line"></i></button>
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
                                        <img src="{{asset('/')}}{{ Auth::user()->company->profile_image ?? 'assets/images/default/default-profile.png'}}" alt="Logo">
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
@endsection