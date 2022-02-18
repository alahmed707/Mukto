@extends('layouts.front')

@section('content')
<section class="hero-area" style="background: url({{ $page_data->homepage_photo ?  asset('assets/images/home-background/'.$page_data->homepage_photo): asset('assets/front/images/hero-bg.png') }});">
@include('includes.form-success');
<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="content">
					<h5 class="sub-title">
						{{ $page_data->homepage_subtitle }}
					</h5>
					<h1 class="title">
						{{ $page_data->homepage_title }}
					</h1>
					<p class="text">
						{{ $page_data->homepage_descriptin }}
					</p>
					<div class="links-area">
						@if ($page_data->homepage_link1)
						<a class="link left" href="{{ $page_data->homepage_link1 }}">{{ $page_data->homepage_button1 }}</a>
						@endif
						@if ($page_data->homepage_link2)
						<a class="link left" href="{{ $page_data->homepage_link2 }}">{{ $page_data->homepage_button2 }}</a>
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Hero Area End -->


@if ($ps->ccounter == 1)
<!-- Statistics Area Start -->
<section class="statistics">
	<div class="container">
		<div class="row align-items-center">
            <div class="col-lg-6">
				<div class="video-area">
					<img class="video-bg" src="{{ asset('assets/images/'. $ps->counter_image) }}" alt="">
					<div class="video-button">
						<a href="{!! $pagesettings->counter_video_link  !!}" class="video-play-btn mfp-iframe">
							<i class="fas fa-play"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="section-heading">
					<div class="sub-title">
						{!! $pagesettings->counter_subtitle !!}
					</div>
					<h4 class="section-title">
						{!! $pagesettings->counter_title !!}
					</h4>
				</div>
				<div class="row">
					@foreach ($homeCounterData as $counter)
					<div class="col-sm-6">
						<div class="single-statistics-box">
							<div class="left">
								<img src="{{ asset('assets/images/counter/'.$counter->photo) }}" alt="">
							</div>
							<div class="right">
								<h4 class="num">
									{{ $counter->counter }}
								</h4>
								<p class="title">
									{{ $counter->text }}
								</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>

		</div>
	</div>
</section>
<!-- Statistics Area End -->
@endif
@if ($ps->cservice == 1)
	<!-- About Area Start -->
<section class="about-area">
	<div class="container">
		<div class="row">
			@foreach ($servicesData  as $service)
			<div class="col-lg-xl col-md-6">
				<div class="single-info-box">
					<div class="icon">
                        <img src="{{asset('assets/images/services/'.$service->photo)  }}" alt="">
					</div>
					<div class="content">
                        <h4 class="title">
                            {{ $service->title }}
                        </h4>
                        <p class="text">
                            {!! $service->details !!}
                        </p>
                    </div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<!-- About Area Start -->
@endif

<!-- Counter Area Start -->
<section class="counter-area">
    <div class="container">
        <div class="row">
            @foreach ($homeCounterData as $counter)
            <div class="col-lg-3 col-md-6">
                <div class="single-counter text-center"  >
                    <div class="counter-icon mb-25">
                        <img src="{{asset('assets/images/counter/'.$counter->photo)  }}" alt="">
                    </div>
                    <div class="counter-text">
                        <h3><span class="counter">{{ $counter->counter }}</span>k+</h3>
                        <p>{{ $counter->text }}</p>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>
<!-- Counter Area End -->


@if ($ps->cfeature == 1)
	<!-- Causes Area Start -->
