@extends('layouts.admin')

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Home Page Customization') }}</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                      </li>
                      <li>
                        <a href="javascript:;">{{ __('Home Page Settings') }}</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-ps-customize') }}">{{ __('Home Page Customization') }}</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="social-links-area">
                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>

                        <form id="geniusform" action="{{ route('admin-ps-homeupdate') }}" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                        @include('includes.admin.form-both')  

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="cservice">{{ __('Service Section') }}</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="cservice" value="1" {{$data->cservice==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="ccounter">{{ __('Counter Section') }}</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="ccounter" value="1" {{$data->ccounter==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="best">{{ __('Feature Section') }}</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="cfeature" value="1" {{$data->cfeature==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="contact_section">{{ __('Donate Section') }}</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="cdonate" value="1" {{$data->cdonate == 1 ? "checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
              </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="pricing_plan">{{ __('Request Call-Back Section') }}</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="ccallback" value="1" {{$data->ccallback == 1 ? "checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>

                  <div class="col-lg-2"></div>

                  <div class="col-lg-4 d-flex justify-content-between">
                    <label class="control-label" for="big">{{ __('Team Section') }}</label>
                        <label class="switch float-right">
                          <input type="checkbox" name="cteam" value="1" {{$data->cteam==1?"checked":""}}>
                          <span class="slider round"></span>
                      </label>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="hot_sale">{{ __('Portfolio section') }}</label>
                    <label class="switch float-right">
                      <input type="checkbox" name="cportfolio" value="1" {{$data->cportfolio==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="review_blog">{{ __('Latest Blog/News Section') }} </label>
                    <label class="switch float-right">
                      <input type="checkbox" name="cnews" value="1" {{$data->cnews==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <br>

                <div class="row">
                  <div class="col-12 text-center">
                    <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
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