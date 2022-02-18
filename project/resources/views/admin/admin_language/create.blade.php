@extends('layouts.admin')

@section('content')

<div class="content-area">
  <div class="mr-breadcrumb">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="heading">{{ __('Add Language') }} <a class="add-btn ml-2" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a></h4>
        <ul class="links">
          <li>
            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
          </li>
          <li><a href="javascript:;">{{ __('Language Settings') }}</a></li>
          <li>
            <a href="{{ route('admin-lang-admin-index') }}">{{ __('Admin Panel Language') }}</a>
          </li>
          <li>
            <a href="{{ route('admin-lang-admin-create') }}">{{ __('Add Language') }}</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="add-product-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="product-description">
          <div class="body-area">
            <div class="gocover"
              style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
            </div>
            <form id="geniusform" action="{{route('admin-lang-admin-create')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              @include('includes.admin.form-both')

              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                    <h4 class="heading">{{ __('Language') }} *</h4>
                  </div>
                </div>
                <div class="col-lg-7">
                  <input type="text" class="input-field" name="language" placeholder="{{ __('Language') }}" required=""
                    value="English">
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="left-area">
                      <h4 class="heading">{{ __('Language Direction') }} *</h4>
                      <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                  </div>
                </div>
                <div class="col-lg-7">
                  <select name="rtl" class="input-field" required="">
                    <option value="0">{{ __('Left To Right') }}</option>
                    <option value="1">{{ __('Right To Left') }}</option>
                  </select>
                </div>
              </div>
              <hr>

              <h4 class="text-center">{{ __('SET LANGUAGE KEYS & VALUES') }}</h4>

              <hr>



              <div class="row">
                <div class="col-lg-2">
                  <div class="left-area">

                  </div>
                </div>
                
                          <div class="col-lg-8">
                                  <div class="featured-keyword-area">
                                      <div class="lang-tag-top-filds" id="lang-section">
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Dashboard</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Dashboard</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Panding Campaign!</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Panding Campaign!</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">All Campaign</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">All Campaign</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Total Donation Amount</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Total Donation Amount</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">View All</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">View All</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Total Posts!</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Total Posts!</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Top Referrals</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Top Referrals</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Most Used OS</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Most Used OS</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Main Categories</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Main Categories</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Category</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Category</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Name</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Name</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Slug</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Slug</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Status</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Status</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Options</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Options</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Categories</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Categories</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Category</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Category</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">ADD NEW CATEGORY</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">ADD NEW CATEGORY</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">In Any Language</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">In Any Language</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">In English</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">In English</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Create Category</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Create Category</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Close</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Close</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Name</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Name</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Slug</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Slug</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Category. Everything under this category will be deleted</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Category. Everything under this category will be deleted</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Do you want to proceed?</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Do you want to proceed?</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Confirm Delete</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Confirm Delete</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Cancel</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Cancel</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Delete</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Delete</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Update</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Update</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Edit</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Edit</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">CATEGORY</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">CATEGORY</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Activated</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Activated</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Deactivated</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Deactivated</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Goal</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Goal</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Founded</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Founded</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Dates</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Dates</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaign</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaign</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Campaign</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Campaign</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add Campaign</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add Campaign</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaign Name</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaign Name</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Select Category</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Select Category</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current Featured Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current Featured Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaign Description</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaign Description</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaign Video Link</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaign Video Link</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">End Date</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">End Date</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Success</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Success</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Upload Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Upload Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Prefered Size: (600x600) or Square Sized Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Prefered Size: (600x600) or Square Sized Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Benefits</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Benefits</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Location</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Location</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Preloaded Amount In</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Preloaded Amount In</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Tags</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Tags</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Seperated By Comma</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Seperated By Comma</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Achieving Goal</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Achieving Goal</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add to Featured Campaign</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add to Featured Campaign</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Send NewsLetter to all Subscribers</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Send NewsLetter to all Subscribers</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Close Campaign After</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Close Campaign After</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Create Post</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Create Post</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Update Post</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Update Post</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Edit Campaign</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Edit Campaign</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">View</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">View</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Open</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Open</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Aproved</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Aproved</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Panding</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Panding</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Pending Campaign</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Pending Campaign</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">are you About to change status</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">are you About to change status</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Update Status</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Update Status</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Photo</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Photo</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Video Link</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Video Link</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Preloaded amount</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Preloaded amount</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Featured Allow</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Featured Allow</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Ending Date</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Ending Date</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">View Campaign</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">View Campaign</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Details</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Details</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaign Details</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaign Details</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Donations</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Donations</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Email</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Email</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Phone</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Phone</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Address</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Address</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Amount</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Amount</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Note</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Note</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Date</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Date</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">New Withdraw</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">New Withdraw</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Select Withdraw Method</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Select Withdraw Method</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Amount</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Amount</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Additional Reference(Optional)</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Additional Reference(Optional)</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter IBAN/Account No</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter IBAN/Account No</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Account Name</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Account Name</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Address</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Address</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Swift Code</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Swift Code</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Account Email</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Account Email</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdrow</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdrow</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Paypal</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Paypal</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Skrill</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Skrill</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Payoneer</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Payoneer</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Bank</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Bank</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Customers</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Customers</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Actions</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Actions</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Send</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Send</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Campaign List</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Campaign List</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Back</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Back</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Send Message</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Send Message</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">City</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">City</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Fax</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Fax</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Zip Code</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Zip Code</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Joined</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Joined</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">CUSTOMER</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">CUSTOMER</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Postal Code</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Postal Code</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Customer Profile Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Customer Profile Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Save</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Save</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Customer.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Customer.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Your Message</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Your Message</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Subject</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Subject</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Method</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Method</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Date</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Date</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraws</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraws</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to accept this Withdraw.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to accept this Withdraw.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Accept Withdraw</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Accept Withdraw</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Accept</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Accept</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Reject Withdraw</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Reject Withdraw</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to reject this Withdraw.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to reject this Withdraw.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Reject</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Reject</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">User ID</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">User ID</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">User Name</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">User Name</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Charge</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Charge</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Process Date</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Process Date</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Status</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Status</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">User Email</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">User Email</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">User Phone</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">User Phone</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Method</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Method</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Posts</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Posts</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">INFORMATIONS</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">INFORMATIONS</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">TITLE</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">TITLE</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">SUBTITLE</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">SUBTITLE</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Submit</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Submit</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Featured Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Featured Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Post Title</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Post Title</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Views</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Views</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Post</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Post</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Blog</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Blog</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Category. Everything will be deleted under this Category</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Category. Everything will be deleted under this Category</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Customers List</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Customers List</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">General Settings</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">General Settings</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Home Page Settings</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Home Page Settings</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Menu Page Settings</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Menu Page Settings</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Email Settings</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Email Settings</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Payment Settings</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Payment Settings</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Social Settings</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Social Settings</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Social Links</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Social Links</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Subscribers</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Subscribers</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">SEO Tools</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">SEO Tools</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Language Settings</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Language Settings</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Google Analytics</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Google Analytics</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Website Meta Keywords</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Website Meta Keywords</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Web Site Language</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Web Site Language</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Admin Language</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Admin Language</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Facebook Login</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Facebook Login</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Google Login</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Google Login</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Payment Informations</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Payment Informations</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Currencies</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Currencies</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Email Configurations</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Email Configurations</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Group Email</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Group Email</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">FAQ Page</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">FAQ Page</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Contact Us Page</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Contact Us Page</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Other Pages</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Other Pages</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Page Background</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Page Background</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Welcome Informations</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Welcome Informations</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Services</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Services</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Counter</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Counter</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Feature Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Feature Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Contact Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Contact Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Donate Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Donate Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Call Back Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Call Back Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Call Back Information</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Call Back Information</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Portfolio Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Portfolio Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Team Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Team Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Video Presentation Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Video Presentation Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Review Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Review Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Latest Blog  Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Latest Blog  Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Home Page Customization</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Home Page Customization</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Logo</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Logo</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Favicon</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Favicon</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Loader</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Loader</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Breadcumb Banner</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Breadcumb Banner</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Website Contents</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Website Contents</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Success Messages</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Success Messages</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Footer</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Footer</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Error Page</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Error Page</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Website logo</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Website logo</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Generel Settings</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Generel Settings</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Header Logo</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Header Logo</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Footer Logo</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Footer Logo</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current Logo</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current Logo</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Set New Logo</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Set New Logo</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Website Loader</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Website Loader</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Website Favicon</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Website Favicon</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current Favicon</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current Favicon</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Set New Favicon</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Set New Favicon</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Admin Loader</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Admin Loader</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current Loader</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current Loader</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Set New Loader</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Set New Loader</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current Banner</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current Banner</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Website Title</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Website Title</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Theme Color</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Theme Color</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Tawk.to</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Tawk.to</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Sign Up Verification</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Sign Up Verification</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Tawk.to ID</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Tawk.to ID</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Disqus</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Disqus</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Disqus Website Short Name</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Disqus Website Short Name</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Quotes</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Quotes</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Separated by Comma</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Separated by Comma</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Subscribe Success</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Subscribe Success</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Subscribe Error</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Subscribe Error</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Order Success Title</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Order Success Title</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Order Success Text</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Order Success Text</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Website Footer</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Website Footer</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Footer Text</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Footer Text</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Copyright Text</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Copyright Text</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Title</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Title</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Home Page Background</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Home Page Background</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Sub Title</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Sub Title</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Description</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Description</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Service Icon</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Service Icon</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Button link</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Button link</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Prefered Size: (1900x1080) or Relevant Sized Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Prefered Size: (1900x1080) or Relevant Sized Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Subtitle</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Subtitle</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Service</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Service</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Service</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Service</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">SERVICE</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">SERVICE</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Prefered Size: (400x400) or Square Sized Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Prefered Size: (400x400) or Square Sized Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Background Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Background Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Prefered Size: (850x445) or Square Sized Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Prefered Size: (850x445) or Square Sized Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Text</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Text</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Counter</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Counter</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Counter Icon</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Counter Icon</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">COUNTER</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">COUNTER</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Prefered Size: (80x80) or Square Sized Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Prefered Size: (80x80) or Square Sized Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Counter Number</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Counter Number</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Text</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Text</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Feture.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Feture.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Feature</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Feature</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">FEATURE</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">FEATURE</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Prefered Size: (150x150) or Square Sized Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Prefered Size: (150x150) or Square Sized Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Create Feature</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Create Feature</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Button Text</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Button Text</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Callback Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Callback Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Messge</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Messge</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Call Back Informations</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Call Back Informations</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Portfolio.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Portfolio.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Portfolio</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Portfolio</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">PORTFOLIO</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">PORTFOLIO</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Create Portfolio</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Create Portfolio</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Member.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Member.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Member</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Member</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">MEMBER</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">MEMBER</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Facebook URL</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Facebook URL</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Twitter URL</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Twitter URL</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Linkdedin URL</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Linkdedin URL</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Create Member</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Create Member</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Latest Blog Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Latest Blog Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Service Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Service Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Request Call-Back Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Request Call-Back Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Portfolio section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Portfolio section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Latest Blog/News Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Latest Blog/News Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Counter Section</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Counter Section</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">FAQ</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">FAQ</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Meta Informations</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Meta Informations</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Faq Title</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Faq Title</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Faq Details</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Faq Details</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Faq</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Faq</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Create FAQ</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Create FAQ</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Faq.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Faq.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Contact Us Email Address</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Contact Us Email Address</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Contact Form Success Text</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Contact Form Success Text</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Website</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Website</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Day</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Day</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Time</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Time</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Meta Keys</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Meta Keys</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Seperate By Comma. Optional</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Seperate By Comma. Optional</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Meta Description</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Meta Description</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Optional</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Optional</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Street Address</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Street Address</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Page</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Page</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Pages</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Pages</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Page Title</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Page Title</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Page Details</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Page Details</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">PAGE</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">PAGE</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Meta Tags</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Meta Tags</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Allow Page SEO</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Allow Page SEO</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Create Page</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Create Page</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Page.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Page.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Email Configuration</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Email Configuration</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">SMTP</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">SMTP</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">SMTP Host</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">SMTP Host</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">SMTP Port</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">SMTP Port</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">SMTP Username</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">SMTP Username</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">SMTP Password</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">SMTP Password</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">From Email</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">From Email</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">From Name</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">From Name</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Select User Type</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Select User Type</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Email Subject</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Email Subject</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Email Body</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Email Body</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Send Email</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Send Email</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">All Customer</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">All Customer</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Stripe</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Stripe</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Stripe Key</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Stripe Key</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Paypal Business Email</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Paypal Business Email</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Stripe Secret</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Stripe Secret</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Sign</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Sign</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Value</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Value</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Currency</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Currency</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">CURRENCY</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">CURRENCY</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Currency.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Currency.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Currency Name</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Currency Name</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Currency Sign</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Currency Sign</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Currency Value</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Currency Value</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Create Currency</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Create Currency</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Facebook</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Facebook</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Google Plus</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Google Plus</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Twitter</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Twitter</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Linkedin</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Linkedin</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Dribble</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Dribble</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Active</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Active</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Deactive</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Deactive</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">App ID</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">App ID</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Get Your App ID from developers.facebook.com</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Get Your App ID from developers.facebook.com</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">App Secret</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">App Secret</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Get Your App Secret from developers.facebook.com</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Get Your App Secret from developers.facebook.com</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Website URL</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Website URL</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Valid OAuth Redirect URI</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Valid OAuth Redirect URI</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Copy this url and paste it to your Valid OAuth Redirect URI in developers.facebook.com.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Copy this url and paste it to your Valid OAuth Redirect URI in developers.facebook.com.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Client ID</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Client ID</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Get Your Client ID from console.cloud.google.com</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Get Your Client ID from console.cloud.google.com</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Client Secret</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Client Secret</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Redirect URL</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Redirect URL</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Copy this url and paste it to your Redirect URL in console.cloud.google.com.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Copy this url and paste it to your Redirect URL in console.cloud.google.com.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Languages</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Languages</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Add New Language</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Add New Language</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Language.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Language.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Edit Language</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Edit Language</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Admin Panel Language</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Admin Panel Language</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">SET LANGUAGE KEYS &amp; VALUES</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">SET LANGUAGE KEYS &amp; VALUES</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Admin Languages</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Admin Languages</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Wibsite Language</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Wibsite Language</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">English</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">English</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Language Direction</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Language Direction</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Google Analytics ID</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Google Analytics ID</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Facebook Pixel ID</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Facebook Pixel ID</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Google Analytics Script</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Google Analytics Script</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Meta Analytics</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Meta Analytics</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Download</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Download</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">New Conversation(s).</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">New Conversation(s).</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Clear All</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Clear All</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You Have a New Message.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You Have a New Message.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">No New Notifications.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">No New Notifications.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">View New Compaign</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">View New Compaign</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">New Withdrow Request</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">New Withdrow Request</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Edit Profile</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Edit Profile</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Change Password</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Change Password</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Logout</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Logout</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Welcome</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Welcome</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current Password</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current Password</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">New Password</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">New Password</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Re-Type New Password</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Re-Type New Password</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter Current Password</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter Current Password</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Enter New Password</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Enter New Password</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current Profile Image</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current Profile Image</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Login Now</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Login Now</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Welcome back, please sign in below</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Welcome back, please sign in below</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Login</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Login</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Type Email Address</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Type Email Address</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Type Password</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Type Password</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Forgot Password?</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Forgot Password?</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Authenticating...</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Authenticating...</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Remember Password</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Remember Password</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Remember Password? Login</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Remember Password? Login</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Forgot Password</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Forgot Password</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Checking...</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Checking...</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">This slug has already been taken.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">This slug has already been taken.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Slug Must Not Have Any Special Characters.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Slug Must Not Have Any Special Characters.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">New Data Added Successfully.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">New Data Added Successfully.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Data Updated Successfully.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Data Updated Successfully.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Remove the campaigns first !</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Remove the campaigns first !</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Data Deleted Successfully.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Data Deleted Successfully.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Status Update Successfully.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Status Update Successfully.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Process Successfully.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Process Successfully.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Insufficient Balance.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Insufficient Balance.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Please enter a valid amount.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Please enter a valid amount.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Customer Information Updated Successfully.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Customer Information Updated Successfully.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Accepted Successfully.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Accepted Successfully.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Withdraw Rejected Successfully.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Withdraw Rejected Successfully.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You don't have access to remove this language</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You don't have access to remove this language</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">This name has already been taken.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">This name has already been taken.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Successfully updated your profile</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Successfully updated your profile</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Confirm password does not match.'</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Confirm password does not match.'</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Current password Does not match.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Current password Does not match.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Successfully change your password</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Successfully change your password</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Credentials Doesn\'t Match !</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Credentials Doesn\'t Match !</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Your Password Reseted Successfully. Please Check your email for new Password.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Your Password Reseted Successfully. Please Check your email for new Password.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">No Account Found With This Email.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">No Account Found With This Email.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">FAQ Status Upated Successfully.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">FAQ Status Upated Successfully.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Contact Status Upated Successfully.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Contact Status Upated Successfully.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Contact page content updated successfully.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Contact page content updated successfully.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Source</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Source</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Allow Blog SEO</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Allow Blog SEO</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Post.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Post.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">You are about to delete this Feature.</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">You are about to delete this Feature.</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">This Value is Invalid</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">This Value is Invalid</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">This Campaign Available Fund</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">This Campaign Available Fund</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Set Default</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Set Default</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                    <div class="lang-area">
                                              <span class="remove lang-remove"><i class="fas fa-times"></i></span>
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                      <textarea name="keys[]" class="input-field" placeholder="Enter Language Key" required="">Default</textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <textarea name="values[]" class="input-field" placeholder="Enter Language Value" required="">Default</textarea>
                                                  </div>
                                              </div>
                                          </div>
                                                                                </div>
                                      <a href="javascript:;" id="lang-btn" class="add-fild-btn"><i class="icofont-plus"></i> Add More Field</a>
                                  </div>
                              </div>
                <div class="col-lg-2">
                  <div class="left-area">

                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-lg-5">
                  <div class="left-area">

                  </div>
                </div>
                <div class="col-lg-7">
                  <button class="addProductSubmit-btn" type="submit">{{ __('Create Language') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')

<script>
    function isEmpty(el){
        return !$.trim(el.html())
    }
    
  $("#lang-btn").on('click', function(){
  
      $("#lang-section").append(''+
          '<div class="lang-area">'+
            '<span class="remove lang-remove"><i class="fas fa-times"></i></span>'+
            '<div class="row">'+
              '<div class="col-lg-6">'+
              '<textarea name="keys[]" class="input-field" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>'+
              '</div>'+
              '<div class="col-lg-6">'+
              '<textarea  name="values[]" class="input-field" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>'+
              '</div>'+
            '</div>'+
          '</div>'+
      '');
  });
  
  $(document).on('click','.lang-remove', function(){
  
      $(this.parentNode).remove();
      if (isEmpty($('#lang-section'))) {
  
      $("#lang-section").append(''+
            '<div class="lang-area">'+
              '<span class="remove lang-remove"><i class="fas fa-times"></i></span>'+
              '<div class="row">'+
                '<div class="col-lg-6">'+
                '<textarea name="keys[]" class="input-field" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>'+
                '</div>'+
                '<div class="col-lg-6">'+
                '<textarea  name="values[]" class="input-field" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>'+
                '</div>'+
              '</div>'+
            '</div>'+
        '');
      }
  });
  
  </script>

@endsection