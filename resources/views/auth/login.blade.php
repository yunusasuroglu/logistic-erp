@extends('layouts.app')
@php
    $title = trans_dynamic('login_page_title');
@endphp
@section('title', $title)
@section('content')
<div class="error-page  ">
    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-5 d-flex justify-content-center">
                    <a href="{{route('login')}}">
                        <img style="width: 100%;" src="{{asset('/')}}assets/images/systems-logo/logo-dark.png" alt="logo" class="desktop-logo">
                        <img src="{{asset('/')}}assets/images/systems-logo/logo-dark.png" alt="logo" class="desktop-dark">
                    </a>
                </div>
                <div class="card custom-card rectangle2">
                    <div class="card-body p-5 rectangle3">
                        <p class="h4 fw-semibold mb-2 text-center">{{trans_dynamic('login_name')}}</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">{{trans_dynamic('login_sub_name')}}</p>
                        <div class="row gy-3">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default">{{trans_dynamic('login_form_email')}}</label>
                                    <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="signin-username" placeholder="{{trans_dynamic('login_form_placeholder_email')}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="signin-password" class="form-label mt-2 text-default d-block">{{trans_dynamic('login_form_password')}}
                                    <div class="input-group mt-2 ">
                                        <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="signin-password" placeholder="{{trans_dynamic('login_form_placeholder_password')}}">
                                        <button class="btn btn-light bg-transparent" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                {{trans_dynamic('login_form_remember_me')}}
                                            </label>
                                            @if (Route::has('password.request'))
                                            <a title="Forgot Password" href="{{ route('password.request') }}" class="float-end text-primary">{{trans_dynamic('login_form_reset_password')}}</a>
                                            @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">{{trans_dynamic('login_form_login')}}</button>
                                </div>
                            </form>
                        </div>
                        <div class="text-center">
                            <p class="fs-12 text-muted mt-3">{{trans_dynamic('login_dont_have_an_account_yet')}} <a href="{{route('register')}}" class="text-primary">{{trans_dynamic('login_create_account')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
