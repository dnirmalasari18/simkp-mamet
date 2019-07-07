@extends('template.master')

@section('page-title')
Berita
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row" style="margin-bottom:15px;">
            <div class="col-lg-12" >
                <button type="button" class="btn btn-primary" style="float:right; width:25%;" data-toggle="modal" data-target="#scrollmodalTambah">
                    Tambah Berita
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="scrollmodalTambah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Form Berita Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Judul</strong></label>
                        <input type="text" id="postal-code" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Isi</strong></label>
                        <textarea name="textarea-input" id="textarea-input" rows="3"  class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Attachment: </strong></label>
                        <input type="file" id="fileAdd" multiple />
                        <div id="selectedFiles"></div>
                    </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
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
                        <button type="button" class="btn btn-secondary btn-sm"  style="float:right;">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection

@section('additional-js')
<script>
	var selDiv = "";
    document.addEventListener("DOMContentLoaded", init, false);
    function init() {
        document.querySelector('#fileAdd').addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#selectedFiles");
    }
    function handleFileSelect(e) {
        
    if(!e.target.files) return;
            
        selDiv.innerHTML = "";
            
        var files = e.target.files;
        for(var i=0; i<files.length; i++) {
        var f = files[i];
                
            selDiv.innerHTML += f.name + "<br/>";
    
        }
            
    }
    document.addEventListener("DOMContentLoaded", init2, false);
    function init2() {
        document.querySelector('#fileEdit').addEventListener('change', handleFileSelect, false);
        selDiv2 = document.querySelector("#selectedFilesEdit");
    }
    function handleFileSelect(e) {
        
    if(!e.target.files) return;
            
        selDiv2.innerHTML = "";
            
        var files = e.target.files;
        for(var i=0; i<files.length; i++) {
        var f = files[i];
                
            selDiv2.innerHTML += f.name + "<br/>";
    
        }
            
    }
</script>
@endsection