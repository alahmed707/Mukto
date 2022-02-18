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
            {{ __('FAQ') }}
          </h1>

          <ul class="pages">
              <li>
                <a href="{{ route('front.index') }}">
                  {{ __('Home') }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.faq') }}">
                  {{ __('FAQ') }}
                </a>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

  <!-- faq Area Start -->
  <section class="faq-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 mx-auto">
          <div id="accordion">

            @foreach($faqs as $fq)
            <h3 class="heading">{{ $fq->title }}</h3>
            <div class="content">
                <p>{!!  $fq->details !!}</p>
            </div>
            @endforeach
          </div>
        </div>
        
      </div>
    </div>
  </section>
  <!-- faq Area End-->
@endsection

@section('scripts')
<script>
  /*-----------------------------
      Accordion Active js
  -----------------------------*/
  $("#accordion").accordion({
    heightStyle: "content",
    collapsible: true,
    icons: {
      "header": "ui-icon-caret-1-e",
      "activeHeader": " ui-icon-caret-1-s"
    }
  });

</script>
@endsection
