@extends('layouts.admin')

@section('content')

<div class="content-area">
  <div class="mr-breadcrumb">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="heading">{{ __('Add Language') }} <a class="add-btn" href="{{route('admin-lang-index')}}"><i
              class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
        <ul class="links">
          <li>
            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
          </li>
          <li><a href="javascript:;">{{ __('Language Settings') }}</a></li>
          <li>
            <a href="{{ route('admin-lang-index') }}">{{ __('Web Site Language') }}</a>
          </li>
          <li>
            <a href="{{ route('admin-lang-create') }}">{{ __('Add Language') }}</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="add-product-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="product-description">
          <div class="body-area">
            <div class="gocover"
              style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
            </div>
            <form id="geniusform" action="{{route('admin-lang-create')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              @include('includes.admin.form-both')

              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                    <h4 class="heading">{{ __('Language') }} *</h4>
                  </div>
                </div>
                <div class="col-lg-7">
                  <input type="text" class="input-field" name="language" placeholder="{{ __('Language') }}" required=""
                    value="English">
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                      <h4 class="heading">{{ __('Language Direction') }} *</h4>
                      <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                  </div>
                </div>
                <div class="col-lg-7">
                  <select name="rtl" class="input-field" required="">
                    <option value="0">{{ __('Left To Right') }}</option>
                    <option value="1">{{ __('Right To Left') }}</option>
                  </select>
                </div>
              </div>
              <hr>

              <h4 class="text-center">{{ __('SET LANGUAGE KEYS & VALUES') }}</h4>

              <hr>



              <div class="row">
                <div class="col-lg-2">
                    <div class="left-area">

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="featured-keyword-area">
                        <div class="lang-tag-top-filds" id="lang-section">
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Home</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Home</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaigns</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaigns</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Blog</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Blog</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Projects</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Projects</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Login / Register</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Login / Register</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Pages</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Pages</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Contact</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Contact</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">My Account</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">My Account</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Dashboard</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Dashboard</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Profile</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Profile</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Change Password</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Change Password</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Logout</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Logout</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Search what you want</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Search what you want</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Newsletter</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Newsletter</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Address</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Address</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Your email address...</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Your email address...</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">We're social, connect with us:</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">We're social, connect with us:</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaign</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaign</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Latest Campaign</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Latest Campaign</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Categories</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Categories</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Tags</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Tags</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">No Campaign Found</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">No Campaign Found</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Raised</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Raised</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Goal</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Goal</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Donate Now</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Donate Now</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaign Details</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaign Details</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Donate</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Donate</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Or Your Amount</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Or Your Amount</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Your First Name</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Your First Name</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Your Last Name</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Your Last Name</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Your Phone Number</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Your Phone Number</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Your Email Address</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Your Email Address</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Your Address</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Your Address</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Your Notes</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Your Notes</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Payment Option</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Payment Option</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Make a Donation</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Make a Donation</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">How much would you like to donate?</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">How much would you like to donate?</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Contact Us</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Contact Us</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">We'd love to</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">We'd love to</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Hear from you</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Hear from you</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Send us a message and we' ll respond as soon as possible</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Send us a message and we' ll respond as soon as possible</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Name</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Name</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Phone Number</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Phone Number</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Email Address</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Email Address</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Your Message</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Your Message</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Code</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Code</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Send Message</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Send Message</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Let's Connect</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Let's Connect</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Get in touch with us</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Get in touch with us</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Social Links</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Social Links</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">FAQ</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">FAQ</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Join Now</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Join Now</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Make Donation</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Make Donation</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Your Full Name</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Your Full Name</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">What kind of help you need</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">What kind of help you need</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Send To Us</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Send To Us</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">View(s)</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">View(s)</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Read More</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Read More</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Project</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Project</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Project Details</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Project Details</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Search For :</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Search For :</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Search</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Search</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Success</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Success</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Get Back To Our Homepage</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Get Back To Our Homepage</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Reset Password</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Reset Password</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Edit Profile</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Edit Profile</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Title</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Title</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Subtitle</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Subtitle</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Label</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Label</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Recent Campaigns</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Recent Campaigns</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Category</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Category</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Status</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Status</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">End Date</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">End Date</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Options</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Options</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Panding</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Panding</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Approved</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Approved</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Delete</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Delete</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">View</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">View</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Edit</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Edit</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Login</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Login</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Register</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Register</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Email</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Email</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Password</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Password</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Or</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Or</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Name</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Name</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Number</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Number</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Address</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Address</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Confirmation Password</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Confirmation Password</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">My Withdraws</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">My Withdraws</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Now</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Now</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Date</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Date</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Method</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Method</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Account</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Account</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Amount</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Amount</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Back</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Back</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Select Withdraw Method</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Select Withdraw Method</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Paypal</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Paypal</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Skrill</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Skrill</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Payoneer</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Payoneer</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Bank</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Bank</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Amount</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Amount</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Account Email</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Account Email</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter IBAN/Account No</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter IBAN/Account No</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Account Name</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Account Name</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Swift Code</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Swift Code</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Additional Reference(Optional)</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Additional Reference(Optional)</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Fee</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Fee</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">and</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">and</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">will deduct from your account</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">will deduct from your account</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Forgot Password</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Forgot Password</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Email</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Email</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Send</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Send</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Stripe</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Stripe</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">This name field is required.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">This name field is required.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">This email field is required.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">This email field is required.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">This phone field is required.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">This phone field is required.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">This message field is required.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">This message field is required.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Message Send Successfully.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Message Send Successfully.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">This email has already been taken.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">This email has already been taken.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are subscribed Successfully...</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are subscribed Successfully...</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Please enter Correct Capcha Code.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Please enter Correct Capcha Code.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Success! Thanks for contacting us, we will get back to you shortly.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Success! Thanks for contacting us, we will get back to you shortly.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Your Donation Amount</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Your Donation Amount</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Card Number</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Card Number</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">CVV</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">CVV</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Expire Month</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Expire Month</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Expire Year</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Expire Year</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">This Campaign Available Fund</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">This Campaign Available Fund</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Data Deleted Successfully</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Data Deleted Successfully</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Data Updated Successfully.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Data Updated Successfully.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaign Name</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaign Name</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Slug</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Slug</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Video Link</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Video Link</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Preloaded amount</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Preloaded amount</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Featured Allow</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Featured Allow</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Ending Date</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Ending Date</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Send Newsletter</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Send Newsletter</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Benefits</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Benefits</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Location</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Location</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">User Name</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">User Name</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Details</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Details</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Photo</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Photo</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Auction Details</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Auction Details</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Donations</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Donations</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">This slug has already been taken.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">This slug has already been taken.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Slug Must Not Have Any Special Characters.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Slug Must Not Have Any Special Characters.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">New Data Added Successfully.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">New Data Added Successfully.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaign Video Link</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaign Video Link</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Description</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Description</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Preloaded Amount</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Preloaded Amount</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">(Seperated By Comma(,))</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">(Seperated By Comma(,))</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Close Campaign After</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Close Campaign After</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Achieving Goal</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Achieving Goal</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add to Featured Campaign</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add to Featured Campaign</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Send NewsLetter to all Subscribers</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Send NewsLetter to all Subscribers</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Update</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Update</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaign Update</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaign Update</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current Featured Image</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current Featured Image</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Create Campaign</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Create Campaign</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Save</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Save</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Confirm Delete</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Confirm Delete</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Do you want to proceed</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Do you want to proceed</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Feature.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Feature.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Cancel</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Cancel</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Request Sent Successfully.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Request Sent Successfully.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Insufficient Balance.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Insufficient Balance.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Please enter a valid amount.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Please enter a valid amount.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current Password</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current Password</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">New Password</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">New Password</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Re-Type New Password</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Re-Type New Password</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Change</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Change</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">City</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">City</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Fax</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Fax</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Zip Code</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Zip Code</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Upload Image</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Upload Image</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Successfully updated your profile</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Successfully updated your profile</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Confirm password does not match.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Confirm password does not match.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current password Does not match.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current password Does not match.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Email Verified Successfully</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Email Verified Successfully</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Message Deleted Successfully</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Message Deleted Successfully</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">We need to verify your email address. We have sent an email to</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">We need to verify your email address. We have sent an email to</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">to verify your email address. Please click link in that email to continue.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">to verify your email address. Please click link in that email to continue.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Your Email is not Verified!</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Your Email is not Verified!</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Credentials Doesn\'t Match !</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Credentials Doesn\'t Match !</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Your Password Reseted Successfully. Please Check your email for new Password.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Your Password Reseted Successfully. Please Check your email for new Password.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">No Account Found With This Email.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">No Account Found With This Email.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Reset Password Request</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Reset Password Request</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Your New Password is :</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Your New Password is :</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Successfully change your password</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Successfully change your password</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Support Massage</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Support Massage</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Message</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Message</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Subject</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Subject</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Time</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Time</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Action</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Action</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Message Send!</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Message Send!</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Message.</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Message.</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Do you want to proceed?</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Do you want to proceed?</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Admin</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Admin</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Reply</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Reply</textarea>
                                    </div>
                                </div>
                            </div>
                                                                      <div class="lang-area">
                                <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Privacy &amp; Policy</textarea>
                                    </div>

                                    <div class="col-lg-6">
                                        <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Privacy &amp; Policy</textarea>
                                    </div>
                                </div>
                            </div>
                                                                  </div>
                        <a href="javascript:;" id="lang-btn" class="add-fild-btn"><i class="icofont-plus"></i> Add More Field</a>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="left-area">

                    </div>
                </div>
            </div>
              <hr>
              <div class="row">
                <div class="col-lg-5">
                  <div class="left-area">

                  </div>
                </div>
                <div class="col-lg-7">
                  <button class="addProductSubmit-btn" type="submit">{{ __('Create Language') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

<script>
  function isEmpty(el){
      return !$.trim(el.html())
  }
  
$("#lang-btn").on('click', function(){

    $("#lang-section").append(''+
        '<div class="lang-area">'+
          '<span class="remove lang-remove"><i class="fas fa-times"></i></span>'+
          '<div class="row">'+
            '<div class="col-lg-6">'+
            '<textarea name="keys[]" class="input-field" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>'+
            '</div>'+
            '<div class="col-lg-6">'+
            '<textarea  name="values[]" class="input-field" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>'+
            '</div>'+
          '</div>'+
        '</div>'+
    '');
});

$(document).on('click','.lang-remove', function(){

    $(this.parentNode).remove();
    if (isEmpty($('#lang-section'))) {

    $("#lang-section").append(''+
          '<div class="lang-area">'+
            '<span class="remove lang-remove"><i class="fas fa-times"></i></span>'+
            '<div class="row">'+
              '<div class="col-lg-6">'+
              '<textarea name="keys[]" class="input-field" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>'+
              '</div>'+
              '<div class="col-lg-6">'+
              '<textarea  name="values[]" class="input-field" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>'+
              '</div>'+
            '</div>'+
          '</div>'+
      '');
    }
});

</script>

@endsection