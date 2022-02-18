@extends('layouts.admin')
@section('content')
<div class="content-area">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">{{ __('Call Back Informations') }} </h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="javascript:;">{{ __('Home Page Settings') }} </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-ps-video') }}">{{ __('Call Back Informations') }}</a>
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
                            {{csrf_field()}} @include('includes.admin.form-both')

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('Title') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <textarea class="input-field" name="callback_title" placeholder="Title" required="" rows="5"> {{$data->callback_title}} </textarea>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('Sub Title') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <textarea class="input-field" name="callback_subtitle" placeholder="Sub Title" required="" rows="5"> {{$data->callback_subtitle}} </textarea>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('Background Image') }} 1 *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="img-upload full-width-img">
                                        <div id="image-preview" class="img-preview" style="background: url({{ $data->callback_image1 ? asset('assets/images/'.$data->callback_image1):asset('assets/images/noimage.png') }});">
                                            <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{__('Upload Image')}}</label>
                                            <input type="file" name="callback_image1" class="img-upload" id="image-upload">}}
                                        </div>
                                        <p class="text">{{ __('Prefered Size: (850x445) or Relevant Sized Image') }}</p>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('Background Image') }} 2 *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="img-upload full-width-img">
                                        <div id="image-preview" class="img-preview" style="background: url({{ $data->callback_image2 ? asset('assets/images/'.$data->callback_image2):asset('assets/images/noimage.png') }});">
                                            <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                            <input type="file" name="callback_image2" class="img-upload" id="image-upload">
                                        </div>
                                        <p class="text">{{ __('Prefered Size: (850x445) or Relevant Sized Image') }}</p>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">

                                    </div>
                                </div>
                                <div class="col-lg-7">
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