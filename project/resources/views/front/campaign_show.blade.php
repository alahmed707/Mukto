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
                    {{ __('Campaign') }}
                </h1>
                <ul class="pages">
                    <li>
                        <a href="{{ route('front.index') }}">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('front.campaign') }}">
                            {{ __('Campaign') }}
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('front.campaign.show',$data->slug) }}">
                            {{ __('Campaign Details') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Causes Area Start -->

@if($data->meta_tag != null || $data->meta_description != null)
@section('meta_content')
<meta property="og:title" content="{{$data->campaign_name}}" />
<meta property="og:description" content="{{ $data->meta_description != null ? $data->meta_description : strip_tags($data->meta_description) }}" />
<meta property="og:image" content="{{asset('assets/images/campaign'.$data->photo)}}" />
<meta name="keywords" content="{{ $data->meta_tag }}">
<meta name="description" content="{{ $data->meta_description }}">
@endsection
@endif

<section class="causes-details-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="single-causes details">
                            <div class="img">
                                <img src="{{ asset('assets/images/campaign/'.$data->photo) }}" alt="">
                            </div>
                            <div class="content">

                                <div class="top-box-wrapper">
                                    <div class="t-b-inner">
                                        <h4 class="title">
                                            {{ $data->campaign_name }}
                                            <a href="{!! $data->video_link  !!}" class="video-play-btn2 mfp-iframe">
                                                <i class="fas fa-play"></i>
                                            </a>
                                            </h4>

                                            <ul class="top-meta-2">
                                                <li>
                                                    <p>
                                                        @php
                                                        $date =  Carbon\Carbon::parse($data->end_date)
                                                        @endphp
                                                        {{ __('Remaining time') }}: <span>{{ $date->diffForHumans(Carbon\Carbon::now()) }}</span>
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        {{ __('Donor(s)') }}: <span>{{ $data->donation->count() }}</span>
                                                    </p>
                                                </li>
                                                @if ($data->benefits)
                                                <li>
                                                    <p>
                                                        {{ __('People Benefits') }}: <span>{{ $data->benefits }}</span>
                                                    </p>
                                                </li>
                                                @endif
                                                @if ($data->location)
                                                <li>
                                                    <p>
                                                        {{ __('Location') }}: <span>{{ $data->location }}</span>
                                                    </p>
                                                </li>
                                                @endif
                                            </ul>
                                            <div class="progress-area">
                                                <div class="persentage">
                                                    <span>{{ round($data->donation->sum('donation_amount') / $data->goal * 100, 2) > 100.00  ? '100' : round($data->donation->sum('donation_amount') / $data->goal * 100, 2) }}%</span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar  p-1" style="width:{{ ($data->donation->sum('donation_amount') / $data->goal * 100) }}%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="top-meta mt-3">
                                                <div class="left">
                                                        {{ __('Raised') }}: <span>{{ $currencies->sign }} {{ round($data->donation->sum('donation_amount') * $currencies->value ,2) }}</span>
                                                </div>
                                                <div class="right">
                                                    {{ __('Goal') }} : <span>{{ $currencies->sign }} {{ round($data->goal * $currencies->value ,2) }} </span>
                                                </div>
                                            </div>
                                            <div class="makea-donation shadow-none">
                                                <div class="content p-0 mt-4">
                                                    @if ($data->preloaded_amount)
                                                    @php
                                                        $preamount = explode(',',$data->preloaded_amount);
                                                        $preamount = count($preamount);

                                                    @endphp
                                                    <ul class="donet-price">
                                                        @foreach (explode(',',$data->preloaded_amount)  as $key=>$item)
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
                                                    @endif
                                            </div>
                                        </div>

                                        <form action="{{ route('front.campaign.donet',$data->slug) }}" method="get" class="mt-3">
                                            <input type="hidden" class="preloaded_amountValue" value="{{Request::old('donation_amount')}}" name="donation_amount">
                                        <button class="mybtn1">{{__('Donate Now')}}</button>
                                        </form>
                                    </div>
                                </div>
                                    <div class="causes-text">
                                        {!! $data->description !!}
                                    </div>


                                    <div class="footer-text social-link a2a_kit a2a_kit_size_32">
                                        <ul class="social-text">
                                            <li>
                                                <a class="facebook a2a_button_facebook" href="">
                                                  <i class="fab fa-facebook-f"></i>
                                                </a>
                                              </li>
                                                <li>
                                                    <a class="twitter a2a_button_twitter" href="">
                                                      <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="linkedin a2a_button_linkedin" href="">
                                                      <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="pinterest a2a_button_pinterest" href="">
                                                      <i class="fab fa-pinterest"></i>
                                                    </a>
                                                </li>
                                                <li>

                                                <a class="a2a_dd plus" href="https://www.addtoany.com/share">
                                                    <i class="fas fa-plus"></i>
                                                  </a>
                                                </li>
                                        </ul>
                                    </div>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($data->category->campaigns()->where('status','open')->take(4)->where('id', '!=',$data->id)->where('is_panding',1)->orderby('id','desc')->get() as $key=> $item)
                    @if(Carbon\Carbon::now() <  Carbon\Carbon::parse($item->end_date) && $item->end_after == 'date')
                    @php
                        $count = 1;
                    @endphp
                    <div class="col-md-6">
                        <a href="{{ route('front.campaign.show',$item->slug) }}" class="item">
                            <div class="single-causes">
                                <div class="img">
                                    <img src="{{ asset('assets/images/campaign/'.$item->photo) }}" alt="">
                                </div>
                                <div class="content">
                                    <span data-href="{{ route('front.campaign.donet',$item->slug) }}" class="mybtn1 donateBtn">{{ __('Donate Now') }}</span>
                                    <h4 class="title">
                                        {{ $item->campaign_name }}
                                    </h4>
                                    <p class="text">
                                        {{substr(strip_tags($item->description),0,100)}}
                                    </p>

                                        <div class="progress-area">
                                            <div class="persentage">
                                                <span>{{ round($item->donation->sum('donation_amount') / $item->goal * 100, 2) > 100.00  ? '100' : round($item->donation->sum('donation_amount') / $item->goal * 100, 2) }}%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar  p-1" style="width:{{ ($item->donation->sum('donation_amount') / $item->goal * 100) }}%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="top-meta mt-3">
                                            <div class="left">
                                                    {{ __('Raised') }}: <span>{{ $currencies->sign }} {{ round($item->donation->sum('donation_amount') * $currencies->value ,2) }}</span>
                                            </div>
                                            <div class="right">
                                                {{ __('Goal') }} : <span>{{ $currencies->sign }} {{ round($item->goal * $currencies->value ,2) }} </span>
                                            </div>
                                        </div>


                                </div>
                            </div>
                        </a>
                    </div>

                    @elseif($item->goal > $item->available_fund && $item->end_after == 'goal')
                    @php
                        $count = 1;
                    @endphp
                        <div class="col-md-6">
                            <a href="{{ route('front.campaign.show',$item->slug) }}" class="item">
                                <div class="single-causes">
                                    <div class="img">
                                        <img src="{{ asset('assets/images/campaign/'.$item->photo) }}" alt="">
                                    </div>
                                    <div class="content">
                                        <span data-href="{{ route('front.campaign.donet',$item->slug) }}" class="mybtn1 donateBtn">{{ __('Donate Now') }}</span>
                                        <h4 class="title">
                                            {{ $item->campaign_name }}
                                        </h4>
                                        <p class="text">
                                            {{substr(strip_tags($item->description),0,100)}}
                                        </p>

                                            <div class="progress-area">
                                                <div class="persentage">
                                                    <span>{{ round($item->donation->sum('donation_amount') / $item->goal * 100, 2) > 100.00  ? '100' : round($item->donation->sum('donation_amount') / $item->goal * 100, 2) }}%</span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar  p-1" style="width:{{ ($item->donation->sum('donation_amount') / $item->goal * 100) }}%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="top-meta mt-3">
                                                <div class="left">
                                                        {{ __('Raised') }}: <span>{{ $currencies->sign }} {{ round($item->donation->sum('donation_amount') * $currencies->value ,2) }}</span>
                                                </div>
                                                <div class="right">
                                                    {{ __('Goal') }} : <span>{{ $currencies->sign }} {{ round($item->goal * $currencies->value ,2) }} </span>
                                                </div>
                                            </div>


                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif


                    @endforeach
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
                            @if($count == 0)
                            <li>
                                <div class="post">
                                    <div class="post-details">
                                        <h4 class="post-title text-center">
                                            {{__('No Campaign')}}
                                        </h4>
                                    </div>
                                </div>
                            </li>
                            @endif
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
