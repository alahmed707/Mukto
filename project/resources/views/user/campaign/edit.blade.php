@extends('layouts.user')
@section('content')

<div class="col-lg-9">
          <div class="transaction-area">

            <div class="heading-area">
              <h3 class="title">
                {{ __('Campaign Update') }}
              </h3>
            </div>
            @include('includes.form-success') 
              @include('includes.form-error') 
              <form id="userform" class="px-4" action="{{route('user-campaign-update',$data->id)}}" enctype="multipart/form-data">
                <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                    {{ csrf_field() }}
                    @include('includes.admin.form-both') 
                    <div class="row">
                      <div class="col-lg-12">
                            <div class="form-group bmd-form-group">
                                <label for="campaign_name" class="bmd-label-floating">{{ __('Campaign Name') }}*</label>
                                <input type="text" class="form-control" id="campaign_name" name="campaign_name" required="" value="{{ $data->campaign_name }}">
                                <span class="bmd-help">{{ __('Campaign Name') }}</span>
                            </div>
                      </div>

                      <div class="col-lg-12">
                            <div class="form-group bmd-form-group">
                                <label for="slug" class="bmd-label-floating">{{ __('Slug') }}*</label>
                                <input type="text" class="form-control" id="slug" name="slug" required="" value="{{ $data->slug }}">
                                <span class="bmd-help">{{ __('Slug') }}</span>
                            </div>
                      </div>

                      <div class="col-lg-12 mb-4">
                        <div class="form-group bmd-form-group">
                          <select name="category_id" id="category_id" class="form-control" required>
                              <option value="" selected disabled>{{ __('Select Category') }}</option>            
                              @foreach ($categorys as $item)
                                  <option value="{{ $item->id }}" {{ $data->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                              @endforeach           
                          </select>
                        </div>
                    </div>

                      <div class="upload-image-area mb-4">
                        <div class="img">
                            <img class="uploadImageBefore" src="{{ $data->photo ? asset('assets/images/campaign/'.$data->photo) : asset('assets/admin/images/upload.png') }}">
                            <div>
                              <label  for="photo" class="mybtn1 edit-profile">{{ __('Upload Image') }}</label>
                            </div>
                          <input class="d-none upload" id="photo" type="file" name="photo">
                        </div>
                      </div>

                      <div class="col-lg-12">
                            <div class="form-group bmd-form-group">
                                <label for="description" class="bmd-label-floating">{{ __('Description') }}*</label>
                               <textarea name="description" class="form-control" id="description" cols="30" rows="6">{!! $data->description !!}</textarea>
                            </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="form-group bmd-form-group">
                            <label for="video_link" class="bmd-label-floating">{{ __('Campaign Video Link') }}*</label>
                            <input type="text" class="form-control" id="video_link" name="video_link" value="{{ $data->video_link }}">
                            <span class="bmd-help">{{ __('Campaign Video Link') }}</span>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="form-group bmd-form-group">
                            <label for="end_date" class="bmd-label-floating">{{ __('End Date') }}*</label>
                            <input type="text" class="form-control" id="end_date" name="end_date" required="" value="{{ $data->end_date }}">
                            <span class="bmd-help">{{ __('End Date') }}</span>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="form-group bmd-form-group">
                        <label for="goal" class="bmd-label-floating">{{ __('Goal') }}* ({{$currencies->name}})</label>
                            <input type="text" class="form-control" id="goal" name="goal" required="" value="{{ round($data->goal * $currencies->value ,2)  }}">
                            <span class="bmd-help">{{ __('Goal') }}</span>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="form-group bmd-form-group">
                            <label for="benefits" class="bmd-label-floating">{{ __('Benefits') }}</label>
                            <input type="number" class="form-control" id="benefits" name="benefits"  value="{{ $data->benefits }}">
                            <span class="bmd-help">{{ __('Benefits') }}</span>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="form-group bmd-form-group">
                            <label for="location" class="bmd-label-floating">{{ __('Location') }}</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ $data->location }}">
                            <span class="bmd-help">{{ __('Location') }}</span>
                        </div>
                      </div>

                      

                      <div class="col-lg-12">
                        <div class="form-group bmd-form-group">
                            <label for="preloaded_amount">{{ __('Preloaded Amount') }} <small>{{ __('(Seperated By Comma(,))') }}</small></label>
                        <input type="text" class="preloaded_amount" value="{{ $data->preloaded_amount }}" id="preloaded_amount"  name="preloaded_amount[]">
                        </div>
                      </div>
                     

                      <div class="col-lg-12 mb-4">
                        <div class="form-group bmd-form-group">
                            <label for="tags">{{ __('Tags') }} <small>{{ __('(Seperated By Comma(,))') }}</small></label>
                        <input type="text" class="tags" placeholder=" " id="tags"  name="tags" value="{{$data->tags}}">
                        </div>
                        <!--<label for="allowProductSEO"><input type="checkbox" {{ ($data->meta_tag != null || strip_tags($data->meta_description) != null) ? 'checked':'' }} id="allowProductSEO" class="mr-2" name="secheck"> {{ __('Allow Campaign SEO') }}</label>-->
                      </div>

                    <div class="col-lg-12 showMetaData {{ $data->meta_tag != null  || strip_tags($data->meta_description != null) ? " ":"d-none" }}">
                        <div class="form-group bmd-form-group">
                            <label for="meta_tag">{{ __('Meta Tag') }}</label>
                        <input type="text" class="tags" placeholder=" " id="meta_tag"  name="meta_tag" value="{{$data->meta_tag}}">
                        </div>
                      </div>
                      <div class="col-lg-12 showMetaData {{ $data->meta_tag != null  || strip_tags($data->meta_description != null) ? "":"d-none" }}">
                        <div class="form-group bmd-form-group">
                            <label for="meta_description" class="bmd-label-floating">{{ __('Meta Description') }}</label>
                        <input type="text" class="form-control" id="meta_description" name="meta_description" value="{{$data->meta_description}}">
                            <span class="bmd-help">{{ __('Meta Description') }}</span>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <label>{{ __('Close Campaign After') }}*</label>
                        <div class="radio pb-1">
                          <label class="pt-2 pb-2 pr-3"><input type="radio" class="mr-2" {{ $data->end_after =='goal' ? 'checked' : '' }} name="end_after" value="goal">{{ __('Achieving Goal') }}</label>
                          <label><input type="radio" name="end_after"  class="mr-2" {{ $data->end_after =='date' ? 'checked' : '' }}  value="date">{{ __('End Date') }}</label>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="checkbox pb-4">
                          <label class="pt-2 pt-2 pr-3"><input type="checkbox" class="mr-2" {{ $data->featured ==1 ? 'checked' : '' }}  name="featured" value="1"> {{ __('Add to Featured Campaign') }}</label>
                          <label><input type="checkbox" class="mr-2" name="send_newsletter" {{ $data->send_newsletter ==1 ? 'checked' : '' }} value="1"> {{ __('Send NewsLetter to all Subscribers') }}</label>
                        </div>
                      </div>
                      
                      <div class="col-lg-12">
                          <button type="submit" class="btn btn-primary btn-round">{{ __('Update') }}</button>
                      </div>
                  </div>
              </form>
          </div>
        </div>

@endsection
@section('scripts')
<script>
 var dateToday = new Date();
  var dates =  $( "#end_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: dateToday,
});

$('.tags').tagify();
$('.preloaded_amount').tagify();


$('#allowProductSEO').on('click',function(){

let value = $(this).is(':checked');
if(value == false){
  $('.showMetaData').addClass('d-none');
}else{
  $('.showMetaData').removeClass('d-none');
}
})

</script>
@endsection