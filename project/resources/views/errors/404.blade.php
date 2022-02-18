@extends('layouts.front')
@section('content')

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url({{ $gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png') }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
              {{ __('Error') }}
          </h1>

          <ul class="pages">
                
              <li>
                <a href="{{ route('front.index') }}">
                  {{ __('Home') }}
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  {{ __('Error') }}
                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->


<section class="fourzerofour">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
          <img src="{{$gs->error_photo ? asset('assets/images/'.$gs->error_photo) : ''}}" alt="">
              {!!  $gs->error_title !!}
              {!!  $gs->error_text !!}
            <a class="mybtn1 pt-3" href="{{ route('front.index') }}">{{ __('Back Home') }}</a>
          </div>
        </div>
      </div>
    </div>
</section>


@endsection