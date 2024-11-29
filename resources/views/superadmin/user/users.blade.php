@extends('layouts.layout')
@section('title', 'Kullanıcılar')
@section('content')
<link rel="stylesheet" href="{{asset('/')}}/assets/libs/gridjs/theme/mermaid.min.css">
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">Kullanıcılar</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">Anasayfa</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Kullanıcılar</li>
    </ol>
</div>
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Kullanıcılar</div>
                        <div style="margin-left: auto;" class="card-title"> <a href="{{route('user.create')}}" class="btn btn-primary">Kullanıcı Ekle</a></div>
                    </div>
                    <div class="card-body">
                        <div id="file-export_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="dataTables_scroll">
                                <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                    <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 719px; padding-right: 0px;">
                                        <table class="table table-bordered text-nowrap dataTable no-footer" style="width: 719px; margin-left: 0px;">
                                            <thead>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="dataTables_scrollBody " style="position: relative; overflow: auto; width: 100%;">
                                    <table id="file-export" class="table table-bordered text-nowrap dataTable no-footer" style="width: 100%;" aria-describedby="file-export_info">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="file-export" rowspan="1" colspan="1" style="width: 94.9375px;" aria-sort="id" aria-label="Name: activate to sort column descending">ID</th>
                                                <th scope="col" class="sorting" tabindex="0" aria-controls="file-export" rowspan="1" colspan="1" style="width: 169.663px;" aria-label="İsim Soyisim: activate to sort column ascending">İsim Soyisim</th>
                                                <th scope="col" class="sorting sorting_asc" tabindex="0" aria-controls="file-export" rowspan="1" colspan="1" style="width: 94.9375px;" aria-sort="Telefon" aria-label="Telefon: activate to sort column descending">Telefon</th>
                                                <th scope="col" class="sorting" tabindex="0" aria-controls="file-export" rowspan="1" colspan="1" style="width: 169.663px;" aria-label="Şirket: activate to sort column ascending">Şirket</th>
                                                <th scope="col" class="sorting" tabindex="0" aria-controls="file-export" rowspan="1" colspan="1" style="width: 73.2875px;" aria-label="E-Posta: activate to sort column ascending">E-Posta</th>
                                                <th scope="col" class="sorting" tabindex="0" aria-controls="file-export" rowspan="1" colspan="1" style="width: 26.1875px;" aria-label="Kullanıcı Türü: activate to sort column ascending">Kullanıcı Türü</th>
                                                <th scope="col" class="sorting" tabindex="0" aria-controls="file-export" rowspan="1" colspan="1" style="width: 26.1875px;" aria-label="Kullanıcı Durumu: activate to sort column ascending">Kullanıcı Durumu</th>
                                                <th scope="col" class="sorting" tabindex="0" aria-controls="file-export" rowspan="1" colspan="1" style="width: 26.1875px;" aria-label="Kullanıcı Bağlı Şirketi: activate to sort column ascending">E-Posta Onayı</th>
                                                <th scope="col" class="sorting" tabindex="0" aria-controls="file-export" rowspan="1" colspan="1" style="width: 56.6px;" aria-label="Detay: activate to sort column ascending">Detay</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $counter = 0;
                                            @endphp
                                            
                                            @foreach ($users as $user)
                                            <tr class="{{ $counter % 2 == 0 ? 'odd' : 'even' }}">
                                                <td class="sorting_1">{{ $counter }}</td>
                                                <td>{{ $user->name }} {{ $user->surname }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    @if ($user->company)
                                                    {{ $user->company->name }}@if($user->isAdmin())<b> Admin</b>@endif
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-center">
                                                    @foreach ($user->roles as $role)
                                                    <span class="badge bg-outline-danger">{{ $role->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($user->status == 1)
                                                    <span class="badge bg-outline-success">{{ trans_dynamic('employees_table_status_active') }}</span>
                                                    @else
                                                    <form action="{{ route('user.approve', $user->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Onayla</button>
                                                    </form>
                                                    @endif    
                                                </td>
                                                <td>
                                                    @if ($user->email_verified_at == !null)
                                                    <span class="badge bg-outline-success">Onaylandı</span>
                                                    @else
                                                    <span class="badge bg-outline-danger">Onaylanmadı</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success">Düzenle</a>

                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Sil</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @php
                                            $counter++;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="dataTables_paginate paging_simple_numbers" id="file-export_paginate">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection