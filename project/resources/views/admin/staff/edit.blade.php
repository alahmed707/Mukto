@extends('layouts.load')
@section('content')

			<div class="content-area">
				<div class="add-product-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="product-description">
								<div class="body-area">
									@include('includes.admin.form-error')
								<form id="geniusformdata" action="{{ route('admin.staff.update',$data->id) }}" method="POST" enctype="multipart/form-data">
									{{csrf_field()}}

									<div class="row">
										<div class="col-lg-4">
										<div class="left-area">
											<h4 class="heading">{{ __('Staff Profile Image') }} *</h4>
										</div>
										</div>
										<div class="col-lg-7">
										<div class="img-upload">
											<div id="image-preview" class="img-preview" style="background: url({{ $data->photo ? asset('assets/images/admins/'.$data->photo):asset('assets/images/noimage.png')}});">
												<label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                            <input type="file" name="photo" value="{{$data->photo}}" class="img-upload" id="image-upload">
												</div>
												<p class="text">{{ __('Prefered Size: (600x600) or Square Sized Image') }}</p>
										</div>
										</div>
									</div>


									<div class="row">
										<div class="col-lg-4">
											<div class="left-area">
													<h4 class="heading">{{ __('Name') }} *</h4>
											</div>
										</div>
										<div class="col-lg-7">
                                        <input type="text" class="input-field" name="name" placeholder="{{ __('Name') }}" required="" value="{{$data->name}}">
										</div>
									</div>


									<div class="row">
										<div class="col-lg-4">
											<div class="left-area">
													<h4 class="heading">{{ __('Email') }} *</h4>
											</div>
										</div>
										<div class="col-lg-7">
                                        <input type="email" class="input-field" name="email" placeholder="{{ __('Email') }}" required="" value="{{$data->email}}">
										</div>
									</div>

									<div class="row">
										<div class="col-lg-4">
											<div class="left-area">
													<h4 class="heading">{{ __('Phone') }} *</h4>
											</div>
										</div>
										<div class="col-lg-7">
                                        <input type="text" class="input-field" name="phone" placeholder="{{ __('Phone') }}" required="" value="{{$data->phone}}">
										</div>
									</div>

									<div class="row">
										<div class="col-lg-4">
											<div class="left-area">
												<h4 class="heading">{{ __('Admin Type') }} *</h4>
												<p class="sub-heading">({{ __('In Any Language') }})</p>
											</div>
										</div>
										<div class="col-lg-7">
											<select name="role">
											    <option value="administrator" {{ $data->role == 'administrator' ? 'selected' : '' }}>{{ __('Administrator') }}</option>
											    <option value="staff" {{ $data->role == 'staff' ? 'selected' : '' }}>{{ __('Staff') }}</option>
											</select>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-4">
										<div class="left-area">
											
										</div>
										</div>
										<div class="col-lg-7">
										<button class="addProductSubmit-btn" type="submit">{{ __('Update') }}</button>
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