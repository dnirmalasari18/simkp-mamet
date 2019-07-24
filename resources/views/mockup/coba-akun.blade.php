@extends('template.master')

@section('page-title')
Daftar Akun
@endsection
@section('additional-css')

<link rel="stylesheet" href="{!!secure_asset('template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!secure_asset('template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')!!}">
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row" style="margin-bottom:15px;">
            <div class="col-lg-12" >
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodalAkunTambah"style="float:right; width:25%;">Tambah Akun</button>
            </div>            
        </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-dosen-tab" data-toggle="tab" href="#nav-dosen" role="tab" aria-controls="nav-dosen" aria-selected="true">Dosen</a>
                                        <a class="nav-item nav-link" id="nav-mahasiswa-tab" data-toggle="tab" href="#nav-mahasiswa" role="tab" aria-controls="nav-mahasiswa" aria-selected="false">Mahasiswa</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-dosen" role="tabpanel" aria-labelledby="nav-dosen-tab">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered display">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align:middle">Nama</th>
                                                    <th style="vertical-align:middle">Kode</th>
                                                    <th style="vertical-align:middle">No HP</th>
                                                    <th style="vertical-align:middle">Banyak Membimbing</th>
                                                    <th style="vertical-align:middle">Banyak Membimbing Periode Aktif</th>
                                                    <th style="vertical-align:middle"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td style="vertical-align:middle">Radityo Anggoro</td>
                                                        <td style="vertical-align:middle">RA</td>
                                                        <td style="vertical-align:middle">081703313257</td>
                                                        <td style="vertical-align:middle">15</td>
                                                        <td style="vertical-align:middle">5</td>
                                                        <td style="vertical-align:middle">
                                                            <center>
                                                                <span style="display:block;">
                                                                    <button type="submit" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#scrollmodalAkunEdit"style="border-radius:3px; width:70px;">Edit</button>
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
                                    <div class="tab-pane fade" id="nav-mahasiswa" role="tabpanel" aria-labelledby="nav-mahasiswa-tab">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered display">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align:middle">NRP</th>
                                                    <th style="vertical-align:middle;">Nama Lengkap</th>
                                                    <th style="vertical-align:middle;">No HP</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td style="vertical-align:middle">05111640000115</td>
                                                        <td style="vertical-align:middle">Dewi Ayu Nirmalasari</td>
                                                        <td style="vertical-align:middle">081703313257</td>
                                                        <td style="vertical-align:middle; width:10%;">
                                                            <center>
                                                                <span style="display:block;">
                                                                    <button type="submit" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#scrollmodalAkunEdit"style="border-radius:3px; width:70px;">Edit</button>
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
            </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalAkunTambah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Milik</strong></label>
                    <select name="select" id="select" class="form-control">
                        <option value=""></option>
                        <option value="1">Dosen</option>
                        <option value="2">Mahasiswa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Kode Dosen/NRP</strong></label>
                    <input type="text" id="postal-code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Nama</strong></label>
                    <input type="text" id="postal-code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>No HP</strong></label>
                    <input type="test" id="postal-code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Password</strong></label>
                    <input type="password" id="postal-code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Konfirmasi Password</strong></label>
                    <input type="password" id="postal-code" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalAkunEdit" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Akun ((SAPA GITU)))</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Milik</strong></label>
                    <select name="select" id="select" class="form-control" disabled>
                        <option value=""></option>
                        <option value="1">Dosen</option>
                        <option value="2">Mahasiswa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Kode Dosen/NRP</strong></label>
                    <input type="text" id="postal-code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Nama</strong></label>
                    <input type="text" id="postal-code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>No HP</strong></label>
                    <input type="test" id="postal-code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Password</strong></label>
                    <input type="password" id="postal-code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Konfirmasi Password</strong></label>
                    <input type="password" id="postal-code" class="form-control">
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
<script>
    jQuery(document).ready(function() {
        console.log("Masuk")
        jQuery('table.display').DataTable();
    } );
</script>
@endsection