@extends('layouts.user')
@section('styles')

 @section('content')
 
 <div class="col-lg-9 add_lan_tab">
     {{-- <div class="row add_lan_tab justify-content-center"> --}}
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{__('Campaign Details')}}</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">{{__('Donations')}}</a>
            </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            {{-- FRONTEND STARTS --}}
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-description">
                            <div class="body-area">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="auction-details-heading">{{__('Campaign Name')}}:</th>
                                                <td>{{ $data->campaign_name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="auction-details-heading">{{__('Category')}}:</th>
                                                <td>{{ $data->category->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="auction-details-heading">{{__('Slug')}}:</th>
                                                <td>{{ $data->category->slug }}</td>
                                            </tr>
                                            <tr>
                                                <th class="auction-details-heading">{{__('Photo')}}:</th>
                                                <td><img class="campaign-photo" src="{{ asset('assets/images/campaign/'.$data->photo) }}" alt=""></td>
                                            </tr>
                                            <tr>
                                                <th class="auction-details-heading">{{__('Goal')}}:</th>
                                                <td><span>{{ $currencies->sign }} {{ round($data->goal * $currencies->value , 2 )}}</span></td>
                                            </tr>
                                            <tr>
                                                <th class="auction-details-heading">{{__('Video Link')}}:</th>
                                                <td><span> {{ $data->video_link }}</span></td>
                                            </tr>
                                            <tr>
                                                <th class="auction-details-heading">{{__('Details')}}:</th>
                                                <td>
                                                    <p class="text-justify">{!! $data->description !!}</p>
                                                </td>
                                            </tr>
                                            @if ($data->preloaded_amount)
                                            <tr>
                                                <th class="auction-details-heading">{{__('Preloaded amount')}} ({{ $currencies->name }}):</th>
                                                <td>
                                                    
                                                    @foreach (explode(',',$data->preloaded_amount) as $item)
                                                    <span class="mr-3">{{ round($item*$currencies->value ,2)}}</span>
                                                     @endforeach
                                                </td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th class="auction-details-heading">{{__('Tags')}}:</th>
                                                <td>
                                                    @foreach (explode(',',$data->tags) as $item)
                                                    <span class="mr-3">{{ $item }}</span> @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="auction-details-heading">{{__('Featured Allow')}}:</th>
                                                <td>
                                                    @if ($data->featured==1)
                                                    <span class="text-success"> Active </span> @else
                                                    <span class="text-danger">Deactivate</span> @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="auction-details-heading">{{__('Ending Date')}}:</th>
                                                <td>
                                                    {{ $data->end_date }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="auction-details-heading">{{__('Status')}}:</th>
                                                <td>
                                                    @if ($data->status=='open' || $data->is_panding == 1) 
                                                        @if ($data->status=='open' && $data->is_panding == 1)
                                                            <span class="text-success">Open</span>
                                                        @else
                                                            <span class="text-info">Panding</span>
                                                         @endif
                                                     @else
                                                        <span class="text-danger">Close</span>
                                                     @endif
                                                </td>
                                            </tr>
                                            @if($data->benefits)
                                            <tr>
                                                <th class="auction-details-heading">{{__('Benefits')}}:</th>
                                                <td>
                                                    {{ $data->benefits }}
                                                </td>
                                            </tr>
                                            @endif 
                                            @if($data->location)
                                            <tr>
                                                <th class="auction-details-heading">{{__('Location')}}:</th>
                                                <td>
                                                    {{ $data->location }}
                                                </td>
                                            </tr>
                                            @endif 
                                            @if($data->meta_tag)
                                            <tr>
                                                <th class="auction-details-heading">{{__('Meta Tag')}}:</th>
                                                <td>
                                                    @foreach(explode(',' , $data->meta_tag) as $meta_tag)
                                                    {{ $meta_tag }}
                                                    @endforeach
                                                </td>
                                            </tr>
                                            @endif 
                                            @if($data->meta_description)
                                            <tr>
                                                <th class="auction-details-heading">{{__('Meta Description')}}:</th>
                                                <td>
                                                    {{ $data->meta_description }}
                                                </td>
                                            </tr>
                                            @endif 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mr-table allproduct">
                            @include('includes.admin.form-success')
                            <div class="table-responsiv">
                                <table id="bid-table" class="table table-hover dt-responsive table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Phone')}}</th>
                                            <th>{{__('Address')}}</th>
                                            <th>{{__('Amount')}}</th>
                                            <th>{{__('Note')}}</th>
                                            <th>{{__('Date')}}</th>
                                        </tr>
                                        <tbody>
                                            @foreach($data->donation()->orderBy('id','desc')->get() as $donation)
                                            <tr>
                                                <td>{{ $donation->fname }} {{' '. $donation->lname }}</td>
                                                <td>{{ $donation->email }}</td>
                                                <td>{{ $donation->number }}</td>
                                                <td>{{ $donation->address }}</td>
                                                <td>{{ $currencies->sign }} {{ round($donation->donation_amount * $currencies->value ,2)}}</td>
                                                <td>
                                                    @if ($donation->note) {{ $donation->note }} @else No Note @endif
                                                </td>
                                                <td>{{ $donation->created_at->format('Y-m-d')}}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
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