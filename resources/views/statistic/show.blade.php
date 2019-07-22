@extends('template.master')

@section('page-title')
Statistik
@endsection
@section('additional-css')

<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/chosen/chosen.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/bootstrap-datepicker.css')!!}">
<link href="{!! asset('template/vendors/morrisjs/morris.css') !!}" rel="stylesheet">
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-grafik-tab" data-toggle="tab" href="#nav-grafik" role="tab" aria-controls="nav-dosen" aria-selected="true">Grafik</a>
                                        <a class="nav-item nav-link" id="nav-rekamjejak-tab" data-toggle="tab" href="#nav-rekamjejak" role="tab" aria-controls="nav-mahasiswa" aria-selected="false">Rekam Jejak</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-grafik" role="tabpanel" aria-labelledby="nav-grafik-tab">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php $currentPeriodID = App\Period::current()->id?>
                                                <select id="periodIDs" name="" data-placeholder="Pilih Periode" class="standardSelect" tabindex="1">
                                                    @foreach (App\Period::orderBy('id', 'asc')->get() as $period)
                                                        <option value="{&quot;IDs&quot; : [{{$period->id}}]}">{{$period->name}}</option>
                                                    @endforeach
                                                    <option value="{&quot;IDs&quot; : [{{$currentPeriodID}}, {{$currentPeriodID-1}}]}">1 Tahun Terakhir</option>
                                                    <option value="{&quot;IDs&quot; : [{{$currentPeriodID}}, {{$currentPeriodID-1}}, {{$currentPeriodID-2}}, {{$currentPeriodID-3}}]}">2 Tahun Terakhir</option>
                                                    <option value="{&quot;IDs&quot; : [{{$currentPeriodID}}, {{$currentPeriodID-1}}, {{$currentPeriodID-2}}, {{$currentPeriodID-3}}, {{$currentPeriodID-4}}, {{$currentPeriodID-5}}]}">3 Tahun Terakhir</option>
                                                    <option value="{&quot;IDs&quot; : [{{$currentPeriodID}}, {{$currentPeriodID-1}}, {{$currentPeriodID-2}}, {{$currentPeriodID-3}}, {{$currentPeriodID-4}}, {{$currentPeriodID-5}}, {{$currentPeriodID-6}}, {{$currentPeriodID-7}}]}">4 Tahun Terakhir</option>
                                                    <option value="{&quot;IDs&quot; : [{{$currentPeriodID}}, {{$currentPeriodID-1}}, {{$currentPeriodID-2}}, {{$currentPeriodID-3}}, {{$currentPeriodID-4}}, {{$currentPeriodID-5}}, {{$currentPeriodID-6}}, {{$currentPeriodID-7}}, {{$currentPeriodID-8}}, {{$currentPeriodID-9}}]}">5 Tahun Terakhir</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:3rem;">
                                            <div class="col-lg-12">
                                                <div  style="text-align:center;font-size:15pt;">
                                                    <b>Grafik Perusahaan</b>
                                                </div>
                                                <div id="grafik-perusahaan"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-rekamjejak" role="tabpanel" aria-labelledby="nav-rekamjejak-tab">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered display">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align:middle">Nama Perusahaan</th>
                                                    <th style="vertical-align:middle">Jenis Bisnis</th>
                                                    <th style="vertical-align:middle">Alamat</th>
                                                    <th style="vertical-align:middle">Kota</th>
                                                    <th style="vertical-align:middle">Telp Kantor</th>
                                                    <th style="vertical-align:middle"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($corps as $corp)
                                                    <tr>
                                                        <td style="vertical-align:middle">{{$corp->name}}</td>
                                                        <td style="vertical-align:middle">{{$corp->type}}</td>
                                                        <td style="vertical-align:middle">{{$corp->address}}</td>
                                                        <td style="vertical-align:middle">{{$corp->city}}</td>
                                                        <td style="vertical-align:middle">{{$corp->phone_number}}</td>
                                                        <td style="vertical-align:middle;width:12%">
                                                            <center>
                                                                <span style="display:block;">
                                                                    <a href="{{route('corp.show', $corp->id)}}"><button type="submit" class="btn btn-secondary btn-sm corpdetail"  data-toggle="modal" data-target="" style="border-radius:3px;" value="{{$corp->id}}">Lihat Detail</button></a>
                                                                </span>
                                                            </center>
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
                </div>
            </div>
    </div>
</div>
<meta id="token" name="_token" content="{{ csrf_token() }}">
@endsection

@section('additional-js')
<script src="{!!asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.colVis.min.js')!!}"></script>
<script src="{!!asset('template/assets/js/init-scripts/data-table/datatables-init.js')!!}"></script>
<script src="{!!asset('template/vendors/bootstrap-datepicker.js')!!}"></script>
<script src="{!!asset('template/vendors/chosen/chosen.jquery.min.js')!!}"></script>
<script src="{!! asset('template/vendors/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('template/vendors/morrisjs/morris.min.js') !!}"></script>
<script src="{!! asset('template/vendors/morrisjs/morris-data.js') !!}"></script>
<script>
    var corps = {!!$corps!!}
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, Periode tidak ditemukan",
            width: "100%"
        });

        jQuery(".corpdetail").click(function() {
            var c;
            for (var i = 0; i < corps.length; i++) {
              if (corps[i].id == jQuery(this).val()) {
                c = corps[i];
              }
            };

            console.log(c)
            var token = jQuery('#token');
            console.log(token);

            jQuery("#corpprofile").text(c.profile);
            jQuery('#corpid').val(c.id);
        });
    });
</script>
<script>
    var donut
    jQuery(document).ready(function(){                                           
        jQuery('#periodIDs').change(function (){
            jQuery('#grafik-perusahaan').text('')
            getStatistic()
        })
    })
    
    function getStatistic(){        
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        
        var x = {}
        x['period'] = JSON.parse(jQuery('#periodIDs').val())        

        jQuery.ajax({
            type:'POST',
            url:"{{route('ajax.statistic')}}",
            data: x,
            success:function(res) {                                                        
                console.log(res)
                // console.log(res[0])
                // console.log(JSON.parse(res[0]))
                donut = new Morris.Donut({
                    element: 'grafik-perusahaan',                    
                    data: res[0]
                });
            }
        })
    }
</script>
@endsection
