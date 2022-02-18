@extends('layouts.front')
@section('content')
<!-- Breadcrumb Area Start -->
@if($gs->breadcumb_banner)
<div class="breadcrumb-area" style="background: url({{  asset('assets/images/'.$gs->breadcumb_banner) }});">
    <div class="overlay"></div>
@else
<div class="breadcrumb-area">
    <div class="overlay"></div>
@endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="pagetitle">
                    {{ __('Donate') }}
                </h1>
                <ul class="pages">
                    <li>
                        <a href="{{ route('front.index') }}">
                           {{__('Home')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('front.campaign') }}">
                            {{ __('Campaign') }}
                        </a>
                    </li>

                    <li class="active">
                        <a href="{{ route('front.campaign.donet',$CampaignData->slug) }}">
                            {{ __('Donate') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Causes Area Start -->
<section class="causes-details-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-causes details donate-page mb-0">
                    <div class="img">
                        <img src="{{ asset('assets/images/campaign/'.$CampaignData->photo)}}" alt="">
                    </div>
                    <div class="content">

                        <div class="top-box-wrapper pb-0">
                            <div class="t-b-inner">
                                <h4 class="title">
                                    {{substr(strip_tags($CampaignData->description),0,100)}}

                                    </h4>
                                    <div class="progress-area">
                                        <div class="persentage">
                                            <span>{{ round($CampaignData->donation->sum('donation_amount') / $CampaignData->goal * 100, 2) > 100.00  ? '100' : round($CampaignData->donation->sum('donation_amount') / $CampaignData->goal * 100, 2) }}%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar  p-1" style="width:{{ ($CampaignData->donation->sum('donation_amount') / $CampaignData->goal * 100) }}%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="top-meta mt-3">
                                        <div class="left">
                                                {{ __('Raised') }}: <span>{{ $currencies->sign }} {{ round($CampaignData->donation->sum('donation_amount') * $currencies->value ,2) }}</span>
                                        </div>
                                        <div class="right">
                                            {{ __('Goal') }} :  <span>{{ $currencies->sign }} {{ round($CampaignData->goal * $currencies->value ,2) }} </span>
                                        </div>
                                    </div>
                                    <div class="causes-details2">
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="mb-2">
                                                    <ul>
                                                        <li class="aleart alert-danger p-2 mb-2">{{ $error }}</li>
                                                    </ul>
                                                </div>
                                            @endforeach
                                        @endif

                                        @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                        @endif

                                        @if(session()->has('unsuccess'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('unsuccess') }}
                                        </div>
                                        @endif
                                        <div class="makea-donation">
                                            <div class="top-header-area">
                                                <h4 class="title">{{ __('Make a Donation') }}</h4>
                                                <p class="text">{{ __('How much would you like to donate?') }}</p>
                                            </div>
                                                <div class="content">
                                                <p class="text-mutedmb-4">{{$CampaignData->campaign_name}}</p>
                                                    @if ($CampaignData->preloaded_amount)
                                                        @if (!$amount)
                                                        @php
                                                        $preamount = explode(',',$CampaignData->preloaded_amount);
                                                        $preamount = count($preamount);
                                                        @endphp
                                                        <ul class="donet-price">
                                                            @foreach (explode(',',$CampaignData->preloaded_amount) as $key => $item)
                                                            @if($preamount <= 5)
                                                            <li>
                                                                <a href="javascript:;" class="preloaded_amount">
                                                                    {{ round($item * $currencies->value ,2) }}
                                                                </a>
                                                            </li>
                                                            @elseif($preamount >= 10)
                                                                    @if($key >= 5  && 10 > $key)
                                                                        <li>
                                                                            <a href="javascript:;" class="preloaded_amount">
                                                                                {{ round($item * $currencies->value ,2) }}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                            <li class="amount">
                                                                <p>{{ $currencies->sign }}</p>
                                                            <input type="text" class="preloaded_amountValue" placeholder="{{ __('Amount')}}"  value="">
                                                            </li>
                                                        </ul>
                                                        @else
                                                            <p class="text muted text-center">{{ __('Amount') }} = <strong>{{ $currencies->sign }} <input type="text" class="preloaded_amountValue"  value="{{$amount}}"></strong></p>
                                                        @endif


                                                    @else
                                                    <ul class="donet-price">
                                                        <li class="amount">
                                                            <p>{{ $currencies->sign }}</p>
                                                        <input type="text" class="preloaded_amountValue " placeholder="{{ __('Amount')}}"  value="">
                                                        </li>
                                                    </ul>

                                                    @endif


                                                    <div class="donation-form mt-5">
                                                        @php
                                                            $user = Auth::user();
                                                        @endphp
                                                        <form class="pay-form" action=""  method="post">
                                                            @csrf
                                                            <input type="hidden" name="lname" required class="input-field" placeholder="{{ __('Enter Your First Name') }}" value="{{$user ? $user->name : Request::old('fname') }}">
                                                            <input type="hidden" value="{{ $CampaignData->id }}" name="campaign_id">
                                                            <input type="hidden" class="preloaded_amountValue" value="{{$amount ? $amount : Request::old('donation_amount')}}" name="donation_amount">
                                                            <input type="hidden"  value="{{ $CampaignData->user_id }}" name="user_id">
                                                            <div class="AnonymousForm">
                                                            <div class="row mt-3">
                                                                <div class="col-lg-6">
                                                                    <input type="text" name="fname" required class="input-field" placeholder="{{ __('Enter Your First Name') }}" value="{{$user ? $user->name : Request::old('fname') }}">
                                                                </div>
                                                                 <div class="col-lg-6">
                                                                        <input type="text" name="number" required class="input-field" placeholder="{{ __('Enter Your Phone Number') }}" value="{{$user ? $user->phone : Request::old('number') }}">
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                               
                                                                <div class="col-lg-6">
                                                                        <input type="text" name="email" required  class="input-field" placeholder="{{ __('Enter Your Email Address') }}" value="{{$user ? $user->email: Request::old('email') }}">
                                                                </div>
                                                                <div class="col-lg-6">
                                                                        <input type="text" name="address" required  class="input-field" placeholder="{{ __('Enter Your Address') }}" value="{{$user ? $user->address : Request::old('address') }}">
                                                                </div>
                                                            </div>
                                                              <div class="row">
                                                               
                                                                <div class="col-lg-12">
                                                                        <input type="text" name="note" class="input-field" placeholder="{{ __('Enter Your Notes') }}" value="{{ Request::old('note') }}">
                                                                </div>
                                                            
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row">
                                                                
                                                               
                                                                <div class="col-lg-6">
                                                                    <select name="method" id="method" class="option input-field" required="">
                                                                        <option value="" data-form="" data-show="no" data-val="" data-href="">{{ __('Select an option') }}</option>
                                                                        @foreach($gateways as $paydata)
                                                                            <option value="{{ $paydata->name }}" data-form="{{ $paydata->showCheckoutLink() }}" data-show="{{ $paydata->showForm() }}" data-href="{{ route('front.load.payment',['slug1' => $paydata->showKeyword(),'slug2' => $paydata->id]) }}" data-val="{{ $paydata->keyword }}">
                                                                                {{ $paydata->name }}
                                                                            </option>
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row padiingG">
                                                                
                                                            </div>
                                                            <div id="payments" class="d-none">

                                                            </div>

                                                            <input type="hidden" name="cmd" value="_xclick">
                                                            <input type="hidden" name="no_note" value="1">
                                                            <input type="hidden" name="lc" value="UK">
                                                            <input type="hidden" name="currency_code" id="currency_name" value="{{ $currencies->name }}">
                                                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">
                                                            <input type="hidden" name="sub" id="sub" value="0">

                                                    </div>
                                                   <div class="submit-btn-area d-flex align-items-center">
                                                    <button type="submit" class="mybtn1 mr-4" id="final-btn">{{ __('Donate Now') }}</button>
                                                    <input type="checkbox" name="aninumasType" id="check" class="mr-3 ml-2"   value="1"> <label for="check" class="mb-0 pb-0">{{__('Anonymous Donation')}}</label>
                                                   </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="recent-causes-widget">
                    <h4 class="title">
                        {{ __('Latest Campaign') }}
                    </h4>
                    <span class="separator"></span>
                    <ul class="post-list">
                        @foreach ($latesData as $key => $data)
                        @if(Carbon\Carbon::now() < Carbon\Carbon::parse($data->end_date) && $data->end_after == 'date')

                            <a href="{{ route('front.campaign.show',$data->slug) }}">
                                <li>
                                    <div class="post">
                                        <div class="post-img">
                                            <img src="{{ asset('assets/images/campaign/'.$data->photo) }}" alt="">
                                        </div>
                                        <div class="post-details">
                                            <h4 class="post-title">
                                                {{ $data->campaign_name }}
                                                <p class="time-left">
                                                    - ({{ $data->end_date  }})
                                                </p>
                                            </h4>



                                            <div class="progress-area">
                                                <div class="persentage">
                                                    {{ round($data->donation->sum('donation_amount') / $data->goal * 100, 2) > 100.00  ? '100' : round($data->donation->sum('donation_amount') / $data->goal * 100, 2) }}%
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar  p-1"
                                                        style="width:{{ ($data->donation->sum('donation_amount') / $data->goal * 100) }}%"
                                                        role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </a>
                            @elseif($data->goal > $data->available_fund && $data->end_after == 'goal')
                            <a href="{{ route('front.campaign.show',$data->slug) }}">
                                <li>
                                    <div class="post">
                                        <div class="post-img">
                                            <img src="{{ asset('assets/images/campaign/'.$data->photo) }}" alt="">
                                        </div>
                                        <div class="post-details">

                                            <h4 class="post-title">
                                                {{ $data->campaign_name }}
                                                <p class="time-left">
                                                   - ({{ $data->end_date  }})
                                                </p>
                                            </h4>



                                            <div class="progress-area">
                                                <div class="persentage">
                                                    {{ round($data->donation->sum('donation_amount') / $data->goal * 100, 2) > 100.00  ? '100' : round($data->donation->sum('donation_amount') / $data->goal * 100, 2) }}%
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar  p-1"
                                                        style="width:{{ ($data->donation->sum('donation_amount') / $data->goal * 100) }}%"
                                                        role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </a>

                            @endif

                            @endforeach
                    </ul>
                </div>
                <div class="categori-widget">
                    <h4 class="title">{{ __('Categories') }}</h4>
                    <span class="separator"></span>
                    <ul class="categori-list">
                        @foreach ($categorys as $item)
                        @php
                        $count = 0;
                        foreach ($item->campaigns->where('status','open')->where('is_panding',1) as $key => $value) {
                        if($value->goal > $value->available_fund && $value->end_after == 'goal'){
                        $count++;
                        }elseif(Carbon\Carbon::now() < Carbon\Carbon::parse($value->end_date) && $value->end_after ==
                            'date'){
                            $count++;
                            }
                        }
                        @endphp
                        @if($count != 0)
                        <li>
                            <a href="{{ route('front.campaign.category',$item->slug) }}" {!! $item->slug == Request::route('slug') ?
                                'class="active"':'' !!} >
                                <span>{{ $item->name }}</span>
                                <span>({{ $count }})</span>
                            </a>
                        </li>
                        @endif

                        @endforeach


                    </ul>
                </div>
                <div class="tags-widget">
                    <h4 class="title">{{ __('Tags') }}</h4>
                    <span class="separator"></span>
                    <ul class="tags-list">

                        @foreach($tags as $tag)
                        @if ($tag)
                        <li>
                            <a href="{{ route('front.campaign.slug',$tag) }}">{{ $tag }} </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Causes Area End -->

@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('assets/front/js/payvalid.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/front/js/paymin.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/front/js/payform.js') }}"></script>

