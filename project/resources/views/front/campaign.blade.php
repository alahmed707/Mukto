@extends('layouts.front')
@section('content')
<!-- Breadcrumb Area Start -->

<div class="breadcrumb-area" style="background: url({{$gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner) : '' }});">
    <div class="overlay"></div>
        <div class="container">
            <div class="row">
                @if(isset($_GET['search']))
                <div class="col-lg-12">
                    <h1 class="pagetitle">
                        {{ __('Search For :') }} {{ $_GET['search'] }}
                    </h1>
                    <ul class="pages">
                        <li>
                            <a href="{{ route('front.index') }}">
                                {{__('Home')}}
                            </a>
                        </li>
                        <li class="active">
                            <a href="javascript:;">
                                {{ __('Search') }}
                            </a>
                        </li>
                    </ul>
                </div>
                @else

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
                        <li class="active">
                            <a href="{{ route('front.campaign') }}">
                                {{ __('Campaign') }}
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Causes Area Start -->
<section class="causes-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                    @php
                    $count = 0;
                    @endphp
                    @foreach ($datas as $key => $data)
                        @if(Carbon\Carbon::now() < Carbon\Carbon::parse($data->end_date) && $data->end_after == 'date')
                            @php
                            $count =1;
                        @endphp

                <div class="col-md-6">
                    <a href="{{ route('front.campaign.show',$data->slug) }}" class="item">
                        <div class="single-causes">
                            <div class="img">
                                <img src="{{ asset('assets/images/campaign/'.$data->photo) }}" alt="">
                            </div>
                            <div class="content">
                                <span data-href="{{ route('front.campaign.donet',$data->slug) }}" class="mybtn1 donateBtn">{{ __('Donate Now') }}</span>
                                <h4 class="title">
                                    {{ $data->campaign_name }}
                                </h4>
                                <p class="text">
                                    {{substr(strip_tags($data->description),0,100)}}
                                </p>

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


                            </div>
                        </div>
                    </a>
                </div>

            @elseif($data->goal > $data->available_fund && $data->end_after == 'goal')
                @php
                $count = 1;
                @endphp
                <div class="col-md-6">
                    <a href="{{ route('front.campaign.show',$data->slug) }}" class="item">
                        <div class="single-causes">
                            <div class="img">
                                <img src="{{ asset('assets/images/campaign/'.$data->photo) }}" alt="">
                            </div>
                            <div class="content">
                                <span data-href="{{ route('front.campaign.donet',$data->slug) }}" class="mybtn1 donateBtn">{{ __('Donate Now') }}</span>
                                <h4 class="title">
                                    {{ $data->campaign_name }}
                                </h4>
                                <p class="text">
                                    {{substr(strip_tags($data->description),0,100)}}
                                </p>

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


                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach

@if($count == 0)
<section class="causes-details-page">
    <div class="container">
        <div class="row">
            <div class="">
                <h2 class="text-center">{{ __('No Campaign Found') }}</h2>
            </div>
        </div>
    </div>
</section>
@endif
</div>


<div class="page-center">
    @if(isset($_GET['search']))
      {{ $datas->appends(['search' => $_GET['search']])->links() }}
    @else
      {{ $datas->links() }}
    @endif
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
                <a href="{{ route('front.campaign.slug',$tag) }}" {!! $tag==Request::route('slug') ? 'class="active"'
                    :'' !!}>{{ $tag }} </a>
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
