@extends('template.master')

@section('page-title')
Statistik
@endsection
@section('additional-css')

<link rel="stylesheet" href="{!!secure_asset('template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!secure_asset('template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!secure_asset('template/vendors/chosen/chosen.min.css')!!}">
<link rel="stylesheet" href="{!!secure_asset('template/vendors/bootstrap-datepicker.css')!!}">
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
                                                <select data-placeholder="Pilih Periode" class="standardSelect" tabindex="1">
                                                    <option value="">Semua Periode</option>
                                                    <option value="1">1 Tahun Terakhir</option>
                                                    <option value="2">3 Tahun Terakhir</option>
                                                    <option value="3">5 Tahun Terakhir</option>
                                                    <option value="4">2015/2016 Gasal</option>
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
                                                    <tr>
                                                        <td style="vertical-align:middle">ABC</td>
                                                        <td style="vertical-align:middle">Bangunan</td>
                                                        <td style="vertical-align:middle">Jl. Wisma Permai</td>
                                                        <td style="vertical-align:middle">Surabaya</td>
                                                        <td style="vertical-align:middle">03141414141</td>
                                                        <td style="vertical-align:middle;width:12%">
                                                            <center>
                                                                <span style="display:block;">
                                                                    <button type="submit" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#scrollmodalDetailLihat"style="border-radius:3px;">Lihat Detail</button>
                                                                </span>
                                                            </center>
                                                        </td>
                                                    </tr>                                             
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
                            2015/2016 Gasal<br>
                            2015/2016 Gasal<br>
                            2015/2016 Gasal<br>
                            2015/2016 Gasal<br>
                            2015/2016 Gasal<br>
                            2015/2016 Gasal<br>
                            2015/2016 Gasal<br>
                            2015/2016 Gasal<br>
                            2015/2016 Gasal<br>
                            2015/2016 Gasal<br>

                        </div> 
                        <div class="col col-md-4"><label class=" form-control-label"><strong>Total Kelompok Pernah KP</strong></label></div>
                        <div>100</div> 
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row form-group">
                        <div class="col col-md-4"><label class=" form-control-label"><strong>Profil</strong></label></div>
                        <div style="height:10em;padding:0.5em;margin:0.5em;border:1px solid black;overflow:auto;">
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
                        <tr>
                            <td style="vertical-align:middle">22/22/2222</td>
                            <td style="vertical-align:middle">Cuma disuruh bikin kopi</td>
                            <td style="vertical-align:middle;width:10%;">
                                <center>
                                    <span style="display:block; padding-block:5px; ">
                                        <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px; width:70px;">Hapus</button>
                                    </span>
                                </center>
                            </td>
                        </tr>
                        <tr>
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
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Tambah Catatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Tanggal</strong></label>
                    <input type="Date" id="postal-code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Catatan</strong></label>
                    <textarea name="textarea-input" id="textarea-input" rows="3"  class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional-js')
<script src="{!!secure_asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-buttons/js/buttons.colVis.min.js')!!}"></script>
<script src="{!!secure_asset('template/assets/js/init-scripts/data-table/datatables-init.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/bootstrap-datepicker.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/chosen/chosen.jquery.min.js')!!}"></script>
<script src="{!! asset('template/vendors/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('template/vendors/morrisjs/morris.min.js') !!}"></script>
<script src="{!! asset('template/vendors/morrisjs/morris-data.js') !!}"></script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, Periode tidak ditemukan",
            width: "100%"
        });
    });
</script>
<script>
    new Morris.Donut({
        element: 'grafik-perusahaan',
        data: [
            { label: 'Pertamina', value: 10 },
            { label: 'Pertamax', value: 5 },
            { label: 'Jastip', value: 3 },
            { label: 'Starbux', value: 3 },
            { label: 'Aksamedia', value: 4 },
            { label: '9gag', value: 13 },
            { label: 'Dosilasol ', value: 3 },
        ]
    
    });
</script>
@endsection