@extends('template.master')

@section('page-title')
Daftar Akun
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
                <button type="button" class="btn btn-primary" style="float:right; width:25%;">Tambah Akun</button>
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
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nama Lengkap</th>
                                                    <th>Kode</th>
                                                    <th>Banyak Membimbing</th>
                                                    <th>Banyak Membimbing Periode Aktif</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Dr. Radityo Anggoro , S.Kom, M.Sc.</td>
                                                    <td>RA</td>
                                                    <td>15</td>
                                                    <td>5</td>
                                                    <td>
                                                        <i class="fa fa-pencil-square-o" style="color:blue;"></i>
                                                        <i class="fa fa-trash" style="color:red"></i>
                                                    </td>
                                                </tr>                    
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="nav-mahasiswa" role="tabpanel" aria-labelledby="nav-mahasiswa-tab">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>NRP</th>
                                                    <th>Nama Lengkap</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>05111640000129</td>
                                                    <td>Frandita Adhitama</td>
                                                    <td>
                                                        <center>
                                                            <i class="fa fa-pencil-square-o" style="color:blue;"></i>
                                                            <i class="fa fa-trash" style="color:red"></i>
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