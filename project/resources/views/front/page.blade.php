@extends('layouts.front')
@section('content')


  <!-- Breadcrumb Area Start -->
  @if($gs->breadcumb_banner)
  <div class="breadcrumb-area" style="background: url({{  asset('assets/images/'.$gs->breadcumb_banner) }});">
    <div class="overlay"></div>
  @else
  <div class="breadcrumb-area">
    <div class="overlay"></div>
  @endif
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            {{ $page->title }}
          </h1>
          <ul class="pages">
              <li>
                <a href="{{ route('front.index') }}">
                  {{ __('Home') }}
                </a>
              </li>
              <li class="active">
                <a href="{{ route('front.page',$page->slug) }}">
                  {{ $page->title }}
                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

<section class="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="about-info">
            <p>
							{!!  $page->details !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
