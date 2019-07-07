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
                            <i><small class=""><span class="fa fa-clock-o"></span> Updated at: {{$news->updated_at}}</small></i>
                            <button type="button" class="btn btn-secondary btn-sm" style="float:right;">Hapus</button>
                            <button type="button" class="btn btn-primary btn-sm" style="float:right; margin-right:10px;">Ubah</button>
                            
                        </div>
                    </div>
                @endforeach                
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection