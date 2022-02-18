@extends('layouts.admin')
 
@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('View Campaign') }}<a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-campaign-index') }}">{{ __('Campaign') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-campaign-view',$data->id) }}">{{ __('View Campaign') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row add_lan_tab justify-content-center bg-white">
            <div class="col-lg-10">
                <nav class="m-3">
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{__('Campaign Details')}}</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('Donations')}}</a>
                        <a class="nav-item nav-link" id="nav-withdrow-tab" data-toggle="tab" href="#nav-withdrow" role="tab" aria-controls="nav-withdrow" aria-selected="false">{{__('Withdraw')}}</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    {{-- FRONTEND STARTS --}}
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-description">
                                    <div class="body-area">
                                        <p class="text-center ShowFund text-success"></p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    @php
                                                        $Currency = App\Models\Currency::where('is_default',1)->first();
                                                    @endphp
                                                     @if($data->user_id > 0)
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('User Name')}}:</th>
                                                        <td>
                                                        <a href="{{route('admin-user-show',$data->user->id)}}"><span>{{ $data->user->name }}</span></a>
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
                                                        <td>
                                                            <img  src="{{ asset('assets/images/campaign/'.$data->photo) }}" alt="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Goal')}} <small> ({{$Currency->name}}) </small> :</th>
                                                        <td><span>{{$Currency->sign }} {{round( $data->goal * $Currency->value ,2) }}</span></td>
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
                                                    @if ($data->preloaded_amount)
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Preloaded amount')}} <small> ({{$Currency->name}}) </small>:</th>
                                                            <td>
                                                                @foreach (explode(',', $data->preloaded_amount) as $item)
                                                                    <span class="mr-3">{{ round($item * $Currency->value ,2)}}</span>
                                                                @endforeach
                                                            </td>
                                                        </tr>  
                                                    @endif
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
                                                                <span class="text-success"> {{ __('Actived') }} </span>
                                                             @else
                                                                <span class="text-danger">{{ __('Deactivated') }}</span>
                                                             @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Closing Status')}}:</th>
                                                        <td>
                                                            {{ $data->end_after }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Ending Date')}}:</th>
                                                        <td>
                                                            {{ $data->end_date }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Status')}}:</th>
                                                        <td>
                                                            @if ($data->status=='open' || $data->is_panding == 1) 
                                                                @if ($data->status=='open' && $data->is_panding == 1)
                                                                    <span class="text-success">{{ __('Open') }}</span>
                                                                @else
                                                                    <span class="text-info">{{ __('Panding') }}</span>
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
                                                    @endif
                                                     @if($data->location)
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Location')}}:</th>
                                                        <td>
                                                            {{ $data->location }}
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if($data->meta_tag)
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Meta Tags')}}:</th>
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

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mr-table allproduct">
                                    @include('includes.admin.form-success')
                                    <div class="table-responsiv">
                                        <p class="text-center ShowFund text-success"></p>
                                        <table id="geniustableDonation" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Name')}}</th>
                                                    <th>{{__('Email')}}</th>
                                                    <th>{{__('Phone')}}</th>
                                                    <th>{{__('Address')}}</th>
                                                    <th>{{__('Amount')}}</th>
                                                    <th>{{__('Note')}}</th>
                                                    <th>{{__('Date')}}</th>
                                                </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade mb-3" id="nav-withdrow" role="tabpanel" aria-labelledby="nav-withdrow-tab">
                        <div class="content-area">
                            <div class="product-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mr-table allproduct">
                                            @include('includes.admin.form-success')
                                            <div class="table-responsiv">
                                                <p class="text-center ShowFund text-success"></p>
                                                <a class="add-btn float-right" href="{{route('admin-campaign-withdrow-create',$data->id)}}" >
                                                    <i class="fas fa-plus"></i> {{ __('New Withdraw') }}
                                                </a>
                                                 
                                                <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">{{ __('Method') }}</th>
                                                        <th width="10%">{{ __('Account') }}</th>
                                                            <th width="10%">{{ __('Amount') }}  <small> ({{$Currency->name}})</small></th>
                                                            <th width="10%">{{ __('Status') }}</th>
                                                            <th width="20%">{{ __('Date') }}</th>
                                                        </tr>
                                                    </thead>
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
    </div>
<input type="hidden" id="campaign_id" value="{{$data->id}}">
@endsection

@section('scripts')





<script type="text/javascript">

    var table = $('#geniustable').DataTable({
           ordering: false,
           processing: true,
           serverSide: true,
           ajax: '{{ route('admin-campaign-withdrow-datatables') }}',
           columns: [
                    { data: 'method', name: 'method' },
                    { data: 'acc_email', name: 'acc_email' },
                    { data: 'amount', name: 'amount' },
                    { data: 'created_at', searchable: false, orderable: false},
                    { data: 'status', name: 'status' },
                 ],
           
            
        });


    var table = $('#geniustableDonation').DataTable({
           ordering: false,
           processing: true,
           serverSide: true,
           ajax: '{{ route('admin-donation-datatables-single', $data->id) }}',
           columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'number', name: 'number' },
                    { data: 'address', name: 'address' },
                    { data: 'donation_amount', name: 'donation_amount' },
                    { data: 'note', name: 'note' },
                    { data: 'created_at', searchable: false, orderable: false},
                    
                 ],
           
            
        });


{{-- DATA TABLE ENDS--}}

var value = $('#campaign_id').val();
         $.ajax({
             type: "get",
             url: '{{ url('admin/campaign/availble-fund/get') }}/' + value,
             success: function(data)
             {
                 $('.ShowFund').html(data);
             }
             });

</script>
@endsection