@extends('template.master')

@section('page-title')
Nilai Integra
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
                        <div class="card-header">
                            <strong class="card-title">Periode xxxx</strong>
                        </div>
                        <div class="card-body">
                            <div class="row" style="margin-bottom:3rem;">
                                <div class="col-md-4">
                                    <select data-placeholder="Pilih Periode" class="standardSelect" tabindex="1">
                                        <option value="4">2015/2016 Gasal</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px; width:100px; margin-left:10px;height:1.54rem;padding:.1rem.5rem;margin-left:0;">Submit</button>
                                </div>
                            </div>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th  style="vertical-align:middle">Tahun Ajar</th>
                                    <th  style="vertical-align:middle"><center>Tanggal Mulai Semester</center></th>
                                    <th style="vertical-align:middle"><center>Tanggal Akhir Semester</center></th>
                                    <th style="vertical-align:middle"><center>Batas Akhir Pengajuan</center></th>
                                    <th style="vertical-align:middle">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="vertical-align:middle">2019/2020 Gasal</td>
                                    <td style="vertical-align:middle"><center>07/01/2019</center></td>
                                    <td style="vertical-align:middle"><center>31/01/2019</center></td>
                                    <td style="vertical-align:middle"><center>09/01/2019</center></td>
                                    <td style="vertical-align:middle"><center><span class="badge badge-success">active</span></center></td>
                                    <td style="vertical-align:middle">
                                        <center>
                                            <span style="display:block;">
                                                <button type="submit" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#scrollmodalEdit" style="border-radius:3px; width:62px;">Edit</button>
                                            </span>
                                            <span style="display:block; padding-block:5px; ">
                                                <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px; width:62px;c">Hapus</button>
                                            </span>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle">2019/2020 Gasal</td>
                                    <td style="vertical-align:middle"><center>07/01/2019</center></td>
                                    <td style="vertical-align:middle"><center>31/01/2019</center></td>
                                    <td style="vertical-align:middle"><center>09/01/2019</center></td>
                                    <td style="vertical-align:middle"><center><span class="badge badge-secondary">inactive</span></center></td>
                                    <td style="vertical-align:middle">
                                        <center>
                                            <span style="display:block;margin-bottom:5px;">
                                                <button type="submit" class="btn btn-success btn-sm" style="border-radius:3px; width:70px; ">Aktifkan</button>
                                            </span>
                                            <span style="display:block;">
                                                <button type="submit" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#scrollmodalEdit"style="border-radius:3px; width:70px;">Edit</button>
                                            </span>
                                            <span style="display:block; padding-block:5px; ">
                                                <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px; width:70px;">Hapus</button>
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
<script src="{!!asset('template/vendors/chosen/chosen.jquery.min.js')!!}"></script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, Periode tidak ditemukan",
            width: "100%"
        });
    });
} );
</script>
@endsection