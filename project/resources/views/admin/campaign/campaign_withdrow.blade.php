@extends('layouts.admin')

@section('content')
<div class="content-area">
  <div class="mr-breadcrumb">
    <div class="row">
      <div class="col-lg-12">
          <h4 class="heading">{{ __('New Withdraw') }}<a class="add-btn ml-2" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
          <ul class="links">
            <li>
              <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
            </li>
            <li>
              <a href="{{ route('admin-campaign-index') }}">{{ __('Campaign') }}</a>
            </li>
            <li>
              <a href="{{ route('admin-campaign-withdrow-create',$data->id) }}">{{ __('Withdraw') }}</a>
            </li>
          </ul>
      </div>
    </div>
  </div>
@php
  $Currency = App\Models\Currency::where('is_default',1)->first();
@endphp
  <div class="add-product-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="product-description">
          <div class="body-area">
            @include('includes.admin.form-error')  
            @include('includes.admin.form-success')
            <p class="text-center text-success ShowFund mb-4"></p>
            <form id="geniusform" action="{{route('admin-campaign-withdrow')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="campaign_id" id="campaign_id" value="{{ $data->id }}">
                <div class="row">
                    <div class="col-lg-4">
                      <div class="left-area">
                          <h4 class="heading">{{ __('Select Withdraw Method') }}</h4>
                      </div>
                    </div>
                    <div class="col-lg-7">
                        <select  name="methods" id="withmethod" required="">
                            <option value="">{{ __('Select Withdraw Method') }}</option>
                            <option value="Paypal">{{ __('Paypal') }}</option>
                            <option value="Skrill">{{ __('Skrill') }}</option>
                            <option value="Payoneer">{{ __('Payoneer') }}</option>
                            <option value="Bank">{{ __('Bank') }}</option>
                          </select>
                    </div>
                  </div>
    
                <div class="row">
                  <div class="col-lg-4">
                    <div class="left-area">
                    <h4 class="heading">{{ __('Withdraw Amount') }}* <small>({{$Currency->name}})</small></h4>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <input type="text" class="input-field" name="amount" placeholder="{{ __('Withdraw Amount') }}" id="amount" required="" value="{{ Request::old('amount') }}">
                  </div>
                </div>
    
                <div id="paypal" style="display: none; width: 100%;">
                <div class="row" id="paypal">
                  <div class="col-lg-4">
                    <div class="left-area">
                        <h4 class="heading">{{ __('Enter Account Email') }}*</h4>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <input type="text" class="input-field" name="acc_email" id="acc_email" placeholder="{{ __('Enter Account Email') }}" required="" value="{{ Request::old('acc_email') }}">
                  </div>
                </div>
                </div>
    
                <div id="bank" style="display: none; width: 100%;">
                    <div class="row">
                        <div class="col-lg-4">
                          <div class="left-area">
                              <h4 class="heading">{{ __('Enter IBAN/Account No') }}*</h4>
                          </div>
                        </div>
                        <div class="col-lg-7">
                          <input type="text" class="input-field" name="iban" id="iban" placeholder="{{ __('Enter IBAN/Account No') }}" required="" value="{{ Request::old('iban') }}">
                        </div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="left-area">
                              <h4 class="heading">{{ __('Enter Account Name') }}*</h4>
    
                          </div>
                        </div>
                        <div class="col-lg-7">
                          <input type="text" class="input-field" name="accname" id="accname"  placeholder="{{ __('Enter Account Name') }}" required="" value="{{ Request::old('accname') }}">
                        </div>
                      </div>
    
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="left-area">
                              <h4 class="heading">{{ __('Enter Address') }}*</h4>
                         
                          </div>
                        </div>
                        <div class="col-lg-7">
                          <input type="text" class="input-field" name="address" id="address" placeholder="{{ __('Enter Address') }}" required="" value="{{ Request::old('address') }}">
                        </div>
                      </div>
    
    
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="left-area">
                              <h4 class="heading">{{ __('Enter Swift Code') }}*</h4>
                    
                          </div>
                        </div>
                        <div class="col-lg-7">
                          <input type="text" class="input-field" name="swift" id="swift" placeholder="{{ __('Enter Swift Code') }}" required="" value="{{ Request::old('swift') }}">
                        </div>
                      </div>
                  </div>
               
                <div class="row">
                    <div class="col-lg-4">
                      <div class="left-area">
                        <h4 class="heading">
                            {{ __('Additional Reference(Optional)') }}
                        </h4>
                      </div>
                    </div>
                    <div class="col-lg-7">
                        <textarea  class="nic-edit" id="reference" name="reference"></textarea> 
                    </div>
              </div>
                
                <div class="row">
                  <div class="col-lg-4">
                    <div class="left-area">
                      
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <button class="addProductSubmit-btn" type="submit">{{ __('Withdrow') }}</button>
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
    var value = $('#campaign_id').val();
         $.ajax({
             type: "get",
             url: '{{ url('admin/campaign/availble-fund/get') }}/' + value,
             success: function(data)
             {
                 $('.ShowFund').html(data);
             }
             });
 
 </script>
@endsection