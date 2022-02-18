@extends('layouts.user')


@section('content')
<div class="col-lg-9">

    <div class="transaction-area">
        <div class="heading-area">
            <h3 class="title">
               {{__('Withdraw Now')}}
                <a href="{{route('user-wwt-index')}}" class="btn btn-primary btn-round ml-2">{{ __('Back') }}</a>
              </h3>
        </div>

        <div class="gocover" style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form id="userform" class="form-horizontal px-4" action="{{route('user-wwt-store')}}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }} @include('includes.admin.form-both')

            <div class="row">
                <label class="text-muted text-success  ShowFund "></label>
                <div class="col-lg-12">
                    <div class="form-group bmd-form-group">
                        <select name="methods" id="withmethod" class="form-control" required>
                            <option value="">{{ __('Select Withdraw Method') }}</option>
                            <option value="Paypal">{{ __('bKash') }}</option>
                            <option value="Skrill">{{ __('Rocket') }}</option>
                            <option value="Payoneer">{{ __('Nagad') }}</option>
                            <option value="Bank">{{ __('Bank') }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group bmd-form-group">
                        <select name="campaign_id" id="campaign_id" class="form-control" required>
                            <option selected value="{{ Auth::user()->campaign()->first()->id }}">
                                {{Auth::user()->campaign()->first()->campaign_name }}</option>
                            @foreach (Auth::user()->campaign()->get() as $key => $item)
                                @if ($key != 0)
                                <option value="{{ $item->id }}">{{ $item->campaign_name }}</option> 
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                

                <div class="col-lg-12">
                    <div class="form-group bmd-form-group">
                        <label for="amount" class="bmd-label-floating">{{ __('Withdraw Amount') }}* ({{ $currencies->name }})</label>
                        <input name="amount" id="amount" class="form-control" autocomplete="off" type="text" value="{{ old('amount') }}" required>
                        <span class="bmd-help">{{ __('Withdraw Amount') }} ({{ $currencies->name }})</span>
                    </div>
                </div>

                <div id="paypal" style="display: none; width: 100%;">

                    <div class="col-lg-12">
                        <div class="form-group bmd-form-group">
                            <label for="acc_email" class="bmd-label-floating">{{ __('Enter Account Number') }}*</label>
                            <input name="acc_email" id="acc_email" class="form-control" type="text" value="{{ old('acc_email') }}" required>
                            <span class="bmd-help">{{ __('Enter Account Number') }}</span>
                        </div>
                    </div>

                </div>

                <div id="bank" style="display: none; width: 100%;">

                    <div class="col-lg-12">
                        <div class="form-group bmd-form-group">
                            <label for="iban" class="bmd-label-floating">{{ __('Enter Account No') }}*</label>
                            <input name="iban" id="iban" class="form-control" type="text" value="{{ old('iban') }}" required>
                            <span class="bmd-help">{{ __('Enter IBAN/Account No') }}</span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group bmd-form-group">
                            <label for="accname" class="bmd-label-floating">{{ __('Enter Account Name') }}*</label>
                            <input name="accname" id="accname" class="form-control" type="text" value="{{ old('accname') }}" required>
                            <span class="bmd-help">{{ __('Enter Account Name') }}</span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group bmd-form-group">
                            <label for="address" class="bmd-label-floating">{{ __('Enter Address') }}*</label>
                            <input name="address" id="address" class="form-control" type="text" value="{{ old('address') }}" required>
                            <span class="bmd-help">{{ __('Enter Address') }}</span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group bmd-form-group">
                            <label for="swift" class="bmd-label-floating">{{ __('Enter Swift Code') }}*</label>
                            <input name="swift" id="swift" class="form-control" type="text" value="{{ old('swift') }}" required>
                            <span class="bmd-help">{{ __('Enter Swift Code') }}</span>
                        </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="form-group bmd-form-group">
                        <label for="reference" class="bmd-label-floating">{{ __('Additional Reference(Optional)') }} </label>
                        <textarea id="reference" class="form-control" name="reference" rows="6">{{ old('reference') }}</textarea>
                        <span class="bmd-help">{{ __('Additional Reference(Optional)') }}</span>
                    </div>
                </div>
                <div id="resp" class="col-md-12">
                    <span class="help-block">
                            <strong>{{ __('Withdraw Fee') }}  ${{ $gs->withdraw_fee }} {{ __('and') }}  {{ $gs->withdraw_charge }}% {{ __('will deduct from your account') }}.</strong>
                        </span>
                </div>

                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-round">{{ __('Withdraw Now') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')


<script type="text/javascript">
    $("#withmethod").change(function(){
        var method = $(this).val();
        if(method == "Bank"){

            $("#bank").show();
            $("#bank").find('input, select').attr('required',true);

            $("#paypal").hide();
            $("#paypal").find('input').attr('required',false);

        }
        if(method != "Bank"){
            $("#bank").hide();
            $("#bank").find('input, select').attr('required',false);

            $("#paypal").show();
            $("#paypal").find('input').attr('required',true);
        }
        if(method == ""){
            $("#bank").hide();
            $("#paypal").hide();
        }

    })

</script>

<script>
   var value = $('#campaign_id :selected').val();
        $.ajax({
            type: "get",
            url: '{{ url('user/campaign/availble-fund/get') }}/' + value,
            success: function(data)
            {
                $('.ShowFund').html(data);
            }
            });

    $('#campaign_id').on('change',function(){
        var value = $('#campaign_id :selected').val();
        $.ajax({
            type: "get",
            url: '{{ url('user/campaign/availble-fund/get') }}/' + value,
            success: function(data)
            {
                $('.ShowFund').html(data);
            }
            });
    })
</script>

@endsection