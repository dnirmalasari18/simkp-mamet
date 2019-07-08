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
                                <p style="color:#212529">{{ucwords($group->type)}}</p>
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
                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#scrollmodalUploadBukti"style="line-height:1;border-radius:3px;">Upload</button>
                                    <button type="submit" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#scrollmodalLihatBukti"style="line-height:1;border-radius:3px;">Lihat</button>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Status</strong></label></div>
                                <p style="color:#212529">{{ucwords($group->status)}}<br>
                                    <span style="display:block;">
                                        <button type="submit" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#scrollmodalStatus"style="line-height:1;border-radius:3px;">Update</button>
                                    </span>
                                </p>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Dosen Pembimbing</strong></label></div>
                                <p style="color:#212529">-<br>
                                    <span style="display:block;">
                                        <button type="submit" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#scrollmodalDosbing"style="line-height:1;border-radius:3px;">Update</button>
                                    </span>
                                </p>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4"><label class=" form-control-label"><strong>Nilai</strong></label></div>
                                <p style="color:#212529">
                                    <button type="submit" class="btn btn-primary btn-sm"data-toggle="modal" data-target="#scrollmodalNilaiLihat" style="line-height:1;border-radius:3px;">Lihat</button>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12" style="background-color:#212529; height:1px;"></div>
                        <div class="col-md-4" style="margin-top:10px;">
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
                        <div class="col-md-4" style="margin-top:10px;">
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
                        <div class="col-md-4"  style="margin-top:10px;">
                            <div class="form-group">
                                <label><strong>Tanggal Mulai</strong></label>
                                <p style="color:#212529">{{$group->start_date}}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Tanggal Berakhir</strong></label>
                                <p style="color:#212529">{{$group->end_date}}</p>
                            </div>
                        </div>
                        <div class="col-md-12" style="background-color:#212529; height:1px;"></div>
                        <div class="col-md-12" style="margin-top:10px;">
                            <label><strong>Log KP</strong></label>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodalLogTambah" style="float:right;margin-bottom:10px;" >
                                Tambah Log
                            </button>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th  style="vertical-align:middle; width:150px;">Tanggal Upload</th>
                                        <th  style="vertical-align:middle;">Judul Log</th>
                                        <th  style="vertical-align:middle;width:150px;"><center>File</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($group->reports as $report)
                                        <tr>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom:15px;">
                <div class="col-lg-12" >
                    <button type="button" class="btn btn-danger"  style="float:right;" >
                        Hapus Pengajuan
                    </button>
                </div>
            </div>
    </div><!-- .animated -->
</div><!-- .content -->
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
                    <img src="{{Storage::url($group->path)}}" alt="">
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
                                <option value="menunggu persetujuan perusahaan">Menunggu persetujuan perusahaan</option>
                                <option value="menunggu pemilihan dosen pembimbing">Menunggu pemilihan dosen pembimbing</option>                                
                                <option value="ditolak oleh koordinator KP">Ditolak oleh koordinator KP</option>
                                <option value="ditolak oleh perusahaan">Ditolak oleh perusahaan</option>
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
<div class="modal fade" id="scrollmodalDosbing" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
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
                            <th style="vertical-align:middle">Nama</th>
                            <th style="vertical-align:middle">NIP</th>
                            <th style="vertical-align:middle">No HP</th>
                            <th style="vertical-align:middle">Banyak Membimbing</th>
                            <th style="vertical-align:middle">Banyak Membimbing Periode Aktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="vertical-align:middle"><input type="radio" name="news2" value="1"></td>
                            <td style="vertical-align:middle">Radityo Anggoro</td>
                            <td style="vertical-align:middle">1232131231231231231</td>
                            <td style="vertical-align:middle">081703313257</td>
                            <td style="vertical-align:middle">15</td>
                            <td style="vertical-align:middle">5</td>
                        </tr>                                             
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalNilaiLihat" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Nilai KP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodalNilaiUbah" style="float:right;margin-bottom:10px;" >
                    Ubah
                </button>
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th  style="vertical-align:middle">NRP</th>
                            <th  style="vertical-align:middle">Nama</th>
                            <th style="vertical-align:middle"><center>Lapangan</center></th>
                            <th style="vertical-align:middle"><center>Seminar</center></th>
                            <th style="vertical-align:middle"><center>Koordinator</center></th>
                            <th style="vertical-align:middle"><center>Kedisiplinan</center></th>
                            <th style="vertical-align:middle"><center>NA</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group->studentsdetails as $student)
                            <tr>
                                <td style="vertical-align:middle">{{$student->username}}</td>
                                <td style="vertical-align:middle">{{$student->fullname}}</td>
                                <td style="vertical-align:middle">
                                    <center>
                                        @if (isset($student->valuation_1))
                                            {{$student->valuation_1}}
                                        @else
                                            -
                                        @endif
                                    </center>
                                </td>
                                <td style="vertical-align:middle">
                                    <center>
                                        @if ($student->valuation_2 != null)
                                            {{$student->valuation_2}}
                                        @else
                                            -
                                        @endif
                                    </center>
                                </td>
                                <td style="vertical-align:middle">
                                    <center>
                                        @if ($student->valuation_3 != null)
                                            {{$student->valuation_3}}
                                        @else
                                            -
                                        @endif
                                    </center>
                                </td>
                                <td style="vertical-align:middle">
                                    <center>
                                        @if ($student->valuation_4 != null)
                                            {{$student->valuation_4}}
                                        @else
                                            -
                                        @endif
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
                            </tr>
                        @endforeach                                              
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalNilaiUbah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('valuation.store')}}" method="post">
                @csrf
                <input type="hidden" name="groupid" value="{{$group->id}}">
                <?php $i = 0?>
                @foreach ($group->students as $student)
                    <input type="hidden" name="id[{{$i++}}]" value="{{$student->id}}">                    
                @endforeach                                
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Nilai Ubah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php $i = 0?>
                    @foreach ($group->students as $student)
                        <div class="col-md-12">
                            <div class="row form-group"style="margin-bottom:0px;">
                                <div class="col-md-2"><p >{{$student->username}}</p></div>
                                <div class="col-md-8"><p >{{$student->fullname}}</p></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2"><input type="text" id="text-input" name="valuation_1[{{$i}}]" placeholder="N1" class="form-control"></div>
                                <div class="col-md-2"><input type="text" id="text-input" name="valuation_2[{{$i}}]" placeholder="N2" class="form-control"></div>
                                <div class="col-md-2"><input type="text" id="text-input" name="valuation_3[{{$i}}]" placeholder="N3" class="form-control"></div>
                                <div class="col-md-2"><input type="text" id="text-input" name="valuation_4[{{$i}}]" placeholder="N4" class="form-control"></div>
                            </div>
                        </div>
                        <?php $i++?>
                    @endforeach                                                
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
                        <textarea name="title" id="textarea-input" rows="2" class="form-control"></textarea>
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

@endsection