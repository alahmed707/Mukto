@extends('layouts.admin')

@section('styles')

<style type="text/css">
    .table-responsive {
    overflow-x: hidden;
}
table#example2 {
    margin-left: 10px;
}

</style>

@endsection

@section('content')
<div class="content-area">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">{{ __('User Details') }} <a class="add-btn" href="javascript:history.back();"><i class="fas fa-arrow-left"></i>{{ __('Back') }}</a></h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="{{ route('admin-user-index') }}">{{ __('Users') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-user-show',$data->id) }}">{{ __('Details') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="add-product-content customar-details-area">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-description">
                    <div class="body-area">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="user-image">
                                    @if($data->is_provider == 1)
                                    <img src="{{ $data->photo ? asset($data->photo):asset('assets/images/noimage.png')}}" alt="No Image"> @else
                                    <img src="{{ $data->photo ? asset('assets/images/users/'.$data->photo):asset('assets/images/noimage.png')}}" alt="No Image"> @endif
                                    <a href="javascript:;" class="mybtn1 send" data-email="{{ $data->email }}" data-toggle="modal" data-target="#vendorform">{{ __('Send Message') }}</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="table-responsive show-table">
                                    <table class="table">
                                        <tr>
                                            <th>ID#</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <td>{{$data->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Email') }}</th>
                                            <td>{{$data->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Phone') }}</th>
                                            <td>{{$data->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Address') }}</th>
                                            <td>{{$data->address}}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="table-responsive show-table">
                                    <table class="table">

                                        @if($data->city != null)
                                        <tr>
                                            <th>{{ __('City') }}</th>
                                            <td>{{$data->city}}</td>
                                        </tr>
                                        @endif @if($data->fax != null)
                                        <tr>
                                            <th>{{ __('Fax') }}</th>
                                            <td>{{$data->fax}}</td>
                                        </tr>
                                        @endif @if($data->zip != null)
                                        <tr>
                                            <th>{{ __('Zip Code') }}</th>
                                            <td>{{$data->zip}}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th>{{ __('Joined') }}</th>
                                            <td>{{$data->created_at->diffForHumans()}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-table-wrap">
                        <div class="order-details-table">
                            <div class="mr-table">
                                <h4 class="title">{{ __('Campaign List') }}</h4>
                                <div class="table-responsive">
                                    <table id="example2" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Category') }}</th>
                                                <th>{{ __('Goal') }}</th>
                                                <th>{{ __('End Date') }}</th>
                                                <th colspan="3">{{ __('Status') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $Currency = App\Models\Currency::where('is_default',1)->first();
                                        @endphp
                                            @foreach($data->campaign as $campaign)
                                            <tr>
                                                <td>
                                                    @if ($campaign->status=='open' && $campaign->is_panding == 1)
                                                    <a href="{{ route('admin-campaign-view',$campaign->id) }}">{{ $campaign->campaign_name}}</a> @else
                                                    <a href="{{ route('admin-campaign-panding-view',$campaign->id) }}">{{ $campaign->campaign_name}}</a> @endif
                                                </td>
                                                <td>{{ $campaign->category->name }}</td>

                                                <td> {{$Currency->sign}}  {{ round($campaign->goal * $Currency->value ,2) }}</td>
                                                <td>{{ date('Y-m-d h:i:s a',strtotime($campaign->end_date)) }}</td>
                                                <td>

                                                    @if ($campaign->status=='open' || $campaign->is_panding == 1) @if ($campaign->status=='open' && $campaign->is_panding == 1)
                                                    <span class="text-white badge badge-success p-2">{{ __('Open') }}</span> @else
                                                    <span class="text-white badge badge-info p-2">{{ __('Panding') }}</span> @endif @else
                                                    <span class="text-white badge badge-danger p-2">{{ __('Close') }}</span> @endif
                                                </td>
                                                </td>
                                            </tr>
                                            @endforeach

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

{{-- MESSAGE MODAL --}}
<div class="sub-categori">
    <div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vendorformLabel">Send Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-form">
                                    <form id="emailreply1">
                                        {{csrf_field()}}
                                        <ul>
                                            <li>
                                                <input type="email" class="input-field eml-val" id="eml1" name="to" placeholder="Email *" value="" required="">
                                            </li>
                                            <li>
                                                <input type="text" class="input-field" id="subj1" name="subject" placeholder="Subject *" required="">
                                            </li>
                                            <li>
                                                <textarea class="input-field textarea" name="message" id="msg1" placeholder="Your Message *" required=""></textarea>
                                            </li>
                                        </ul>
                                        <button class="submit-btn" id="emlsub1" type="submit">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    
{{-- MESSAGE MODAL ENDS --}}

@endsection

@section('scripts')

<script type="text/javascript">
$('#example2').dataTable( {
  "ordering": false,
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
      'responsive'  : true
} );
</script>


@endsection