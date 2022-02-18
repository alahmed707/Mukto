@extends('layouts.user')

@section('content')
<div class="col-lg-9">
    <div class="transaction-area">
        <div class="heading-area">
            <h3 class="title">
				<h3 class="title float-left">
                    {{ __('Campaign') }}
                </h3>
            </h3>
            <h3 class="title">
				<h3 class="title float-right">
                   <a href="{{route('user-campaign.create')}}" class="btn btn-primary btn-round ml-2">{{ __('Create Campaign') }}</a>
                </h3>
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
                                <th>{{ __('Funded') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->campaign as $item)
                            <tr>
                                <td>
                                    {{ $item->campaign_name }}
                                </td>
                                <td>
                                    {{ $currencies->sign }} {{ round($item->goal * $currencies->value , 2 )}}
                                </td>
                                <td>
                                    {{ $currencies->sign }} {{ round($item->available_fund * $currencies->value , 2 )}}
                                </td>
                               
                                <td>
                                    @if ($item->is_panding == 0)
                                    <span class="badge badge-danger p-2 mt-2">{{ __('Panding') }}</span>
                                    @else
                                    <span class="badge badge-success p-2 mt-2">{{ __('Approved') }}</span>
                                    @endif
                                </td>

                                <td>
                                    <a  data-href="{{  route('user-campaign-delete',$item->id) }}" data-toggle="modal" data-target="#confirm-delete" class="text-white badge btn btn-sm badge-danger deleteData p-2 cursor-pointer">{{ __('Delete') }}</a>
                                    <a href="{{ route('user-campaign-view',$item->id) }}"  class="badge badge-secondary p-2 btn btn-sm text-white">{{ __('View') }}</a>
                                    <a href="{{ route('user-campaign.edit',$item->id) }} " class="badge btn btn-sm badge-info p-2 text-white">{{ __('Edit') }}</a>
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

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header d-block text-center">
                <h4 class="modal-title d-inline-block">{{ __('Confirm Delete') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p class="text-center">{{ __('You are about to delete this Feature.') }}</p>
                <p class="text-center">{{ __('Do you want to proceed') }}?</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel') }}</button>
                <a href="" class="btn btn-danger btn-ok deleteButton">{{ __('Delete') }}</a>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    $('#example').DataTable();
    
    $('.deleteData').click(function(){
        var location = $(this).attr('data-href');
        console.log(location);
         $(".deleteButton").attr("href", location);
    })
</script>

@endsection