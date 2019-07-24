@extends('template.master')

@section('page-title')
Surat
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Permintaan Surat</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="vertical-align:middle">Kelompok</th>
                                    <th style="vertical-align:middle">Jenis Pengajuan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    <tr>
                                        <td style="vertical-align:middle">
                                            @foreach ($group->students as $student)
                                                {{$student->username}} - {{$student->fullname}} <br>
                                            @endforeach
                                        </td>
                                        <td style="vertical-align:middle">                                                
                                            {{ucwords($group->type['name'])}}
                                        </td>
                                        <td style="vertical-align:middle"><center><button type="submit" class="btn btn-secondary btn-sm"data-toggle="modal" data-target="#scrollmodalSuratDetail" style="border-radius:3px;">Lihat Detail</button></center></td>
                                    </tr>
                                @endforeach                                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div><!-- .animated -->
</div><!-- .content -->
<div class="modal fade" id="scrollmodalSuratDetail" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Detail Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row form-group">
                        <div class="col col-md-4"><label class=" form-control-label"><strong>Jenis Pengajuan</strong></label></div>
                        <p style="color:#212529">{{ucwords($group->type['name'])}}</p>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-4"><label class=" form-control-label"><strong>Peserta</strong></label></div>
                            <p style="color:#212529">
                                @foreach ($group->students as $student)
                                    {{$student->username}} - {{$student->fullname}} <br>
                                @endforeach
                            </p>
                        </div>
                </div>
                <div class="col-md-12" style="background-color:#212529; height:1px; margin-bottom:1.5rem"></div>                       
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>Perusahaan</strong></label>
                        <p style="color:#212529">{{$group->corp->name}}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Alamat</strong></label>
                        <p style="color:#212529">{{$group->corp->address}}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Kota</strong></label>
                        <p style="color:#212529">{{$group->corp->city}}</p>
                    </div>        
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>Tanggal Mulai</strong></label>
                        <p style="color:#212529">{{$group->start_date}}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Tanggal Berakhir</strong></label>
                        <p style="color:#212529">{{$group->end_date}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="{{route('cover_letter.download', ['id' => $group->id])}}"><button type="button" class="btn btn-info btn-sm" style="border-radius:3px;">Download</button></a>                
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection