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
                                        <select id="corporation" data-placeholder="Pilih Perusahaan" class="standardSelect" tabindex="1">
                                            <option value=""></option>
                                            <option value="0">Perusahaan Belum Terdaftar</option>                                    
                                            {{-- <option value="13">	PT Garuda Maintenance Facility AeroAsia - Jakarta</option>
                                            <option value="64">Aksamedia - Surabaya</option>
                                            <option value="132">Dinas Pehubungan Kota Surabaya - Surabaya</option><option value="129">Dinas Pendidikan Kota Surabaya - Surabaya</option>
                                            <option value="104">Dinas Pendidikan Pemerintah Provinsi Jawa Timur - Surabaya</option>
                                            <option value="134">Dinas Perhubungan Komunikasi dan Informatika Kalimantan Selatan - Banjarmasin</option>
                                            <option value="133">Dinas Perhubungan Surabaya - Surabaya</option>
                                            <option value="100">Direktorat Pendidikan Diniyah dan Pondok Pesantren Kementerian Agama Republik Indonesia - Jakarta</option>
                                            <option value="204">DomaiNesia - Yogyakarta</option><option value="200">DPTSI - ITS - Surabaya</option>
                                            <option value="149">Elifesolutions - Johor</option><option value="123">Erporate Digital Agency - Yogyakarta</option>
                                            <option value="117">Garuda Indonesia Training Center (GITC) - Jakarta Barat</option><option value="50">GDP Labs - Jakarta</option>
                                            <option value="53">GG Techno - Yogyakarta</option><option value="167">Hotel GM253 - Jember</option>
                                            <option value="107">Indosat Ooredoo - Jakarta</option><option value="226">Infodata Solusi Cipta. PT - Surabaya</option>
                                            <option value="75">ISI Surakarta - Surakarta</option>
                                            <option value="92">Jurusan Teknik Informatika Fakultas Teknologi Informasi Institut Teknologi Sepuluh Nopember - Surabaya</option>
                                            <option value="121">Jurusan Teknik Material dan Metalurgi ITS - Surabaya</option>
                                            <option value="130">Kantor Wilayah Kemenag Jawa Timur - Sidoarjo</option><option value="252">Kanwil DJKN Jawa Timur - Surabaya</option>
                                            <option value="115">Karapan - Surabaya</option><option value="112">Kaskus - PT Darta Media Indonesia - Jakarta</option>
                                            <option value="141">Kementerian Hukum dan HAM RI, Kantor Nama Wilayah Jawa Timur, Imigrasi Kelas III Kediri - Kediri</option>
                                            <option value="209">Kementrian Agama provinsi Jawa Timur - Sidoarjo</option><option value="122">Kementrian Keuangan RI - Jakarta</option>
                                            <option value="227">Kepolisian Daerah Jawa Timur - Surabaya</option><option value="52">Laboratorium Manajemen Informasi (MI) - Surabaya</option>
                                            <option value="73">Laboratorium Pemrograman 2 Teknik Informatika ITS - Surabaya</option>
                                            <option value="4">Lembaga Antariksa dan Penerbangan Nasional (LAPAN) - Bogor</option>
                                            <option value="10">Lembaga Pengembangan Teknologi Sistem Informasi ITS (LPTSI ITS) - Surabaya</option>
                                            <option value="189">Locomotive Production - Malang</option><option value="159">Mandiri Finance Tunas Finance - Jakarta Pusat</option>
                                            <option value="178">Manjada - Bandung</option>
                                            <option value="247">MAPAN - PT RUMA (Rekan Usaha Mikro Anda) - Jakarta</option>
                                            <option value="245">Maulidan Games - Surabaya</option><option value="27">Maulidan Production - Surabaya</option><option value="85">Maya Sartika Brass - Pati</option> --}}
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
                                                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><strong>Tanggal Mulai</strong></label>
                                        <input type="date" class="form-control" name="group[start_date]" value="" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><strong>Tanggal Selesai</strong></label>
                                        <input type="date" class="form-control" name="group[end_date]" value="" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><strong>Kelompok</strong></label>
                                        <select class="form-control" name="friend">
                                            <option value="0">-</option>
                                        </select>
                                    </div>
                                </div>                        
                            <div class="col-lg-12" >
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

        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, Perusahaan belum terdaftar!",
            width: "100%"
        });
    });
</script>
@endsection