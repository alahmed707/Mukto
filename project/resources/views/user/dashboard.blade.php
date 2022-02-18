@extends('layouts.user')

@section('content')
<div class="col-lg-9">
    <div class="transaction-area">
        <div class="heading-area">
            <h3 class="title">
				{{ __('Recent Campaigns') }}
            </h3>
        </div>
        <div class="content">

            <div class="mr-table allproduct mt-4">
                <div class="table-responsiv">
                    @include('includes.form-success') 
                    <table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Goal') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->campaign()->where('is_panding',1)->where('status','open')->orderby('id','desc')->take(10)->get() as $item)
                            <tr>
                                <td>
                                    {{ $item->campaign_name }}
                                </td>
                                <td>
                                    {{ $currencies->sign }} {{ round($item->goal * $currencies->value , 2 )}}
                                </td>
                                <td>
                                    {{ $item->category->name }}
                                </td>
                                <td>
                                    @if ($item->is_panding == 0)
                                    <span class="badge badge-danger p-2 mt-2">{{ __('Panding') }}</span>
                                    @else
                                    <span class="badge badge-success p-2 mt-2">{{ __('Approved') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user-campaign-view',$item->id) }}"  class="badge badge-primary p-2 btn btn-sm text-white">{{ __('View') }}</a>
                                    <a href="{{ route('user-campaign.edit',$item->id) }} " class="badge btn btn-sm badge-info p-2 text-white">{{ __('Edit') }}</a>
                                    <a  data-href="{{  route('user-campaign-delete',$item->id) }}" data-toggle="modal" data-target="#confirm-delete" class="text-white badge btn btn-sm badge-danger deleteData p-2 cursor-pointer">{{ __('Delete') }}</a>
                                </td>
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
	$('#example').DataTable();
</script>

@endsection