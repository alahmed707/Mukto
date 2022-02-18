
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="{{App\Models\Seotool::findOrFail(1)->meta_keys}}">
	@yield('meta_content')
	<title> {{ $gs->title }}</title>
	<!-- favicon -->
	<link rel="shortcut icon" href="{{ asset('assets/images/'.$gs->favicon) }}" type="image/x-icon">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
	<!-- Plugin css -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/plugin.css') }}">
	<link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.structure.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/front/jquery-ui/jquery-ui.theme.min.css')}}">

	<link rel="stylesheet" href="{{ asset('assets/front/css/pignose.calender.css') }}">
	<!-- stylesheet -->
	{{-- custom Style --}}
	<link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors).'&'.'secendary_color='.str_replace('#','',$gs->secendary_color)) }}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}">

	@if(!empty($seo->google_analytics))
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() {
				dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', '{{ $seo->google_analytics }}');
	</script>
	@endif

	@if(!empty($seo->facebook_pixel))
	    <script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window, document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '{{ $seo->facebook_pixel }}');
			fbq('track', 'PageView');
		  </script>
		  <noscript>
			<img height="1" width="1" style="display:none"
				 src="https://www.facebook.com/tr?id={{ $seo->facebook_pixel }}&ev=PageView&noscript=1"/>
		  </noscript>
	@endif

	@yield('styles')
</head>

