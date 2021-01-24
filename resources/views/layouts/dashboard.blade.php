
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );


</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">


@if(Auth::user()->level == 'admin')

         

          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-chart-line text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Anggota</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-danger mb-0">{{$anggota->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh anggota
                  </p>
                </div>
              </div>
            </div>
        
        
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Jemaat</p>
                      <div class="fluid-container">
                       <h3 class="font-weight-medium text-danger mb-0">{{$anggota->where('sts_anggota', 'Jemaat')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> Total seluruh jemaat
                  </p>
                </div>
              </div>
            </div>

          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Simpatisan</p>
                      <div class="fluid-container">
                       <h3 class="font-weight-medium text-danger mb-0">{{$anggota->where('sts_anggota', 'Simpatisan')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> Total seluruh simpatisan
                  </p>
                </div>
              </div>
            </div>
           <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-multiple text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Tamu</p>
                      <div class="fluid-container">
                       <h3 class="font-weight-medium text-danger mb-0">{{$anggota->where('sts_anggota', 'Tamu')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> Total seluruh tamu
                  </p>
                </div>
              </div>
            </div>

          

            <div class="panel col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div id="daftarAnggota"> </div>
            </div>
          
            <div class="panel col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div id="kelamin"> </div>
            </div>
</div>
@else   
<h1>BELUM ADA ANJING !!! </h1>
@endif

@endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script> 
Highcharts.chart('daftarAnggota', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Gerakan Wilayah'
    },
    xAxis: {
      categories: [
            'Tengah',
            'Timur',
            'Barat',
            'Selatan',
            'Utara'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Anggota</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Gerakan Wilayah',
        data: [{{$anggota->where('gerwil', 'Tengah')->count()}},{{$anggota->where('gerwil', 'Timur')->count()}}, 
        {{$anggota->where('gerwil', 'Barat')->count()}}, {{$anggota->where('gerwil', 'Selatan')->count()}},
        {{$anggota->where('gerwil', 'Utara')->count()}} 
        ] 
    }]
});
</script>
@stop

@section('piechart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('kelamin', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Jenis Kelamin'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Pria',
            y: {{$anggota->where('jk', 'Pria')->count()}},
            sliced: true,
            selected: true
        }, {
            name: 'Wanita',
            y: {{$anggota->where('jk', 'Wanita')->count()}}
        }]
    }]
});
</script>
@stop