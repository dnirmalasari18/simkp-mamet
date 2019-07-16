@extends('template.master')

@section('page-title')
Kelompok
@endsection
@section('additional-css')

<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')!!}">
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Kelompok Periode Ini</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle; width:200px;">Status</th>
                                    <th style="vertical-align: middle;">Periode</th>
                                    <th style="vertical-align: middle;">Peserta</th>
                                    <th style="vertical-align: middle;">Perusahaan</th>
                                    <th style="vertical-align: middle;">Jenis Kelompok</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{{strtoupper($group->status['name'])}}</td>
                                        <td style="vertical-align: middle;">{{$group->period->name}}</td>
                                        <td style="vertical-align: middle;">
                                            @foreach ($group->students as $student)
                                                {{$student->username}} - {{$student->fullname}} <br>
                                            @endforeach
                                        </td>
                                        <td style="vertical-align: middle;">{{$group->corp->name}}</td>
                                        <td style="vertical-align: middle;">{{ucwords($group->type['name'])}}</td>
                                        <td style="vertical-align: middle;">
                                            <center><a href="{{route('group.show', ['id' => $group->id])}}"><button type="button" class="btn btn-primary btn-sm" style="border-radius:3px;">Lihat</button></a></center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if (Auth::user()->role == 'dosen')
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Kelompok Semua Periode</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle; width:200px;">Status</th>
                                    <th style="vertical-align: middle;">Periode</th>
                                    <th style="vertical-align: middle;">Peserta</th>
                                    <th style="vertical-align: middle;">Perusahaan</th>
                                    <th style="vertical-align: middle;">Jenis Kelompok</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->lecturing->sortBy('created_at') as $group)
                                    <tr>
                                        <td>{{strtoupper($group->status['name'])}}</td>
                                        <td style="vertical-align: middle;">{{$group->period->name}}</td>
                                        <td style="vertical-align: middle;">
                                            @foreach ($group->students as $student)
                                                {{$student->username}} - {{$student->fullname}} <br>
                                            @endforeach
                                        </td>
                                        <td style="vertical-align: middle;">{{$group->corp->name}}</td>
                                        <td style="vertical-align: middle;">{{ucwords($group->type['name'])}}</td>
                                        <td style="vertical-align: middle;">
                                            <center><a href="{{route('group.show', ['id' => $group->id])}}"><button type="button" class="btn btn-primary btn-sm" style="border-radius:3px;">Lihat</button></a></center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div><!-- .animated -->
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
