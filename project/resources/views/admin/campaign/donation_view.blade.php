@extends('layouts.load')

@section('content')
    <div class="content-area">
        <div class="row add_lan_tab justify-content-center">
            <div class="col-lg-10">
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
                                                    @php
                                                        $Currency = App\Models\Currency::where('is_default',1)->first();
                                                    @endphp
                                                   
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Campaign Name')}}:</th>
                                                        <td>{{ $data->campaign->campaign_name }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Name')}}:</th>
                                                        <td>{{ $data->fname }} {{$data->lname}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Email')}}:</th>
                                                        <td>{{ $data->email }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Number')}}:</th>
                                                        <td>{{ $data->number }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Amount')}}:</th>
                                                        <td>{{ $Currency->sign }}{{round( $data->donation_amount * $Currency->value ,2) }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Address')}}:</th>
                                                        <td>{{ $data->address}}</td>
                                                    </tr>


                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Payment Type')}}:</th>
                                                        <td>{{ strtoupper($data->payment_type)}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Donation Number')}}:</th>
                                                        <td>{{ strtoupper($data->donation_number)}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Payment Status')}}:</th>
                                                        <td>{{ strtoupper($data->payment_status)}}</td>
                                                    </tr>
                                                    @if($data->charge_id)
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Charge Id')}}:</th>
                                                        <td>{{ strtoupper($data->charge_id)}}</td>
                                                    </tr>
                                                    @endif
                                                    @if($data->none)
                                                    <tr>
                                                        <th class="auction-details-heading">{{__('Note')}}:</th>
                                                        <td>{{ strtoupper($data->note)}}</td>
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
                </div>
            </div>
        </div>

@endsection
