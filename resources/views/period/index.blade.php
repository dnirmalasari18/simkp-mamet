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
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">List Periode</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tahun Ajar</th>
                                        <th><center>Banyak KP</center></th>
                                        <th><center>Banyak Magang</center></th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periods as $period)
                                        <tr>
                                            <td>{{$period->name}}</td>
                                            <td><center>20</center></td>
                                            <td><center>5</center></td>
                                            <td><center><span class="badge badge-success">
                                                @if ($period->active)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </span></center></td>
                                        </tr>
                                    @endforeach
                                                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                        <div class="card">
                            <div class="card-header"><strong> Periode</strong></div>
                            <div class="card-body card-block">
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
                                <div class="form-actions form-group" style="float:right;">
                                    <button type="submit" class="btn btn-primary btn-sm" style="width:150px;">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div><!-- .animated -->
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