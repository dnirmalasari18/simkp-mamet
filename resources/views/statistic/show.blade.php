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
                                                <select id="periodIDs" name="" data-placeholder="Pilih Periode" class="standardSelect" tabindex="1">
                                                    <option value="{&quot;IDs&quot; : [1,2]}">Periode Ini</option>
                                                    <option value="{[2]}">1 Tahun Terakhir</option>
                                                    <option value="{[3]}">3 Tahun Terakhir</option>
                                                    <option value="{[4]}">5 Tahun Terakhir</option>
                                                    <option value="{[5]}">2015/2016 Gasal</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px; width:100px; margin-left:10px;height:1.54rem;padding:.1rem.5rem;margin-left:0;">Submit</button>
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
<div class="modal fade" id="scrollmodalDetailLihat" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Detail Perusahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row form-group">
                        <div class="col col-md-2"><label class=" form-control-label"><strong>Peserta</strong></label></div>
                        <div style="height:6em;width:15em;padding:0.5em;margin:0.5em;border:1px solid black;overflow:auto;">
                            @foreach (App\Period::orderBy('created_at')->get() as $period)
                                {{$period->name}}<br>
                            @endforeach
                        </div>
                        <div class="col col-md-4"><label class=" form-control-label"><strong>Total Kelompok Pernah KP</strong></label></div>
                        <div>{{$corp->groups->count()}}</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row form-group">
                        <div class="col col-md-4"><label class=" form-control-label"><strong>Profil</strong></label></div>
                        <div id="corpprofile" style="height:10em;padding:0.5em;margin:0.5em;border:1px solid black;overflow:auto;">
                            But I must explain to you how all this mistaken idea of denouncing
                            pleasure and praising pain was born and I will give you a complete account
                            of the system, and expound the actual teachings of the great explorer of
                            the truth, the master-builder of human happiness. No one rejects,
                            dislikes, or avoids pleasure itself, because it is pleasure, but because
                            those who do not know how to pursue pleasure rationally encounter
                            consequences that are extremely painful. Nor again is there anyone who
                            loves or pursues or desires to obtain pain of itself, because it is pain,
                            but because occasionally circumstances occur in which toil and pain can
                            procure him some great pleasure. To take a trivial example, which of us
                            ever undertakes laborious physical exercise, except to obtain some
                            advantage from it? But who has any right to find fault with a man who
                            chooses to enjoy a pleasure that has no annoying consequences, or one who
                            avoids a pain that produces no resultant pleasure?
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="background-color:#212529; height:1px;"></div>
                <label style="margin-top:20px;font-size:1.5em"><strong>Catatan</strong></label>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodalCatatanTambah" style="float:right;margin-bottom:10px;margin-top:20px;" >
                    Tambah Catatan
                </button>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th  style="vertical-align:middle">Tanggal Catatan</th>
                            <th  style="vertical-align:middle">Catatan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($corp->notes as $note)
                            <tr>
                                <td style="vertical-align:middle">{{$note->created_at}}</td>
                                <td style="vertical-align:middle">{{$note->detail}}</td>
                                <td style="vertical-align:middle;width:10%;">
                                    <center>
                                        <span style="display:block; padding-block:5px; ">
                                            <form action="{{route('corp.note.delete')}}" method="post">
                                                @csrf
                                                <input id="noteid" type="hidden" name="id" value="{{$note->id}}">
                                                <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px; width:70px;">Hapus</button>
                                            </form>
                                        </span>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalCatatanTambah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('corp.note.create')}}" method="post">
                @csrf
                <input id="corpid" type="hidden" name="corp_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Tambah Catatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Catatan</strong></label>
                        <textarea name="detail" id="textarea-input" rows="3"  class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
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
    jQuery(document).ready(function(){
        var data = [
                    { label: 'Pertamina', value: 10 },
                    { label: 'Pertamax', value: 5 },
                    { label: 'Jastip', value: 3 },
                    { label: 'Starbux', value: 3 },
                    { label: 'Aksamedia', value: 4 },
                    { label: '9gag', value: 13 },
                    { label: 'Dosilasol ', value: 3 },
                ]

        console.log(data)
        
        getStatistic()
    })
    
    function getStatistic(){        
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        
        var x = {}
        x['period'] = JSON.parse(jQuery('#periodIDs').val())
        // x['period'] = jQuery('#periodIDs').val()

        jQuery.ajax({
            type:'POST',
            url:"{{route('ajax.statistic')}}",
            data: x,
            success:function(res) {                                                        
                console.log(res)
                // console.log(res[0])
                // console.log(JSON.parse(res[0]))
                new Morris.Donut({
                    element: 'grafik-perusahaan',                    
                    data: res[0]
                });
            }
        })
    }    
</script>
@endsection