<section class="causes feature-causes">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-heading text-center">
					<p class="sub-title">
						{!! $pagesettings->service_subtitle !!}
					</p>
					<h4 class="section-title">
						{!! $pagesettings->service_title !!}
					</h4>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="featured-causes-slider-two">
                    @foreach ($CampaignDatas as $CampaignData)
                        @if(Carbon\Carbon::now() <  Carbon\Carbon::parse($CampaignData->end_date) && $CampaignData->end_after == 'date')
                        <div class="slider-item">
                            <a href="{{ route('front.campaign.show',$CampaignData->slug) }}" class="item">
                                <div class="single-causes">
                                    <div class="img">
                                        <img src="{{ asset('assets/images/campaign/'.$CampaignData->photo) }}" alt="">
                                    </div>
                                    <div class="content">
                                        <span data-href="{{ route('front.campaign.donet',$CampaignData->slug) }}" class="mybtn1 donateBtn">{{ __('Donate Now') }}</span>
                                        <h4 class="title">
                                            {{ $CampaignData->campaign_name }}
                                        </h4>
                                        <p class="text">
                                            {{substr(strip_tags($CampaignData->description),0,100)}}
                                        </p>

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
                                                    {{ __('Goal') }} : <span>{{ $currencies->sign }} {{ round($CampaignData->goal * $currencies->value ,2) }} </span>
                                                </div>
                                            </div>


                                    </div>
                                </div>
                            </a>
                        </div>
                        @elseif($CampaignData->goal > $CampaignData->available_fund && $CampaignData->end_after == 'goal')
                        <div class="slider-item">
                            <a href="{{ route('front.campaign.show',$CampaignData->slug) }}" class="item">
                                <div class="single-causes">
                                    <div class="img">
                                        <img src="{{ asset('assets/images/campaign/'.$CampaignData->photo) }}" alt="">
                                    </div>
                                    <div class="content">
                                        <span data-href="{{ route('front.campaign.donet',$CampaignData->slug) }}" class="mybtn1 donateBtn">{{ __('Donate Now') }}</span>
                                        <h4 class="title">
                                            {{ $CampaignData->campaign_name }}
                                        </h4>
                                        <p class="text">
                                            {{substr(strip_tags($CampaignData->description),0,100)}}
                                        </p>

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
                                                    {{ __('Goal') }} : <span>{{ $currencies->sign }} {{ round($CampaignData->goal * $currencies->value ,2) }} </span>
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
		</div>
	</div>
</section>
<!-- Causes Area End -->
@endif
@if ($ps->cfeature == 1)
	<!-- Causes Area Start -->
<section class="causes bg-gray">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-heading text-center">
					<p class="sub-title">
						{!! $pagesettings->service_subtitle !!}
					</p>
					<h4 class="section-title">
						{{ __('Latest Campain') }}
					</h4>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="featured-causes-slider">
                    @foreach ($CampaignDatas as $CampaignData)
                        @if(Carbon\Carbon::now() <  Carbon\Carbon::parse($CampaignData->end_date) && $CampaignData->end_after == 'date')
                        <div class="slider-item">
                        <a href="{{ route('front.campaign.show',$CampaignData->slug) }}" class="item">
                            <div class="single-causes">
                                <div class="img">
                                    <img src="{{ asset('assets/images/campaign/'.$CampaignData->photo) }}" alt="">
                                </div>
                                <div class="content">
                                    <span data-href="{{ route('front.campaign.donet',$CampaignData->slug) }}" class="mybtn1 donateBtn">{{ __('Donate Now') }}</span>
                                    <h4 class="title">
                                        {{ $CampaignData->campaign_name }}
                                    </h4>
                                    <p class="text">
                                        {{substr(strip_tags($CampaignData->description),0,100)}}
                                    </p>

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
                                                {{ __('Goal') }} : <span>{{ $currencies->sign }} {{ round($CampaignData->goal * $currencies->value ,2) }} </span>
                                            </div>
                                        </div>


                                </div>
                            </div>
                        </a>
                        </div>
                        @elseif($CampaignData->goal > $CampaignData->available_fund && $CampaignData->end_after == 'goal')
                        <div class="slider-item">
                            <a href="{{ route('front.campaign.show',$CampaignData->slug) }}" class="item">
                                <div class="single-causes">
                                    <div class="img">
                                        <img src="{{ asset('assets/images/campaign/'.$CampaignData->photo) }}" alt="">
                                    </div>
                                    <div class="content">
                                        <span data-href="{{ route('front.campaign.donet',$CampaignData->slug) }}" class="mybtn1 donateBtn">{{ __('Donate Now') }}</span>
                                        <h4 class="title">
                                            {{ $CampaignData->campaign_name }}
                                        </h4>
                                        <p class="text">
                                            {{substr(strip_tags($CampaignData->description),0,100)}}
                                        </p>

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
                                                    {{ __('Goal') }} : <span>{{ $currencies->sign }} {{ round($CampaignData->goal * $currencies->value ,2) }} </span>
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
		</div>
	</div>
</section>
<!-- Causes Area End -->
@endif


@if ($ps->ccallback==1)
	<!-- Request Area Start -->
