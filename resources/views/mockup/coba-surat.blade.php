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
                                    <th>Kelompok</th>
                                    <th>Jenis Pengajuan</th>
                                    <th>Perusahaan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                            05111640000115 - Dewi Ayu N
                                            05111640000129 - Frandita Adhitama
                                        </td>
                                        <td>                                                
                                            Kerja Praktik
                                        </td>
                                        <td><button type="submit" class="btn btn-secondary btn-sm"data-toggle="modal" data-target="#scrollmodalPerusahaanLihat" style="line-height:1;border-radius:3px;">Lihat</button></td>
                                        <td>27 - 27 - 2727</td>
                                        <td>27 - 27 - 2727</td>
                                        <td><button type="submit" class="btn btn-secondary btn-sm" style="line-height:1;border-radius:3px;"></td>
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