<script src="https://js.paystack.co/v1/inline.js"></script>

<script src="//voguepay.com/js/voguepay.js"></script>

<script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>



<script>

    $('#method').on('change',function(){
    var val  = $(this).find(':selected').attr('data-val');
    var form = $(this).find(':selected').attr('data-form');
    var show = $(this).find(':selected').attr('data-show');
    var href = $(this).find(':selected').attr('data-href');


    if(show == "yes"){
        $('#payments').removeClass('d-none');
    }else{
        $('#payments').addClass('d-none');
    }

    if(val == 'paystack'){
        $('.pay-form').prop('id','paystack');
		$('.preloaded_amountValue').prop('name','amount');
        }

		else if(val == 'voguepay'){
        $('.preloaded_amountValue').prop('name','amount');
		$('.pay-form').prop('id','voguepay');
		}
		else if(val == 'mercadopago'){
			$('.pay-form').prop('id','mercadopago');
        }

		else if(val == '2checkout'){
			$('.pay-form').prop('id','twocheckout');

        }

		else {
	        $('.pay-form').prop('id','deposit-form');
		}


    $('#payments').load(href);
    $('.pay-form').attr('action',form);
});

$(document).on('submit','#paystack',function(){
            var val = $('#sub').val();
            if(val == 0){
                var total = $('.preloaded_amountValue').val();
                var curr =  $('#currency_name').val();
                total = Math.round(total);
                var handler = PaystackPop.setup({
                key: '{{ $paystack['key']}}',
                email: 'abc@gmail.com',
                amount: total * 100,
                currency: curr,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1),
                    callback: function(response){
                        $('#ref_id').val(response.reference);
                        $('#sub').val('1');
                        $('#final-btn').click();
                    },
                    onClose: function(){
                        window.location.reload();
                    }
                });
                handler.openIframe();
                 return false;

            }
            else {
                return true;
            }
		});

        $(document).on('submit','#voguepay',function(e){
            var val = $('#sub').val();
            if(val == 0)
            {
                var total = $('.preloaded_amountValue').val();
                var curr =  $('#currency_name').val();
                e.preventDefault();
                Voguepay.init({
                    v_merchant_id: '{{ $voguepay["merchant_id"] }}',
                    total: total,
                    cur: curr,
                    merchant_ref: 'ref'+Math.floor((Math.random() * 1000000000) + 1),
                    memo:'{{ $gs->title }} Order',
                    developer_code: '{{ $voguepay["developer_code"] }}',
                    store_id:'{{ Auth::user() ? Auth::user()->id : 0 }}',
                    closed:function(){
                        var newval = $('#sub').val();
                        if(newval == 0){
                            window.location.reload();
                        }
                        else {
                            $('#final-btn').click();
                        }
                    },
                    success:function(transaction_id){
                        $('#ref_id').val(transaction_id);
                        $('#sub').val('1');
                    },
                    failed:function(){
                        window.location.reload();
                    }
                });
                return false;
            }
            else {
                return true;
            }
		});
</script>
@endsection
