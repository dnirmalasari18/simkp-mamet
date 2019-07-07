@extends('template.master')

@section('page-title')
Berita
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
    </div>
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

<div class="content ">
    <div class="animated fadeIn">
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
                                            <th>Tahun Ajar</th>
                                            <th><center>Tanggal Mulai Semester</center></th>
                                            <th><center>Tanggal Akhir Semester</center></th>
                                            <th><center>Batas Akhir Pengajuan</center></th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2019/2020 Gasal</td>
                                            <td><center>07/01/2019</center></td>
                                            <td><center>31/01/2019</center></td>
                                            <td><center>09/01/2019</center></td>
                                            <td><center><span class="badge badge-success">active</span></center></td>
                                            <td><i class="fa fa-trash-o" style="color:red"></i></td>
                                        </tr>
                                        <tr>
                                            <td>2019/2020 Gasal</td>
                                            <td><center>07/01/2019</center></td>
                                            <td><center>31/01/2019</center></td>
                                            <td><center>09/01/2019</center></td>
                                            <td><center><span class="badge badge-secondary">inactive</span></center></td>
                                            <td><i class="fa fa-trash-o" style="color:red"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection
