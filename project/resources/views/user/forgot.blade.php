@extends('layouts.front')

@section('content')

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ __('Forgot Password') }}
          </h1>

          <ul class="pages">
              <li>
                <a href="{{ route('front.index') }}">
                 {{ __('Home') }}
                </a>
              </li>
              <li>
                <a href="{{ route('user-forgot') }}">
                 {{ __('Forgot Password') }}
                </a>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->
    <section class="login-signup forgot-password">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-area">
                        <div class="header-area forgot-passwor-area">
                            <h4 class="title">{{ __('Change Password') }} </h4>
                            <p class="text"> </p>
                        </div>
                        <div class="login-form">
                            @include('includes.admin.form-login')               
                            <form id="forgotform" action="{{route('user-forgot-submit')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-input">
                                    <input type="email" name="email" class="User Name" placeholder="{{ __('Email') }}" required="">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="to-login-page">
                                        <a href="{{ route('user.login') }}">
                                            {{ __('Login') }}
                                        </a>
                                </div>
                                <input class="authdata" type="hidden" value="{{ __('checking') }}">
                                <button type="submit" class="submit-btn">{{ __('Send') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





@endsection


