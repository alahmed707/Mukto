	@if(count($datas) > 0)
		<a id="order-notf-clear" data-href="{{ route('order-notf-clear') }}" class="clear" href="javascript:;">
			{{ __('Clear All') }}
		</a>
		<ul>
	@if ($datas->count() > 0 )
		@foreach($datas as $data)
		@if ($data->donation_id)
		<li>
			<a href="{{ route('admin-campaign-view',$data->donationShow->campaign_id) }}"> <i class="fas fas fa-donate"></i> {{ __('View New Donation') }}</a>
		</li>
		@elseif($data->campaign_id)
		<li>
			<a href="{{ route('admin-campaign-panding-index') }}"> <i class="fas fa-hand-holding-heart"></i>{{ __('View New Campaign') }}</a>
		</li>
		@elseif($data->withdrow_id)
		<li>
			<a href="{{ route('admin-withdraw-index') }}"> <i class="fas fa-hand-holding-usd"></i> {{ __('New Withdraw Request') }}</a>
		</li>
		@endif
			
		@endforeach
	@endif
		</ul>

		@else 

		<a class="clear" href="javascript:;">
			{{ __('No New Notifications.') }}
		</a>

		@endif