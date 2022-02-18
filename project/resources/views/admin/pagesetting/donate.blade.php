
@extends('layouts.admin')

@section('content')

<div class="content-area">
  <div class="mr-breadcrumb">
      <div class="row">
          <div class="col-lg-12">
              <h4 class="heading">{{ __('Donate Section') }}</h4>
              <ul class="links">
                  <li>
                      <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                  </li>
                  <li>
                      <a href="javascript:;">{{ __('Home Page Settings') }}</a>
                  </li>
                  <li>
                      <a href="{{ route('admin-ps-donate') }}">{{ __('Donate Section') }}</a>
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
                      <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                      <form id="geniusform" action="{{ route('admin-ps-update') }}" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }} @include('includes.admin.form-both')


                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('Title') }} *
                                </h4>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <input type="text" class="input-field" placeholder="{{ __('Title') }}" name="donate_title" value="{{ $data->donate_title }}">
                              </div>
                          </div>

                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('Subtitle') }} *
                                </h4>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <input type="text" class="input-field" placeholder="{{ __('Subtitle') }}" name="donate_subtitle" value="{{ $data->donate_subtitle }}">
                              </div>
                          </div>
                          <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                  <h4 class="heading"> {{ __('Button link') }}  *
                                    </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <input type="text" class="input-field" placeholder="Write Your url Here" name="donate_link1" value="{{ $data->donate_link1 }}">
                            </div>
                          </div>
                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"> {{ __('Button Text') }} *
                                      </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <input type="text" class="input-field" placeholder="Write Your url Here" name="donate_button_text" value="{{ $data->donate_button_text }}">
                              </div>
                            </div>




                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                  <div class="left-area">

                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <button class="addProductSubmit-btn" type="submit">{{ __('Save') }}</button>
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
