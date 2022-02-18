@extends('layouts.admin')


@section('content')
<div class="content-area">
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Pending Campaign View') }}<a class="add-btn ml-2" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
                    <ul class="links"></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-campaign-index') }}">{{ __('Campaign') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-campaign-view',$data->id) }}">{{ __('Pending Campaign') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row add_lan_tab justify-content-center">
            <div class="col-lg-10">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                       Panding Campaign
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    {{-- FRONTEND STARTS --}}
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-description">
                                    <div class="body-area">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    @if($data->user_id > 0)
                                                        <tr>
                                                            <th class="auction-details-heading">{{__('User Name')}}:</th>
                                                            <td>
                                                            <small><a href="{{route('admin-user-show',$data->user->id)}}">{{$data->user->name}}</a></small>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Campaign Name')}}:</th>
                                                        <td>{{ $data->campaign_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Category')}}:</th>
                                                        <td>{{ $data->category->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Slug')}}:</th>
                                                        <td>{{ $data->category->slug }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Photo')}}:</th>
                                                        <td><img src="{{ asset('assets/images/campaign/'.$data->photo) }}" alt=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Goal')}}:</th>
                                                        <td><span>$ {{ $data->goal }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Video Link')}}:</th>
                                                        <td><span> {{ $data->video_link }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Details')}}:</th>
                                                        <td>
                                                            <p>{!! $data->description !!}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Preloaded amount')}}:</th>
                                                        <td>
                                                            @foreach (explode(',',$data->preloaded_amount) as $item)
                                                                <span class="mr-3">{{ $item }}</span>
                                                             @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Tags')}}:</th>
                                                        <td>
                                                            @foreach (explode(',',$data->tags) as $item)
                                                                <span class="mr-3">{{ $item }}</span>
                                                             @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Featured Allow')}}:</th>
                                                        <td>
                                                            @if ($data->featured==1)
                                                                <span class="text-success"> Active </span> 
                                                            @else
                                                                <span class="text-danger">Deactivate</span>
                                                             @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Ending Date')}}:</th>
                                                        <td>
                                                            {{ $data->end_date }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Send Newsletter')}}:</th>
                                                        <td>
                                                            @if ($data->send_newsletter==1)
                                                                <span class="text-success"> Active </span>
                                                             @else
                                                                <span class="text-danger">Deactivate</span>
                                                             @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Status')}}:</th>
                                                        <td>
                                                            @if ($data->status=='open' || $data->is_panding == 1) 
                                                                @if ($data->status=='open' && $data->is_panding == 1)
                                                                    <span class="text-success">Open</span>
                                                                @else
                                                                    <span class="text-info">Panding</span>
                                                                 @endif
                                                             @else
                                                                <span class="text-danger">Close</span>
                                                             @endif
                                                        </td>
                                                    </tr>
                                                    @if($data->benefits)
                                                        <tr>
                                                            <th class="auction-details-heading">{{__('Benefits')}}:</th>
                                                            <td>
                                                                {{ $data->benefits }}
                                                            </td>
                                                        </tr>
                                                    @endif @if($data->location)
                                                        <tr>
                                                            <th class="auction-details-heading">{{__('Location')}}:</th>
                                                            <td>
                                                                {{ $data->location }}
                                                            </td>
                                                        </tr>
                                                    @endif

                                                    @if($data->meta_tag)
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Meta Tag')}}:</th>
                                                        <td>
                                                            @foreach(explode(',' , $data->meta_tag) as $meta_tag)
                                                            {{ $meta_tag }}
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    @endif 
                                                    @if($data->meta_description)
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Meta Description')}}:</th>
                                                        <td>
                                                            {{ $data->meta_description }}
                                                        </td>
                                                    </tr>
                                                    @endif 
                                                     
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
