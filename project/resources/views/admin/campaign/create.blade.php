@extends('layouts.admin')


@section('content')

<div class="content-area">
  <div class="mr-breadcrumb">
    <div class="row">
      <div class="col-lg-12">
          <h4 class="heading">{{ __('Add Campaign') }}<a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
          <ul class="links">
            <li>
              <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
            </li>
            <li>
              <a href="{{ route('admin-campaign-index') }}">{{ __('Campaign') }}</a>
            </li>
            <li>
              <a href="{{ route('admin-campaign-create') }}">{{ __('Add Campaign') }}</a>
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
            @include('includes.admin.form-error')  
            @include('includes.admin.form-success')
            @php
              $Currency = App\Models\Currency::where('is_default',1)->first();
            @endphp
          <form id="geniusform" action="{{route('admin-campaign-store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">{{ __('Campaign Name') }}*</h4>
                    <p class="sub-heading">({{ __('In Any Language') }})</p>
                </div>
              </div>
              <div class="col-lg-7">
                <input type="text" class="input-field" name="campaign_name" placeholder="{{ __('Campaign Name') }}" required="" value="{{ Request::old('campaign_name') }}">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">{{ __('Slug') }}*</h4>
                    <p class="sub-heading">({{ __('In Any Language') }})</p>
                </div>
              </div>
              <div class="col-lg-7">
                <input type="text" class="input-field" name="slug" placeholder="{{ __('Enter Slug') }}" required="" value="{{ Request::old('slug') }}">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">{{ __('Select Category') }}*</h4>
                </div>
              </div>
              <div class="col-lg-7">
                  <select  name="category_id" required="">
                      <option value="">{{ __('Select Category') }}</option>
                        @foreach($category as $cat)
                          <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">{{ __('Current Featured Image') }}*</h4>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="img-upload">
                    <div id="image-preview" class="img-preview" style="background: url({{ asset('assets/admin/images/upload.png') }});">
                        <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                        <input type="file" name="photo" class="img-upload" id="image-upload">
                      </div>
                      <p class="text">{{ __('Prefered Size: (600x600) or Square Sized Image') }}</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                  <h4 class="heading">
                    {{ __('Campaign Description') }}*
                  </h4>
                </div>
              </div>
              <div class="col-lg-7">
                  <textarea  class="nic-edit" name="description" placeholder="{{ __('Details') }}"></textarea> 
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">{{ __('Campaign Video Link') }}*</h4>
                </div>
              </div>
              <div class="col-lg-7">
                <input type="text" class="input-field" name="video_link" placeholder="{{ __('Campaign Video Link') }}" required="" value="{{ Request::old('video_link') }}">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">{{ __('End Date') }}*</h4>
                </div>
              </div>
              <div class="col-lg-7">
                <input type="text" class="input-field" name="end_date" id="end_date" autocomplete="off" placeholder="{{ __('End Date') }}" required="" value="{{ Request::old('end_date') }}">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                <h4 class="heading">{{ __('Goal') }}*</h4>
                    <p class="sub-heading">In {{$Currency->name}}({{$Currency->sign}})</p>
                </div>
              </div>
              <div class="col-lg-7">
                <input type="number" class="input-field" name="goal" placeholder="{{ __('Goal') }}" required="" value="{{ Request::old('campaiGoalgn_name') }}">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">{{ __('Benefits') }}</h4>
                </div>
              </div>
              <div class="col-lg-7">
                <input type="number" class="input-field" name="benefits" placeholder="{{ __('Benefits') }}" value="{{ Request::old('benefits') }}">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">{{ __('Location') }}</h4>
                </div>
              </div>
              <div class="col-lg-7">
                <input type="text" class="input-field" name="location" placeholder="{{ __('Location') }}" value="{{ Request::old('location') }}">
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                <h4 class="heading">{{ __('Preloaded Amount In') }}
                   ({{$Currency->name}})</h4>
                    <p class="sub-heading">{{ __('Seperated By Comma') }}(,)</p>
                </div>
              </div>
              <div class="col-lg-7">
                <ul id="preloaded_amount" class="myTags">

                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">{{ __('Tags') }}</h4>
                    <p class="sub-heading">{{ __('Seperated By Comma') }}(,)</p>
                </div>
              </div>
              <div class="col-lg-7">
                <ul id="tags" class="myTags">
                  
                </ul>
                <div class="checkbox-wrapper">
                  <input type="checkbox" name="secheck" class="checkclick" id="allowProductSEO">
                  <label for="allowProductSEO">{{ __('Allow Campaign SEO') }}</label>
                </div>
              </div>
            </div>


            <div class="showbox">
              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                      <h4 class="heading">{{ __('Meta Tags') }} *</h4>
                  </div>
                </div>
                <div class="col-lg-7">
                  <ul id="metatags" class="myTags">
                  </ul>
                </div>
              </div>  

              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                    <h4 class="heading">
                        {{ __('Meta Description') }} *
                    </h4>
                  </div>
                </div>
                <div class="col-lg-7">
                    <textarea class="input-field" name="meta_description" placeholder="{{ __('Meta Description') }}"></textarea> 
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading">{{ __('Close Campaign After') }}*</h4>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="col-sm-6">
                  <label class="radio-inline mr-3">
                      <input type="radio" name="end_after" value="goal">
                      {{ __('Achieving Goal') }}
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="end_after" value="date">
                      {{ __('End Date') }}
                  </label>
              </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                    <h4 class="heading"></h4>
                    <p class="sub-heading"></p>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="col-sm-6">
                  <label class="radio-inline mr-3" for="feature">
                      <input type="checkbox"  name="featured" value="1" id="feature">
                      {{ __('Add to Featured Campaign') }} <br>
                  </label>
                  <label class="radio-inline mr-3" for="newsletter">
                    <input type="checkbox"  name="send_newsletter" id="newsletter" value="1">
                    {{ __('Send NewsLetter to all Subscribers') }}
                </label>
              </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="left-area">
                  
                </div>
              </div>
              <div class="col-lg-7">
                <button class="addProductSubmit-btn" type="submit">{{ __('Create Post') }}</button>
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
   $("#metatags").tagit({
          fieldName: "meta_tag[]",
          allowSpaces: true 
          });
</script>
@endsection