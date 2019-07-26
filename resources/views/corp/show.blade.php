@extends('template.master')

@section('page-title')
Detail Perusahaan
@endsection
@section('additional-css')
<link rel="stylesheet" href="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label><strong>Perusahaan</strong></label>
                                    <p style="color:#212529">{{$corp->name}}</p>
                                </div>
                                <div class="form-group">
                                    <label><strong>Jenis Bisnis</strong></label>
                                    <p style="color:#212529">{{$corp->type}}</p>
                                </div>
                                <div class="form-group">
                                    <label><strong>Telp Kantor</strong></label>
                                    <p style="color:#212529">{{$corp->phone_number}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><strong>Kota</strong></label>
                                    <p style="color:#212529">{{$corp->city}}</p>
                                </div>
                                <div class="form-group">
                                    <label><strong>Kode Pos</strong></label>
                                    <p style="color:#212529">{{$corp->post}}</p>
                                </div>
                                <div class="form-group">
                                    <label><strong>Profil</strong></label>
                                    <div style="height:8em;width:20em;padding:0.5em;margin:0.5em;border:1px solid black;overflow:auto;">
                                        {{$corp->profile}}
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12" style="background-color:#212529; height:1px;margin-bottom:1.5rem;"></div>
                        <div class="col-md-12">
                            <h3><strong>Catatan Tambahan</strong></h3>
                            @if (Auth::user()->role == 'koordinator')
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodalCatatanTambah" style="float:right;margin-bottom:20px;" >
                                    Tambah Catatan
                                </button>
                            @endif
                        </div>
                        <div class="col-md-12">
                                <table id="bootstrap-data-table-export display" class="table table-striped table-bordered">
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
                        <div class="col-md-12" style="background-color:#212529; height:1px;margin-bottom:1.5rem;"></div>
                        <div class="col-md-12">
                            <h3><strong>List Kelompok Periode Aktif</strong></h3>
                        </div>
                        <div class="col-md-12">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered display">
                                <thead>
                                    <tr>
                                        <th  style="vertical-align:middle;">Kelompok</th>
                                        <th  style="vertical-align:middle;">Perusahaan</th>
                                        <th  style="vertical-align:middle;">Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($corp->groups->where('period_id', App\Period::current()->id) as $group)
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
                                        @foreach ($corp->groups->sortBy('created_at') as $group)
                                        <tr>
                                            <td style="vertical-align:middle;">
                                                @foreach ($group->students as $student)
                                                    {{$student->username}} - {{$student->fullname}} <br>
                                                @endforeach
                                            </td>
                                            <td style="vertical-align:middle; width:300px;">
                                                {{$group->corp->name}} - {{$group->corp->city}}
                                            </td>
                                            <td style="vertical-align:middle; width:200px;">{{$group->period->name}}</td>
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
<div class="modal fade" id="scrollmodalCatatanTambah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('corp.note.create')}}" method="post">
                @csrf
                <input id="corpid" type="hidden" name="corp_id" value="{{$corp->id}}">
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
@endsection


@section('additional-js')
<script src="{!!secure_asset('public/template/vendors/datatables.net/js/jquery.dataTables.min.js')!!}"></script>
<script src="{!!secure_asset('public/template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')!!}"></script>
<script src="{!!secure_asset('public/template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')!!}"></script>
<script src="{!!secure_asset('public/template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')!!}"></script>
<script src="{!!secure_asset('public/template/vendors/datatables.net-buttons/js/buttons.html5.min.js')!!}"></script>
<script src="{!!secure_asset('public/template/vendors/datatables.net-buttons/js/buttons.print.min.js')!!}"></script>
<script src="{!!secure_asset('public/template/vendors/datatables.net-buttons/js/buttons.colVis.min.js')!!}"></script>
<script src="{!!secure_asset('public/template/assets/js/init-scripts/data-table/datatables-init.js')!!}"></script>

<script>
    jQuery(document).ready(function(){
        jQuery('table.display').DataTable();
    })
</script>


@endsection
