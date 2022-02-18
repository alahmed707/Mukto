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
          {{ __('Blog') }}
        </h1>
        <ul class="pages">
          <li>
            <a href="{{ route('front.index') }}">
              {{ __('Home') }}
            </a>
          </li>
          <li class="active">
            <a href="{{ route('front.blog') }}">
               {{__('Blog')}}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Blog Area Start -->
<section class="blog-page">
  <div class="container">
      <div class="row">
          @forelse($blogs as $blog)
          <div class="col-lg-6 col-md-6">
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
                                    {{substr(strip_tags($blog->details),0,70)}}
                                </p>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>

          @empty
          <div class="page-center">
              <h3 class="text-center"> {{ __('No Post Found') }}</h3>
          </div>
          @endforelse
      </div>

      <div class="page-center">
          @if(isset($_GET['search']))
            {{ $blogs->appends(['search' => $_GET['search']])->links() }}
          @else
            {{ $blogs->links() }}
          @endif
      </div>
  </div>
  </div>
</section>
@endsection
