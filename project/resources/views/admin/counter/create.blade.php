@extends('layouts.load')

@section('content')
<div class="content-area">
  <div class="add-product-content">
      <div class="row">
          <div class="col-lg-12">
              <div class="product-description">
                  <div class="body-area">
                      @include('includes.admin.form-error')
                      <form action="{{ route('admin-counter-store') }}" id="geniusformdata" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }} @include('includes.admin.form-both')
                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('Text') }} *</h4>
                                      <p class="sub-heading">({{ __('In Any Language') }})</p>
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  <input type="text" class="input-field" name="text" placeholder="{{ __('Enter Text') }}" required="" value="">
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('Counter') }} *</h4>
                                      <p class="sub-heading">({{ __('In Any Language') }})</p>
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  <input type="number" class="input-field" name="counter" placeholder="{{ __('Enter Counter Number') }}" required="" value="">
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('Counter Icon') }}  *</h4>
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  <div class="img-upload">
                                      <div id="image-preview" class="img-preview" style="background: url({{ asset('assets/admin/images/upload.png') }});">
                                          <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                          <input type="file" name="photo" class="img-upload" id="image-upload">
                                      </div>
                                      <p class="text">{{ __('Prefered Size: (80x80) or Square Sized Image') }}</p>
                                  </div>
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