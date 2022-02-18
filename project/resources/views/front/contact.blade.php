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
                        {{ __('Contact Us') }}
                </h1>
                <ul class="pages">
                    <li>
                        <a href="{{ route('front.index') }}">
                          {{ __('Home') }}
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('front.contact') }}">
                          {{ __('Contact Us') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->


<!-- Contact Us Area Start -->
<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-section-title">
                    <h4 class="subtitle">
                        {{ __("We'd love to") }}
                    </h4>
                    <h2 class="title">
                        {{ __('Hear from you') }}
                    </h2>
                    <p class="text">
                        {{ __("Send us a message and we' ll respond as soon as possible") }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-xl-7 col-lg-7">
                <div class="left-area">
                    <div class="contact-form">
                        <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                        <form id="contactform" action="{{route('front.contact.submit')}}" method="POST">
                            {{csrf_field()}} @include('includes.admin.form-both')
                            <ul>
                                <li>
                                    <input type="text" name="name" class="input-field" placeholder="{{ __('Name') }}*" required="">
                                
                                </li>
                                <li>
                                    <input type="text" name="number" class="input-field" placeholder="{{ __('Phone Number') }}*">
                                </li>
                                <li>
                                    <input type="email" name="email" class="input-field" placeholder="{{ __('Email Address') }}*" required="">
                                </li>
                                <li>
                                    <textarea name="text" name="" class="input-field textarea" placeholder="{{ __('Your Message') }}*" required=""></textarea>
                                </li>
                            </ul>
                            <ul class="captcha-area">
                                <li>
                                    <p><img class="codeimg" src="{{ asset("assets/images/capcha_code.png ") }}" alt=""> <i data-href="{{url('contact/refresh_code')}}" class="fas fa-sync-alt pointer refresh_code "></i></p>
                                </li>
                                <li>
                                    <input name="codes" type="text" class="input-field" placeholder="{{ __('Enter Code') }}*" required="">
                                </li>
                            </ul>
                            <input type="hidden" name="to" value="{{ $ps->contact_email }}">
                            <button class="submit-btn mybtn1" type="submit">{{ __('Send Message') }}</button>
                            <span class="spinner-border text-primary d-none" role="status"></span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="right-area">
                    <div class="top-content">
                        <h4 class="title">{{ __("Let's Connect") }}</h4>
                        <p class="text">{{ __('Get in touch with us') }}</p>
                    </div>
                    @if($ps->site != null || $ps->email != null )
                    <div class="contact-info ">
                        <div class="left ">
                            <div class="icon">
                                <i class="far fa-envelope"></i>
                            </div>
                        </div>
                        <div class="content d-flex align-self-center">
                            <div class="content">
                                @if($ps->site != null && $ps->email != null)
                                <a href="localhost/Mukto" target="_blank">mukto.com</a>
                                <a href="mailto:{{$ps->email}}">{{$ps->email}}</a>
                                @elseif($ps->site != null)
                                <a href="localhost/Mukto" target="_blank">mukto.com</a>
                                @else
                                <a href="mailto:{{$ps->email}}">{{$ps->email}}</a>
                                 @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($ps->phone != null || $ps->fax != null )
                    <div class="contact-info">
                        <div class="left">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                        </div>
                        <div class="content d-flex align-self-center">
                            <div class="content">
                                <p>
                                    @if($ps->street != null) {{ $ps->street }} @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($ps->phone != null || $ps->fax != null )
                    <div class="contact-info">
                        <div class="left">
                            <div class="icon">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                        <div class="content d-flex align-self-center">
                            <div class="content">
                                @if($ps->phone != null && $ps->fax != null)
                                <a href="tel:{{$ps->phone}}">{{$ps->phone}}</a>
                                <a href="tel:{{$ps->fax}}">{{$ps->fax}}</a>
                                @elseif($ps->phone != null)
                                <a href="tel:{{$ps->phone}}">{{$ps->phone}}</a>
                                @else
                                <a href="tel:{{$ps->fax}}">{{$ps->fax}}</a>
                                 @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="social-links">
                        <h4 class="title">{{ __('Social Links') }} :</h4>
                        <ul>
                            @if(App\Models\Socialsetting::find(1)->f_status == 1)
                            <li>
                                <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" class="facebook" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            @endif

                            @if(App\Models\Socialsetting::find(1)->g_status == 1)
                            <li>
                                <a href="{{ App\Models\Socialsetting::find(1)->gplus }}" class="google-plus" target="_blank">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            @endif

                            @if(App\Models\Socialsetting::find(1)->t_status == 1)
                            <li>
                                <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" class="twitter" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            @endif

                            @if(App\Models\Socialsetting::find(1)->l_status == 1)
                            <li>
                                <a href="{{ App\Models\Socialsetting::find(1)->linkedin }}" class="linkedin" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            @endif

                            @if(App\Models\Socialsetting::find(1)->d_status == 1)
                            <li>
                                <a href="{{ App\Models\Socialsetting::find(1)->dribble }}" class="dribbble" target="_blank">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us Area End-->


 @endsection
