@extends('layouts.admin')

@section('content')

<div class="content-area">
  <div class="mr-breadcrumb">
      <div class="row">
          <div class="col-lg-12">
              <h4 class="heading">{{ __('Website Contents') }}</h4>
              <ul class="links">
                  <li>
                      <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                  </li>
                  <li>
                      <a href="javascript:;">{{ __('Generel Settings') }}</a>
                  </li>
                  <li>
                      <a href="{{ route('admin-gs-contents') }}">{{ __('Website Contents') }}</a>
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
                      <form action="{{ route('admin-gs-update') }}" id="geniusform" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }} @include('includes.admin.form-both')

                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('Website Title') }} *
                                </h4>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <input type="text" class="input-field" placeholder="Write Your Site Title Here" name="title" value="{{ $gs->title }}" required="">
                              </div>
                          </div>

                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('Theme Color') }} *</h4>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <div class="input-group colorpicker-component cp">
                                          <input type="text" name="colors" value="{{ $gs->colors }}" class="form-control cp" />
                                          <span class="input-group-addon"><i></i></span>
                                      </div>
                                  </div>

                              </div>
                          </div>

                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('Secendary Color') }} *</h4>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <div class="input-group colorpicker-component cp">
                                          <input type="text" name="secendary_color" value="{{ $gs->secendary_color }}" class="form-control cp" />
                                          <span class="input-group-addon"><i></i></span>
                                      </div>
                                  </div>

                              </div>
                          </div>

                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                  <div class="left-area">
                                      <h4 class="heading">
                                  {{ __('Tawk.to') }}
                              </h4>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="action-list">
                                      <select class="process select droplinks {{ $gs->is_talkto == 1 ? 'drop-success' : 'drop-danger' }}">
                                          <option data-val="1" value="{{route('admin-gs-talkto',1)}}" {{ $gs->is_talkto == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                          <option data-val="0" value="{{route('admin-gs-talkto',0)}}" {{ $gs->is_talkto == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('Sign Up Verification') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_verification_email == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-is-email-verify',1)}}" {{ $gs->is_verification_email == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-is-email-verify',0)}}" {{ $gs->is_verification_email == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>


                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                  <div class="left-area">
                                      <h4 class="heading">
                                    {{ __('Tawk.to ID') }} *
                                </h4>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="action-list">
                                      <textarea class="input-field" name="talkto">{{$gs->talkto}}</textarea>
                                  </div>
                              </div>
                          </div>

                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                  <div class="left-area">
                                      <h4 class="heading">
                                  {{ __('Disqus') }}
                              </h4>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="action-list">
                                      <select class="process select droplinks {{ $gs->is_disqus == 1 ? 'drop-success' : 'drop-danger' }}">
                                          <option data-val="1" value="{{route('admin-gs-isdisqus',1)}}" {{ $gs->is_disqus == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                          <option data-val="0" value="{{route('admin-gs-isdisqus',0)}}" {{ $gs->is_disqus == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                  <div class="left-area">
                                      <h4 class="heading">
                                    {{ __('Disqus Website Short Name') }} *
                                </h4>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="action-list">
                                      <textarea class="input-field" name="disqus">{{$gs->disqus}}</textarea>
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

@section('scripts')

{{--TAGIT --}}

<script type="text/javascript">

          $("#tags").tagit({
          fieldName: "quotes[]",
          allowSpaces: true 
        });

</script>

{{-- TAGIT ENDS--}}

@endsection