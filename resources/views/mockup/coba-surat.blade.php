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
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td style="vertical-align:middle">
                                            05111640000115 - Dewi Ayu N <br>
                                            05111640000129 - Frandita Adhitama
                                        </td>
                                        <td style="vertical-align:middle">                                                
                                            Kerja Praktik
                                        </td>
                                        <td style="vertical-align:middle"><center><button type="submit" class="btn btn-secondary btn-sm"data-toggle="modal" data-target="#scrollmodalPerusahaanLihat" style="border-radius:3px;">Lihat Detail</button></center></td>
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