<section class="request-to-call">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="section-heading">
					<div class="sub-title">
						{{ $pagesettings->callback_subtitle }}
					</div>
					<h2 class="section-title">
						{{ $pagesettings->callback_title }}
					</h2>
				</div>
				<div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
				<form action="{{route('front.callback.store')}}" class="request-form" id="CallbackFrom" method="POST">
					@include('includes.admin.form-both')

					<div class="row">
						<div class="col-lg-12">
						<input type="text" placeholder='{{ __('Enter Your Full Name') }}' name="name" value="{{ Request::old('name') }}">
						</div>
					</div>
					@csrf
					<div class="row">
						<div class="col-lg-6">
						<input type="text" placeholder="{{ __('Phone Number') }}" name="phone" id="phone" value="{{ Request::old('phone')}}">
						</div>
						<div class="col-lg-6">
							<input type="text" placeholder="{{ __('Enter Your Email Address') }}" id="email" name="email" {{ Request::old('email') }}>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<textarea name="message" id="message" class="input-field textarea" {{ Request::old('message') }} placeholder="{{ __('What kind of help you need') }}"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<button type="submit" class="mybtn1 submit-btn">{{ __('Send To Us') }} </button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-6">
				<div class="right-area">
					<img src="{{ $pagesettings->callback_image1 ? asset('assets/images/'.$pagesettings->callback_image1):asset('assets/images/noimage.png') }}" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Request Area End -->
@endif

@if ($ps->cteam == 1)
	<!-- Team Area Start -->
<section class="team">
	<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-heading text-center">
						<div class="sub-title">
							{!! $pagesettings->team_subtitle !!}
						</div>
						<h2 class="section-title">
							{!! $pagesettings->team_title !!}
						</h2>
					</div>
				</div>
			</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="team-slider">
					@foreach ($memberData as $member)
					<div class="team-member">
						<div class="bg-color">
							<div class="t-img">
									<img src="{{ asset('assets/images/member/'.$member->photo) }}" alt="">

							</div>
                            <div class="content">
                                <p class="name">
                                    <span>{{ $member->title }}</span>

                                    <small>{{ $member->subtitle }}</small>

                                </p>
                                <ul class="social-links">
                                    <li>
                                        <a href="{{ $member->facebook }}">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $member->twitter }}">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $member->linkedin }}">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Team Area End -->
@endif

@if ($ps->cportfolio ==1)
	<!-- Testimonial Area Start -->
<section class="testimonial">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-heading text-center">
					<div class="sub-title">
						{!! $pagesettings->portfolio_subtitle !!}
					</div>
					<h2 class="section-title">
							{!! $pagesettings->portfolio_title !!}
					</h2>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="testimonial-slider">
					@foreach ($protfolioData as $protfolio)
					<div class="slider-item">
                        <a href="{{route('front.project',$protfolio->title)}}" class="single-testimonial">
                            <div class="people">
                                <div class="img">
                                        <img src="{{ asset('assets/images/portfolio/'.$protfolio->photo) }}" alt="">
                                </div>
                            </div>
                            <div class="review-text">
                                <p>
                                    {{ $protfolio->details }}
                                </p>
                            </div>
                            <div class="people">
                                <h4 class="title">{{ $protfolio->title }}</h4>
                                <p class="designation">{{ $protfolio->subtitle }}</p>
                            </div>

                        </a>
                    </div>
						@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Testimonial Area End -->
@endif

@if ($ps->cdonate ==1)
	<!-- Donate Area Start -->
	<div class="donate">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
							<div>
                                <h4 class="title">
                                    {{ $pagesettings->donate_title }}
                                </h4>

                                <p class="text-white">{{ $pagesettings->donate_subtitle }}</p>
                            </div>
							<div class="donet-btn-area">
									<a href="{{$pagesettings->donate_link1}}" class="mybtn1">{{ $pagesettings->donate_button_text }}</a>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Donate Area End -->
@endif

@if ($ps->cnews == 1)
	<!-- Blog Area Start -->
<section class="blog">
	<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-heading text-center">
						<div class="sub-title">
							{!! $pagesettings->blog_subtitle !!}
						</div>
						<h2 class="section-title">
							{!! $pagesettings->blog_title !!}
						</h2>
					</div>
				</div>
			</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="blog-slider">
					@foreach ($blogData as $blog)
					<div class="single-blog">
						<div class="img">
							<img src="{{  $blog->photo ? asset('assets/images/blogs/'.$blog->photo):asset('assets/images/noimage.png') }}" alt="">
						</div>
						<div class="content">
                            <div class="inner-content">
                              <div class="i-i-c">
                                    <a href="{{route('front.blog.show',$blog->slug)}}">
                                        <h4 class="blog-title">
                                            {{strlen($blog->title) > 200 ? substr($blog->title,0,200)."...":$blog->title}}
                                            </h4>
                                    </a>
                                    <div class="text">
                                        <p>
                                            {{substr(strip_tags($blog->details),0,100)}}
                                        </p>
                                    </div>
                              </div>
                            </div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

@endif
@endsection
