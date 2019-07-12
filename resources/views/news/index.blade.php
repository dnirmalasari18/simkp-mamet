@extends('template.master')

@section('page-title')
Berita
@endsection

@section('content')

@if (Auth::user()->role == 'koordinator')
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
@endif

<div class="modal fade" id="scrollmodalTambah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Form Berita Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('news.create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label for="postal-code" class=" form-control-label"><strong>Judul</strong></label>
                            <input name="title" type="text" id="postal-code" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="postal-code" class=" form-control-label"><strong>Isi</strong></label>
                            <textarea name="description" id="textarea-input" rows="3"  class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="postal-code" class=" form-control-label"><strong>Attachment: </strong></label>
                            <input name="attachments[]" type="file" id="fileAdd" multiple />
                            <div id="selectedFiles" style="color:#428bca"></div>
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

<div class="content ">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                @foreach ($newsc as $news)
                    <div class="card">
                        <div class="card-header">
                            <h4><strong>{{$news->title}}</strong></h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted m-b-15">{{$news->description}}</p>
    
                            <ul class="list-unstyled" style="margin-top:-1%">
                                @foreach ($news->attachments as $attachment)
                                    <li ><a href="{{ Storage::url($attachment->path) }}" style="color:#428bca">{{$attachment->filename}}</a></li>
                                @endforeach                                                                
                            </ul>
    
                            <i><small><span class="fa fa-clock-o"></span> Created at: {{$news->created_at}}</small></i>
                              &nbsp;                            
                            <form action="{{route('news.delete')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$news->id}}">
                                <button type="submit" class="btn btn-secondary btn-sm" style="float:right;">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach 
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
    
</script>
@endsection