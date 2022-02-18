		@if(count($datas) > 0)
		@foreach($datas as $data)
			@if($data->campaign_id)
				@if ($data->usercampaignShow->is_panding == 1)
					<a href="{{ route('user-campaign.index') }}" class="dropdown-item">{{ __('Your Campaign Is Approved') }}</a>
				@endif
			@endif

			@if ($data->withdraw_id)
				@if ($data->userwithdrowShow->status == 'rejected')
				<a href="{{ route('user-wwt-index') }}" class="dropdown-item">{{ __('Your Withdraw Request Rejected') }}</a>
				@elseif($data->userwithdrowShow->status == 'completed')
					<a href="{{ route('user-wwt-index') }}" class="dropdown-item">{{ __('Your Withdraw Request Accepted') }}</a>
				@endif
			@endif

			@if($data->conversation_id)
			<a href="{{ route('user-message-show',$data->conversation_id) }}" class="dropdown-item">{{ __('You Have a New Message') }}</a>
			@endif
		@endforeach
			<a href="javascript:;" data-href="{{ route('customer-notf-clear') }}" class="dropdown-item " id="notf-clear">{{ __('Clear All') }}</a>		
		</ul>

		@else 
			<a class="dropdown-item "> {{ __('No new Notification') }} </a>	
		@endif