<body>
	<!-- preloader area start -->
	@if($gs->is_loader == 1)
	<div class="preloader" id="preloader" style="background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;"></div>
	@endif
	<!-- preloader area end -->

	<!--Main-Menu Area Start-->
	<div class="mainmenu-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="{{ route('front.index') }}">
							<img src="{{ asset('assets/images/'.$gs->logo) }}" alt="logo">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse fixed-height" id="main_menu">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link {{ url()->current() == route('front.index') ? 'active' : ''  }}" href="{{ route('front.index') }}">{{ __('Home') }}</a>
								</li>

								<li class="nav-item">
									<li class="nav-item dropdown">
										<a class="nav-link {{ url()->current() == route('front.campaign') ? 'active' : ''  }}" href="{{route('front.campaign')}}">
																{{ __('Campaigns') }}
															</a>
										<ul class="dropdown-menu">
											@foreach (App\Models\Category::where('status',1)->get() as $item) @php $count = 0; foreach ($item->campaigns->where('status','open')->where('is_panding',1) as $key => $value) { $count++; } @endphp @if($count != 0)
											<li>
												<a class="dropdown-item {{ url()->current() == route('front.campaign.category',$item->slug) ? 'active' : ''  }}" href="{{ route('front.campaign.category',$item->slug) }}"> <i class="fa fa-angle-double-right"></i>{{ $item->name }}</a>
											</li>

											@endif

											@endforeach

										</ul>
									</li>
								</li>

								<li class="nav-item">
									<li class="nav-item dropdown">
										<a class="nav-link {{ url()->current() == route('front.blog') ? 'active' : ''  }}" href="{{route('front.blog')}}">
																{{ __('Blog') }}
															</a>
										<ul class="dropdown-menu">
											@foreach (App\Models\BlogCategory::where('status',1)->get() as $cat) @if($cat->blogs()->count() != 0)
											<li>
												<a class="dropdown-item {{ url()->current() == route('front.blogcategory',$cat->slug) ? 'active' : ''  }}" href="{{ route('front.blogcategory',$cat->slug) }}"> <i class="fa fa-angle-double-right"></i>{{ $cat->name }}</a>
											</li>
											@endif @endforeach
										</ul>
									</li>
								</li>

								@if($gs->is_pages == 1) @if(DB::table('pages')->count() > 0)
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	{{ __('Pages') }}
																</a>
									<ul class="dropdown-menu">
									    <li>
											<a class="dropdown-item {{ url()->current() == route('front.faq') ? 'active' : ''  }}" href="{{ route('front.faq') }}"> <i class="fa fa-angle-double-right"></i>{{ __('FAQ') }}</a>
										</li>
										@foreach(DB::table('pages')->orderBy('id','desc')->get() as $data)
										<li>
											<a class="dropdown-item {{ url()->current() == route('front.page',$data->slug) ? 'active' : ''  }}" href="{{ route('front.page',$data->slug) }}"> <i class="fa fa-angle-double-right"></i>{{ $data->title }}</a>
										</li>
										@endforeach
									</ul>
								</li>
								@endif @endif

								<li class="nav-item">
									<a class="nav-link {{ url()->current() == route('front.contact') ? 'active' : ''  }}" href="{{ route('front.contact') }}">{{ __('Contact') }}   </a>
								</li>

								@if (Auth::check())
								<li class="nav-item dropdown">
									<div class="user-image-wrapper">
										<img class="user-img" src="{{ Auth::user()->photo ? asset('assets/images/users/'.Auth::user()->photo):asset('assets/images/noimage.png') }}" alt="">
										<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														{{ __('My Account') }}</a>
										<ul class="dropdown-menu">
											<li>
												<a class="dropdown-item {{ url()->current() == route('user-dashboard') ? 'active' : ''  }}" href="{{ route('user-dashboard') }}"> <i class="fa fa-angle-double-right"></i> {{ __("Dashboard") }}</a>
											</li>
											<li>
												<a class="dropdown-item {{ url()->current() == route('user-profile') ? 'active' : ''  }}" href="{{ route('user-profile') }}"> <i class="fa fa-angle-double-right"></i>{{ __("Profile") }}</a>
											</li>
											<li>
												<a class="dropdown-item {{ url()->current() == route('user-reset') ? 'active' : ''  }}" href="{{ route('user-reset') }}"> <i class="fa fa-angle-double-right"></i>{{ __('Change Password') }}</a>
											</li>
											<li>
												<a class="dropdown-item {{ url()->current() == route('user-logout') ? 'active' : ''  }}" href="{{ route('user-logout') }}"> <i class="fa fa-angle-double-right"></i></i>{{ __('Logout') }}</a>
											</li>
										</ul>
									</div>

								</li>

								@else
								<li class="nav-item">
									<a class="nav-link  log-reg-btn{{ url()->current() == route('user.login') ? 'active' : ''  }}" href="{{ route('user.login') }}">{{ __('Login / Register') }}</a>
								</li>
								@endif

							

							</ul>
						</div>
						<div class="serch-icon-area">
							<p class="web-serch">
								<i class="fas fa-search"></i>
							</p>
						</div>

						<div class="search-form-area-mobile">
							<div class="form-wrapper">
                                <form class="search-form2" action="{{ route('front.search') }}" method="get">
                                    <input type="text" name="search" required placeholder="{{ __('Search what you want') }}">
                                </form>
                                <div class="close web-serch">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--Main-Menu Area Start-->

	@yield('content')

	<!-- Footer Area Start -->
	<footer class="footer" id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget about-widget">
						<div class="footer-logo">
						<a href="{{route('front.index')}}">
								<img src="{{ asset('assets/images/'.$gs->footer_logo) }}" alt="">
							</a>
						</div>
						<div class="text">
							<p>
								{!! $gs->footer !!}
							</p>
						</div>

					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget address-widget">
						<h4 class="title">
								{{ __('Address') }}
							</h4>
						<ul class="about-info">
							<li>
								<p>
									<i class="fas fa-globe"></i>{!! $pagesettings->street !!}
								</p>
							</li>
							<li>
								<p>
									<i class="fas fa-phone"></i> {!! $pagesettings->phone !!}
								</p>
							</li>
							<li>
								<p>
									<i class="far fa-envelope"></i> {!! $pagesettings->email !!}
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget  footer-newsletter-widget">
						<h4 class="title">
									{{ __('Newsletter') }}
								</h4>
						<div class="newsletter-form-area">
							<form id="subscribeform" action="{{ route('front.subscribe') }}" method="POST">
								{{ csrf_field() }}
								<input type="email" id="subemail" name="email" required="" placeholder="{{ __('Enter Your Email Address') }}">
								<button id="sub-btn" type="submit">
									<i class="far fa-paper-plane"></i>
								</button>
							</form>
						</div>
						<div class="social-links">
							<h4 class="title">
											{{ __("We're social, connect with us:") }}
									</h4>
							<div class="fotter-social-links">
								<ul>
									@if(App\Models\Socialsetting::find(1)->f_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->facebook }}" class="facebook" target="_blank">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									@endif

									@if(App\Models\Socialsetting::find(1)->g_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->gplus }}" class="google-plus" target="_blank">
											<i class="fab fa-google-plus-g"></i>
										</a>
									</li>
									@endif

									@if(App\Models\Socialsetting::find(1)->t_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->twitter }}" class="twitter" target="_blank">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									@endif

									@if(App\Models\Socialsetting::find(1)->l_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->linkedin }}" class="linkedin" target="_blank">
											<i class="fab fa-linkedin-in"></i>
										</a>
									</li>
									@endif

									@if(App\Models\Socialsetting::find(1)->d_status == 1)
									<li>
										<a href="{{ App\Models\Socialsetting::find(1)->dribble }}" class="dribbble" target="_blank">
											<i class="fab fa-dribbble"></i>
										</a>
									</li>
                            		@endif
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="copy-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content">
							<div class="content">
								<p>{!! $gs->copyright !!}

								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Area End -->
	<!-- Back to Top Start -->
	<div class="bottomtotop">
		<i class="fas fa-chevron-right"></i>
	</div>
	<!-- Back to Top End -->


	<script type="text/javascript">
		var mainurl = "{{url('/')}}";
		var gs  = {!! json_encode($gs) !!};

		var lang  = {
          'check': '{{ __('ADD NEW') }}',
          'sss': '{{ __('Success !') }}',
      };
	  </script>

	<!-- jquery -->
	<script src="{{ asset('assets/front/js/jquery.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
	<!-- popper -->
	<script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
	<!-- Moment js -->
	<script src="{{ asset('assets/front/js/moment.min.js') }}"></script>
	<!-- Pignose Calender -->
	<script src="{{ asset('assets/front/js/pignose.calender.js') }}"></script>
	<!-- plugin js-->
	<script src="{{ asset('assets/front/js/plugin.js') }}"></script>
	<!-- main -->
	<script src="{{ asset('assets/front/js/notify.js') }}"></script>
	<script src="{{asset('assets/front/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{ asset('assets/front/js/main.js') }}"></script>
	<script src="{{ asset('assets/front/js/custom.js') }}"></script>

	@yield('scripts')
</body>

</html>
