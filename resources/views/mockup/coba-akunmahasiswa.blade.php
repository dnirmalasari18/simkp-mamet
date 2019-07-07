@extends('template.master')

@section('page-title')
Berita
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row" style="margin-bottom:15px;">
            <div class="col-lg-12" >
                <button type="button" class="btn btn-primary" style="float:right; width:25%;">Tambah Berita</button>
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4><strong>Form KP</strong></h4>
                    </div>
                    <div class="card-body">
                        <p class="text-muted m-b-15">Form untuk kepentingan KP</p>

                        <ul class="list-unstyled" style="margin-top:-1%">
                            <li ><a href="#" style="color:#428bca">Form Pengajuan.pdf</a></li>
                            <li ><a href="#" style="color:#428bca">Form Penilaian Pembimbing Lapangan.pdf</a></li>
                            <li ><a href="#" style="color:#428bca">Form Penilaian Dosen Pembimbing.pdf</a></li>
                        </ul>

                        <i><small><span class="fa fa-clock-o"></span> Created at: 2018-02-06</small></i>
              			&nbsp;
                        <i><small class=""><span class="fa fa-clock-o"></span> Updated at: 2018-02-06</small></i>
                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#scrollmodal" style="float:right;">Hapus</button>
                        <button type="button" class="btn btn-primary btn-sm" style="float:right; margin-right:10px;">Ubah</button>
                        
                    </div>
                </div>
                <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="scrollmodalLabel">Scrolling Long Content Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    dui. Donec ullamcorper nulla non metus auctor fringilla.
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection