@extends('template.master')

@section('page-title')
Detail Dosen
@endsection
@section('additional-css')
<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')!!}">
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Nama</strong></label></div>
                                <p style="color:#212529">{{$lecturer->fullname}}</p>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>NIP</strong></label></div>
                                <p style="color:#212529">{{$lecturer->username}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>No HP</strong></label></div>
                                <p style="color:#212529">{{$lecturer->phone_number}}</p>
                            </div>
                        </div>
                        <div class="col-md-12" style="background-color:#212529; height:1px;margin-bottom:1.5rem;"></div>
                        <div class="col-md-12">
                            <h3><strong>List Kelompok Periode Aktif</strong></h3>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodalKelompokTambah" style="float:right;margin-bottom:20px;" >
                                Tambah Kelompok
                            </button>
                        </div>
                        <div class="col-md-12">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th  style="vertical-align:middle;">Kelompok</th>
                                        <th  style="vertical-align:middle;">Perusahaan</th>
                                        <th  style="vertical-align:middle;">Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lecturer->lecturing->where('period_id', App\Period::current()) as $group)
                                        <tr>
                                            <td style="vertical-align:middle;">
                                                @foreach ($group->students as $student)
                                                    {{$student->username}} - {{$student->fullname}} <br>
                                                @endforeach
                                            </td>
                                            <td style="vertical-align:middle; width:300px;">
                                                {{$group->corp->name}} - {{$group->corp->city}}
                                            </td>
                                            <td style="vertical-align:middle; width:200px;">{{$group->status['desc']}}</td>
                                            <td>
                                                <center>
                                                    <a href="{{route('group.show', $group->id)}}">
                                                        <button type="button" class="btn btn-primary" style="border-radius:3px;" >
                                                            Lihat
                                                        </button>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12" style="background-color:#212529; height:1px; margin-top:1.5rem;margin-bottom:1.5rem;"></div>
                        <div class="col-md-12">
                            <h3 style="margin-bottom:10px;"><strong>List Kelompok Semua Periode</strong></h3>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered display">
                                <thead>
                                    <tr>
                                        <th  style="vertical-align:middle;">Kelompok</th>
                                        <th  style="vertical-align:middle;">Perusahaan</th>
                                        <th  style="vertical-align:middle;">Periode</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($lecturer->lecturing as $group)
                                        <tr>
                                            <td style="vertical-align:middle;">
                                                @foreach ($group->students as $student)
                                                    {{$student->username}} - {{$student->fullname}} <br>
                                                @endforeach
                                            </td>
                                            <td style="vertical-align:middle; width:300px;">
                                                {{$group->corp->name}} - {{$group->corp->city}}
                                            </td>
                                            <td style="vertical-align:middle; width:200px;">{{$group->status['desc']}}</td>
                                            <td>
                                                <center>
                                                    <a href="{{route('group.show', $group->id)}}">
                                                        <button type="button" class="btn btn-primary" style="border-radius:3px;" >
                                                            Lihat
                                                        </button>
                                                    </a>
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
    </div><!-- .animated -->
</div><!-- .content -->
<div class="modal fade" id="scrollmodalKelompokTambah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('lecturer.assign')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$lecturer->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Pilih Dosbing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered display">
                        <thead>
                            <tr>
                                <th style="vertical-align:middle"></th>
                                <th  style="vertical-align:middle;">Kelompok</th>
                                <th  style="vertical-align:middle;">Perusahaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                            @foreach (App\Group::where('period_id', App\Period::current()->id)->where('lecturer_id', null)->get() as $group)
                                <tr>
                                    <td style="vertical-align:middle"><center><input type="checkbox" id="checkbox1" name="groups[{{$i++}}]" value="{{$group->id}}"></center></td>
                                    <td style="vertical-align:middle;">
                                        @foreach ($group->students as $student)
                                            {{$student->username}} - {{$student->fullname}} <br>
                                        @endforeach
                                    </td>
                                    <td style="vertical-align:middle; width:300px;">
                                        {{$group->corp->name}} - {{$group->corp->city}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
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

<script>
    jQuery(document).ready(function(){
        jQuery('table.display').DataTable();
    })
</script>


@endsection
