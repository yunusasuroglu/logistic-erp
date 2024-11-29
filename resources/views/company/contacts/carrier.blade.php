@extends('layouts.layout')
@php
    $title = trans_dynamic('persons_carrier_page_title');
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
    <h4 class="fw-medium mb-0">{{trans_dynamic('persons_carrier_page_name')}}</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">{{trans_dynamic('persons_carrier_page_home')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{trans_dynamic('persons_carrier_page_name')}}</li>
    </ol>
</div>
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">{{trans_dynamic('persons_carrier_page_name')}}</div>
                        <div style="margin-left: auto;" class="card-title"> <a href="{{route('contacts.contact.add')}}" class="btn btn-primary">{{trans_dynamic('persons_carrier_person_add')}}</a></div>
                    </div>
                    <div class="card-body">
                        <div id="file-export_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="dataTables_scroll">
                                <div class="dataTables_scrollBody " style="position: relative; overflow: auto; width: 100%;">
                                    <table id="responsiveDataTable" class="table table-bordered text-nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">{{trans_dynamic('persons_carrier_table_name_surname')}}</th>
                                                <th scope="col">{{trans_dynamic('persons_carrier_table_phone')}}</th>
                                                <th scope="col">{{trans_dynamic('persons_carrier_table_company')}}</th>
                                                <th scope="col">{{trans_dynamic('persons_carrier_table_email')}}</th>
                                                <th scope="col">{{trans_dynamic('persons_carrier_table_person_type')}}</th>
                                                <th scope="col">{{trans_dynamic('persons_carrier_table_detail')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                            <tr class="odd">
                                                <td class="sorting_1">#{{$contact->id}}</td>
                                                <td>{{$contact->name}}</td>
                                                <td>{{$contact->phone}}</td>
                                                <td>{{$contact->company_name}}</td>
                                                <td>{{$contact->email}}</td>
                                                <td class="text-center">{{trans_dynamic('persons_carrier_table_person_type_carrier')}}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-success">{{ trans_dynamic('persons_customer_table_edit') }}</a>

                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">{{ trans_dynamic('persons_customer_table_delete') }}</button>
                                                    </form>
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

@endsection