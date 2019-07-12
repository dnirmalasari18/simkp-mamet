@extends('template.master')

@section('page-title')
Pengajuan
@endsection

@section('additional-css')
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('group.create')}}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <div class="col col-md-4"><label class=" form-control-label"><strong>Jenis Pengajuan</strong></label></div>
                                    <div class="col col-md-8">
                                        <div class="form-check-inline form-check">
                                            <label for="inline-radio1" class="form-check-label "style="padding-right:50px;">
                                                <input type="radio" id="inline-radio1" name="group[type]" value="kerja praktik" class="form-check-input" >Kerja Praktik
                                            </label>
                                            <label for="inline-radio2" class="form-check-label ">
                                                <input type="radio" id="inline-radio2" name="group[type]" value="magang" class="form-check-input">Magang
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                            
                            <div class="col-md-4">
                                <div class="form-group">                                
                                    <label style="margin-bottom:20px;"><strong>Perusahaan</strong></label>
                                    <select id="corporation" data-placeholder="Pilih Perusahaan" class="standardSelect form-control" tabindex="1">
                                        <option value=""></option>
                                        <option value="0">Perusahaan Belum Terdaftar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><strong>Nama Perusahaan</strong></label>
                                    <input id="corpname" type="text" class="form-control" id="corpname" name="corporation[name]" value="">
                                </div>
                                <div class="form-group">
                                    <label><strong>Alamat</strong></label>
                                    <input id="corpaddress" type="text" class="form-control" id="corpaddress" name="corporation[address]" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><strong>Kota</strong></label>
                                    <input id="corpcity" type="text" class="form-control" id="corpcity" name="corporation[city]" value="">
                                </div>
                                <div class="form-group">
                                    <label><strong>Kode Pos</strong></label>
                                    <input id="corppost_code" type="text" class="form-control" id="corppost_code" name="corporation[post]" value="">
                                </div>
                                <div class="form-group">
                                    <label><strong>Telp Kantor</strong></label>
                                    <input id="corptelp" type="text" class="form-control" id="corptelp" name="corporation[phone_number]" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><strong>Jenis Bisnis</strong></label>
                                    <input id="corpbusiness_type" type="text" class="form-control" id="corpbusiness_type" name="corporation[type]" value="">
                                </div>
                                <div class="form-group">
                                    <label><strong>Profil</strong></label>
                                    <textarea id="corpdescription" class="form-control" rows="4" id="corpdescription" name="corporation[profile]"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12" style="background-color:#212529; height:2px; margin-top:2rem;"></div>    
                            <div class="col-md-4" style="margin-top:2rem;">
                                <div class="form-group">
                                    <label><strong>Tanggal Mulai</strong></label>
                                    <input type="date" class="form-control" name="group[start_date]" value="" required="">
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top:2rem;">
                                <div class="form-group">
                                    <label><strong>Tanggal Selesai</strong></label>
                                    <input type="date" class="form-control" name="group[end_date]" value="" required="">
                                </div>
                            </div>                    
                            <div class="col-md-4" style="margin-top:2rem;">
                                <div class="form-group">
                                    <label><strong>Kelompok</strong></label>
                                    <select data-placeholder="-" class="form-control standardSelect" tabindex="1">
                                        <option value=""></option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->fullname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                        
                            <div class="col-lg-12" style="margin-top:1rem;">
                                <button type="submit" class="btn btn-primary" style="float:right; width:25%;">Ajukan</button>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection

@section('additional-js')
<script src="{!!asset('template/vendors/bootstrap-datepicker.js')!!}"></script>
<script src="{!!asset('template/vendors/chosen/chosen.jquery.min.js')!!}"></script>
<script>
    // global.JQuery = require('jquery')
    var corps = {!!$corps!!};
    jQuery(document).ready(function() {        
        console.log(corps)
        for (var i = corps.length - 1; i >= 0; i--) {            
            c = corps[i];
            jQuery("#corporation").append('<option value="'+c.id+'">'+c.name+'-'+c.city+'</option>');
        };
        // add onChange event
        jQuery("#corporation").change(function(){
            if (jQuery(this).val() != 0) {
                var c;
                for (var i = 0; i < corps.length; i++) {
                    if (corps[i].id == jQuery(this).val()) {
                        c = corps[i];
                        break;
                    }
                };
                jQuery("#corpname").val(c.name);
                jQuery("#corpaddress").val(c.address);
                jQuery("#corpcity").val(c.city);
                jQuery("#corppost_code").val(c.post);
                jQuery("#corptelp").val(c.phone_number);
                jQuery("#corpfax").val(c.fax);
                jQuery("#corpbusiness_type").val(c.type);
                jQuery("#corpdescription").val(c.profile);
            } else {
                jQuery("#corpname").val("");
                jQuery("#corpaddress").val("");
                jQuery("#corpcity").val("");
                jQuery("#corppost_code").val("");
                jQuery("#corptelp").val("");
                jQuery("#corpfax").val("");
                jQuery("#corpbusiness_type").val("");
                jQuery("#corpdescription").val("");
            }
        });

        
        jQuery(".standardSelect").chosen();

        jQuery(".standardSelect").chosen({
            disable_search_threshold: 2,
            no_results_text: "Oops, Perusahaan belum terdaftar!",
            width: "100%"
        });
    });
</script>
@endsection