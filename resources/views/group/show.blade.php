@extends('template.master')

@section('page-title')
Detail Kelompok
@endsection
@section('additional-css')

<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/chosen/chosen.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/bootstrap-datepicker.css')!!}">
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
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Jenis Pengajuan</strong></label></div>
                                <p style="color:#212529">{{ucwords($group->type['desc'])}}</p>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Peserta</strong></label></div>
                                <p style="color:#212529">
                                    @foreach ($group->students as $student)
                                        {{$student->username}} - {{$student->fullname}}
                                        <br>
                                    @endforeach
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Bukti Penerimaan</strong></label></div>
                                <p style="color:#212529">
                                    @if (Auth::user()->role != 'dosen')
                                        <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#scrollmodalUploadBukti"style="line-height:1;border-radius:3px;">Upload</button>
                                    @endif
                                    @if($group->proof_path != null)
                                        <button type="submit" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#scrollmodalLihatBukti"style="line-height:1;border-radius:3px;">Lihat</button>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Status</strong></label></div>
                                <p style="color:#212529">{{ucwords($group->status['desc'])}}<br>
                                    <span style="display:block;">
                                        @if (Auth::user()->role == 'koordinator')
                                            <button type="submit" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#scrollmodalStatus"style="line-height:1;border-radius:3px;">Update</button>
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4">
                                    <label class=" form-control-label">
                                        <strong>Pembimbing</strong><br>
                                        @if ($group->lecturer != null)
                                            <strong>NIP</strong><br>
                                            <strong>Nomor HP</strong>
                                        @endif
                                    </label>
                                </div>
                                @if ($group->lecturer != null)
                                    <p style="color:#212529">
                                        {{$group->lecturer->fullname}}<br>
                                        {{$group->lecturer->username}}<br>
                                        {{$group->lecturer->phone_number}}
                                    </p>
                                @else
                                    <p style="color:#212529">-<br></p>
                                @endif
                                    <span style="display:block;">
                                        @if (Auth::user()->role == 'koordinator')
                                            <button type="submit" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#scrollmodalDosenPembimbing"style="line-height:1;border-radius:3px;">Update</button>
                                        @endif
                                    </span>
                                </p>
                            </div>
                            @if (Auth::user()->role == 'koordinator')
                                <div class="row form-group">
                                    <div class="col col-md-4"><label class=" form-control-label"><strong>Nilai</strong></label></div>
                                    <p style="color:#212529">
                                        <button type="submit" class="btn btn-primary btn-sm"data-toggle="modal" data-target="#scrollmodalNilaiLihat" style="line-height:1;border-radius:3px;">Lihat</button>
                                    </p>
                                </div>
                            @endif
                            @if (Auth::user()->role == 'dosen' && $group->reports->count() == $group->reports->where('status', App\Report::statusAll()[1])->count())
                                <div class="row form-group">
                                    <div class="col col-md-4"><label class=" form-control-label"><strong>Nilai</strong></label></div>
                                    <p style="color:#212529">
                                        <button type="submit" class="btn btn-primary btn-sm"data-toggle="modal" data-target="#scrollmodalNilaiLihat" style="line-height:1;border-radius:3px;">Lihat</button>
                                    </p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12" style="background-color:#212529; height:1px; margin-top:1.5rem; margin-bottom:1.5rem"></div>
                        <div class="col-md-4" >
                            <div class="form-group">
                                <label><strong>Perusahaan</strong></label>
                                <p style="color:#212529">{{$group->corp->name}}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Jenis Bisnis</strong></label>
                                <p style="color:#212529">{{$group->corp->type}}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Profil</strong></label>
                                <div style="height:8em;width:20em;padding:0.5em;margin:0.5em;border:1px solid black;overflow:auto;">
                                    {{$group->corp->profile}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Kota</strong></label>
                                <p style="color:#212529">{{$group->corp->city}}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Kode Pos</strong></label>
                                <p style="color:#212529">{{$group->corp->post}}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Telp Kantor</strong></label>
                                <p style="color:#212529">{{$group->corp->phone_number}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong>Tanggal Mulai</strong></label>
                                <p style="color:#212529">{{$group->start_date}}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Tanggal Berakhir</strong></label>
                                <p style="color:#212529">{{$group->end_date}}</p>
                            </div>
                        </div>
                        <div class="col-md-12" style="background-color:#212529; height:1px; margin-top:1.5rem; margin-bottom:1.5rem"></div>
                        <div class="col-md-12">
                            <h3><strong>Log KP</strong></h3>
                            @if (Auth::user()->role == 'mahasiswa')
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodalLogTambah" style="float:right;margin-bottom:20px;" >
                                    Tambah Log
                                </button>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <form action="{{route('lecturer.log.accept')}}" method="post">
                                @csrf
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th  style="vertical-align:middle;width:40px;">Status</th>
                                            <th  style="vertical-align:middle;width:150px;">Tanggal Upload</th>
                                            <th  style="vertical-align:middle;">Judul Log</th>
                                            <th  style="vertical-align:middle;width:150px;"><center>File</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0?>
                                            @foreach ($group->reports as $report)
                                                <tr>
                                                    <td style="vertical-align:middle;">
                                                        @if ($report->status['status'] == 0 && Auth::user()->role == 'dosen')
                                                            <center><input type="checkbox" id="checkbox1" name="reports[{{$i++}}]" value="{{$report->id}}"></center>
                                                        @else
                                                            {{$report->status['name']}}
                                                        @endif
                                                    </td>
                                                    <td style="vertical-align:middle;">{{$report->created_at}}</td>
                                                    <td style="vertical-align:middle;">{{$report->title}}</td>
                                                    <td>
                                                        <center>
                                                            <span style="display:block; padding-block:5px; ">
                                                                <a href="{{Storage::url($report->path)}}"><button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px;">Download</button></a>
                                                            </span>
                                                        </center>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px;">Setujui Log</button>
                            </form>
                        </div>
                        <div class="col-md-12" style="background-color:#212529; height:1px; margin-top:1.5rem;margin-bottom:1.5rem;"></div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <h3><strong>Maju Seminar</strong></h3>
                                <div class="alert alert-warning" role="alert" style="margin-top:1rem; font-size:115%">
                                    Kelompok terkait belum mensubmit <strong>judul</strong> dan <strong>abstraksi</strong> pada website!
                                </div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodalJuduldanAbstrak" style="float:right;margin-bottom:20px;" >
                                    Submit Judul dan Abstraksi
                                </button>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><strong>Judul</strong></label>
                                    <div style="height:3em;width:100%;padding:0.5em;margin:0.5em;border:1px solid black;overflow:auto;">
                                        {{$group->title}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Abstraksi</strong></label>
                                    <div style="height:15em;width:100%;padding:0.5em;margin:0.5em;border:1px solid black;overflow:auto;">
                                        {{$group->abstract}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->role == 'koordinator')
        <div class="row" style="margin-bottom:15px;">
            <div class="col-lg-12" >
                <button type="button" class="btn btn-danger"  style="float:right;" >
                    Hapus Pengajuan
                </button>
            </div>
        </div>
        @endif
    </div><!-- .animated -->
</div><!-- .content -->
@if (Auth::user()->roler != 'dosen')
    <div class="modal fade" id="scrollmodalUploadBukti" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('proof.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$group->id}}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollmodalLabel">Update Bukti Penerimaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col col-md-5"><label for="postal-code" class=" form-control-label"><strong>Bukti Penerimaan </strong></label></div>
                            <input name="file" type="file" id="fileAdd"/>
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
@endif
<div class="modal fade" id="scrollmodalLihatBukti" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Lihat Bukti Penerimaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <img src="{{Storage::url($group->proof_path)}}" alt="">
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalStatus" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('status.update')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$group->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                        <div class="col-12 col-md-9">
                            <select name="status" id="select" class="form-control">
                                <option value=""></option>
                                @foreach (App\Group::statusAll() as $status)
                                    <option value="{{$status['status']}}">{{ucwords($status['desc'])}}</option>
                                @endforeach
                            </select>
                        </div>
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
<div class="modal fade" id="scrollmodalDosenPembimbing" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('lecturer.group.assign')}}" method="post">
                @csrf
                <input type="hidden" name="group_id" value="{{$group->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Pilih Dosen Pembimbing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered display">
                        <thead>
                            <tr>
                                <th style="vertical-align:middle"></th>
                                <th style="vertical-align:middle">Nama</th>
                                <th style="vertical-align:middle">NIP</th>
                                <th style="vertical-align:middle">Banyak Membimbing</th>
                                <th style="vertical-align:middle">Banyak Membimbing Periode Aktif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lecturers as $lecturer)
                                <tr>
                                    <td style="vertical-align:middle"><center><input type="radio" id="radio1" name="lecturer_id" value="{{$lecturer->id}}" @if ($group->lecturer_id == $lecturer->id) checked @endif></center></td>
                                    <td style="vertical-align:middle">{{$lecturer->fullname}}</td>
                                    <td style="vertical-align:middle">{{$lecturer->username}}</td>
                                    <td style="vertical-align:middle">{{$lecturer->lecturing->count()}}</td>
                                    <td style="vertical-align:middle">{{$lecturer->lecturing->where('period_id', App\Period::current()->id)->count()}}</td>
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
<div class="modal fade" id="scrollmodalNilaiLihat" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('valuation.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Nilai KP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th  style="vertical-align:middle">NRP</th>
                                <th  style="vertical-align:middle">Nama</th>
                                @if (Auth::user()->role == 'koordinator')
                                    <th style="vertical-align:middle"><center>Lapangan</center></th>
                                @endif
                                <th style="vertical-align:middle"><center>Dosen Pembimbing</center></th>
                                @if (Auth::user()->role == 'koordinator')
                                    <th style="vertical-align:middle"><center>Koordinator</center></th>
                                    <th style="vertical-align:middle"><center>Kedisiplinan</center></th>
                                    <th style="vertical-align:middle"><center>NA</center></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach ($group->studentsdetails as $student)
                                <input type="hidden" name="id[{{$i}}]" value="{{$student->id}}">
                                <tr>
                                    <td style="vertical-align:middle">{{$student->user->username}}</td>
                                    <td style="vertical-align:middle">{{$student->user->fullname}}</td>
                                    @if (Auth::user()->role == 'koordinator')
                                    <td style="vertical-align:middle">
                                        <center>
                                            <input type="text" id="text-input" name="valuation_1[{{$i}}]" class="form-control" value="{{$student->valuation_1}}">
                                        </center>
                                    </td>
                                    @endif
                                    <td style="vertical-align:middle">
                                        <center>
                                            <input type="text" id="text-input" name="valuation_2[{{$i}}]" class="form-control" value="{{$student->valuation_2}}">
                                        </center>
                                    </td>
                                    @if (Auth::user()->role == 'koordinator')
                                    <td style="vertical-align:middle">
                                        <center>
                                            <input type="text" id="text-input" name="valuation_3[{{$i}}]" class="form-control" value="{{$student->valuation_3}}">
                                        </center>
                                    </td>
                                    <td style="vertical-align:middle">
                                        <center>
                                            <input type="text" id="text-input" name="valuation_4[{{$i}}]" class="form-control" value="{{$student->valuation_4}}">
                                        </center>
                                    </td>
                                    <td style="vertical-align:middle">
                                        <center>
                                            @if ($student->valuation != null)
                                                {{$student->valuation}}
                                            @else
                                                -
                                            @endif
                                        </center>
                                    </td>
                                    @endif
                                </tr>
                                <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalLogTambah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('report.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$group->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Log Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col col-md-5"><label for="postal-code" class=" form-control-label"><strong>Judul Log</strong></label></div>
                    </div>
                    <div class="form-group">                        
                        <div class="col-12 col-md-9">
                            <select name="status" id="select" class="form-control">
                                <option value=""></option>
                                @foreach (App\Group::statusAll() as $status)
                                    <option value="{{$status['status']}}">{{ucwords($status['desc'])}}</option>
                                @endforeach
                            </select>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <div class="col col-md-5"><label for="postal-code" class=" form-control-label"><strong>Dokumen</strong></label></div>
                        <input name="file" type="file" id="fileAdd"/>
                        <small class="form-text text-muted">Format .doc</small>
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
<div class="modal fade" id="scrollmodalJuduldanAbstrak" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{route('abstract.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$group->id}}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scrollmodalLabel">Judul dan Abstraksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert" style="font-size:115%">
                            <strong>Judul</strong> dan <strong>Abstraksi</strong> setelah disimpan tidak akan bisa diubah kembali.<br>
                                Harap menghubungi <strong>Ka Sie KP</strong> jika ada kesulitan.
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong>Judul</strong></label>
                                <textarea name="title" id="textarea-input" rows="1" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label><strong>Abstraksi</strong></label>
                                <textarea name="abstract" id="textarea-input" rows="9" class="form-control"></textarea>
                            </div>
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
<script src="{!!asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.colVis.min.js')!!}"></script>
<script src="{!!asset('template/assets/js/init-scripts/data-table/datatables-init.js')!!}"></script>
<script src="{!!asset('template/vendors/bootstrap-datepicker.js')!!}"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('table.display').dataTable();
    })
</script>
@endsection
