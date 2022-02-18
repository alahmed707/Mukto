@extends('layouts.admin') 

@section('content')  
<input type="hidden" id="headerdata" value="{{ __('FEATURE') }}">
<div class="content-area">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">{{ __('Feature Section') }}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="javascript:;">{{ __('Home Page Settings') }} </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-feature-index') }}">{{ __('Feature Section') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-area">
        <div class="row">
            <div class="col-lg-12 px-5 pt-5">
                <div class="card mb-5">
                    <div class="card-header infos">
                        <h4 class="text-white text-uppercase mb-0">{{ __('INFORMATIONS') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                        @include('includes.admin.form-both')
                        <form id="geniusform" action="{{ route('admin-ps-update') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase"><strong>{{ __('Subtitle') }}</strong></label>
                                        <input class="form-control" type="text" name="service_subtitle" value="{{ App\Models\Pagesetting::findOrFail(1)->service_subtitle }}" placeholder="Enter Subtitle" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase"><strong>{{ __('Title') }}</strong></label>
                                        <input class="form-control" type="text" name="service_title" value="{{ App\Models\Pagesetting::findOrFail(1)->service_title }}" placeholder="Enter Title" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 offset-lg-5 mt-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block text-white text-uppercase infos">{{ __('Submit') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


{{-- DELETE MODAL ENDS --}}					

@endsection    

