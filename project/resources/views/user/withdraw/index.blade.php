@extends('layouts.user')

@section('content')

        <div class="col-lg-9">

          <div class="transaction-area">
            <div class="heading-area">
              <h3 class="title">
               {{  __('My Withdraws') }}
               @if(Auth::user()->campaign->where('is_panding',1)->where('status','open')->count() > 0)
               <a href="{{route('user-wwt-create')}}" class="btn btn-primary btn-round ml-2">{{ __('Withdraw Now') }}</a>
               @endif
              </h3>
            </div>
            <div class="content">

							<div class="mr-table allproduct mt-4">
									<div class="table-responsiv">
											<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>{{ __('Withdraw Date') }}</th>
														<th>{{ __('Method') }}</th>
														<th>{{ __('Account') }}</th>
														<th>{{ __('Amount') }}</th>
														<th>{{ __('Status') }}</th>
													</tr>
												</thead>
												<tbody>
                            @foreach($withdraws as $withdraw)
                                <tr>
                                    <td>{{date('d-M-Y',strtotime($withdraw->created_at))}}</td>
                                    <td>{{$withdraw->method}}</td>
                                    @if($withdraw->method != "Bank")
                                        <td>{{$withdraw->acc_email}}</td>
                                    @else
                                        <td>{{$withdraw->iban}}</td>
                                    @endif
                                    @if($gs->currency_format == 0)
                                        <td>{{$currencies->sign }} {{ round($withdraw->amount * $currencies->value, 2) }}</td>
                                    @else  
                                        <td>{{ round($withdraw->amount, 2) }}</td>
                                    @endif
                                    
                                    <td>{{ucfirst($withdraw->status)}}</td>
                                </tr>
                            @endforeach
												</tbody>
											</table>
									</div>
								</div>
            </div>
          </div>
        </div>

@endsection

@section('scripts')

<script type="text/javascript">
	   $('#example').DataTable({
               ordering: false
            });
</script>

@endsection

