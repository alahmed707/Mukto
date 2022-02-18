@extends('layouts.front')
@section('content')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="pagetitle">
                    {{ __('Project') }}
                </h1>
                <ul class="pages">
                    <li>
                        <a href="{{ route('front.index') }}">
                            {{ __('Home') }}
                        </a>
                    </li>

                    <li class="active">
                        <a href="{{ route('front.project',$ppage->title) }}">
                            {{ __('Project Details') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Causes Area Start -->

<section class="causes-details-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="single-causes details">
                            <div class="img">
                                <img src="{{ asset('assets/images/portfolio/'.$ppage->photo) }}" alt="">
                            </div>
                            <div class="content">
                                    <h4 class="title">
										   {{ $ppage->title }}
									<p>{{$ppage->subtitle}}</p>
                                    </h4>
                                    <div class="causes-text">
                                        <p>{!! $ppage->details !!}</p>
                                    </div>
                                    <div class="footer-text social-link a2a_kit a2a_kit_size_32">
                                        <ul class="social-text">
                                            <li>
                                                <a class="facebook a2a_button_facebook" href="">
                                                  <i class="fab fa-facebook-f"></i>
                                                </a>
                                              </li>
                                                <li>
                                                    <a class="twitter a2a_button_twitter" href="">
                                                      <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="linkedin a2a_button_linkedin" href="">
                                                      <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="pinterest a2a_button_pinterest" href="">
                                                      <i class="fab fa-pinterest"></i>
                                                    </a>
                                                </li>
                                                <li>

                                                <a class="a2a_dd plus" href="https://www.addtoany.com/share">
                                                    <i class="fas fa-plus"></i>
                                                  </a>
                                                </li>
                                        </ul>
                                    </div>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Causes Area End -->

@endsection
