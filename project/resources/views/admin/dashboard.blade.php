@extends('layouts.admin') 

@section('content')
<div class="content-area">
    @include('includes.form-success')
    <div class="row row-cards-one">
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg1">
                <div class="left">
                    <h5 class="title">{{ __('All Campaign') }} </h5>
                    <span class="number">{{ App\Models\Campaign::where('is_panding',1)->count() }}</span>
                    <a href="{{ route('admin-campaign-index') }}" class="link">{{ __('View All') }}</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg2">
                <div class="left">
                    <h5 class="title">{{ __('Panding Campaign!') }}</h5>
                    <span class="number">{{ App\Models\Campaign::where('is_panding',0)->count() }}</span>
                    <a href="{{ route('admin-campaign-panding-index') }}" class="link">{{ __('View All') }}</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                </div>
            </div>
        </div>

       


        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg6">
                <div class="left">
                    <h5 class="title">{{ __('Total Customer') }} </h5>
                    <span class="number">{{round(App\Models\User::count())}}</span>
                    <a href="{{ route('admin-user-index') }}" class="link">{{ __('View All') }}</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>

       
    </div>

    
@endsection

@section('scripts')

<script type="text/javascript">
    var chart1 = new CanvasJS.Chart("chartContainer-topReference",
        {
            exportEnabled: true,
            animationEnabled: true,

            legend: {
                cursor: "pointer",
                horizontalAlign: "right",
                verticalAlign: "center",
                fontSize: 16,
                padding: {
                    top: 20,
                    bottom: 2,
                    right: 20,
                },
            },
            data: [
                {
                    type: "pie",
                    showInLegend: true,
                    legendText: "",
                    toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                    indexLabel: "#percent%",
                    indexLabelFontColor: "white",
                    indexLabelPlacement: "inside",
                    dataPoints: [
                            @foreach($referrals as $browser)
                                {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                            @endforeach
                    ]
                }
            ]
        });
    chart1.render();

    var chart = new CanvasJS.Chart("chartContainer-os",
        {
            exportEnabled: true,
            animationEnabled: true,
            legend: {
                cursor: "pointer",
                horizontalAlign: "right",
                verticalAlign: "center",
                fontSize: 16,
                padding: {
                    top: 20,
                    bottom: 2,
                    right: 20,
                },
            },
            data: [
                {
                    type: "pie",
                    showInLegend: true,
                    legendText: "",
                    toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                    indexLabel: "#percent%",
                    indexLabelFontColor: "white",
                    indexLabelPlacement: "inside",
                    dataPoints: [
                        @foreach($browsers as $browser)
                            {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                        @endforeach
                    ]
                }
            ]
        });
    chart.render();    
</script>

@endsection
