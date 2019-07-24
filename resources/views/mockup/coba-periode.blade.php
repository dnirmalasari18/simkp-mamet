@extends('template.master')

@section('page-title')
Periode
@endsection

@section('additional-css')

<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')!!}">
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row" style="margin-bottom:15px;">
            <div class="col-lg-12" >
                <button type="button" class="btn btn-primary" style="float:right; width:25%;" data-toggle="modal" data-target="#scrollmodalTambah">
                    Tambah Periode
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Periode</strong>
                    </div>
                    <div class="card-body">
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
    </div><!-- .animated -->
</div>
<div class="modal fade" id="scrollmodalTambah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Form Periode Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Tahun Ajaran</strong></label>
                    <input type="text" id="postal-code"  class="form-control">
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label">
                                <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input">Gasal
                            </label>
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input" style="margin-left:50px">Genap
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Tanggal Mulai Semester</strong></label>
                    <input type="date" id="postal-code" placeholder="Tanggal Mulai Semester" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Tanggal Akhir Semester</strong></label>
                    <input type="date" id="postal-code" placeholder="Tanggal Akhir Semester" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Batas Akhir Pengajuan</strong></label>
                    <input type="date" id="postal-code" placeholder="Batas Akhir Pengajuan" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalEdit" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">((Periode berapa))</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Tahun Ajaran</strong></label>
                    <input type="text" id="postal-code" placeholder="Tahun Ajaran" class="form-control">
                </div>
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label">
                                <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input">Gasal
                            </label>
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input" style="margin-left:50px">Genap
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Tanggal Mulai Semester</strong></label>
                    <input type="date" id="postal-code" placeholder="Tanggal Mulai Semester" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Tanggal Akhir Semester</strong></label>
                    <input type="date" id="postal-code" placeholder="Tanggal Akhir Semester" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Batas Akhir Pengajuan</strong></label>
                    <input type="date" id="postal-code" placeholder="Batas Akhir Pengajuan" class="form-control">
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
<script src="{!!asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.colVis.min.js')!!}"></script>
<script src="{!!asset('template/assets/js/init-scripts/data-table/datatables-init.js')!!}"></script>
@endsection