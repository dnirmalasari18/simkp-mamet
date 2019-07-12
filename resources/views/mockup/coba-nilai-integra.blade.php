@extends('template.master')

@section('page-title')
Nilai Integra
@endsection
@section('additional-css')

<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/chosen/chosen.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/bootstrap-datepicker.css')!!}">
<link href="{!! asset('template/vendors/morrisjs/morris.css') !!}" rel="stylesheet">
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Periode xxxx</strong>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                        <select data-placeholder="Pilih Perusahaan" class="standardSelect" tabindex="1">
                                    <option value=""></option>
                                    <option value="0">Perusahaan Belum Terdaftar</option>
                                    <option value="13">	PT Garuda Maintenance Facility AeroAsia - Jakarta</option>
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
                                    <option value="245">Maulidan Games - Surabaya</option><option value="27">Maulidan Production - Surabaya</option><option value="85">Maya Sartika Brass - Pati</option>
                                    </select>
                                    </div>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th  style="vertical-align:middle">NRP</th>
                                    <th  style="vertical-align:middle">Nama</th>
                                    <th style="vertical-align:middle"><center>N1</center></th>
                                    <th style="vertical-align:middle"><center>N2</center></th>
                                    <th style="vertical-align:middle"><center>N3</center></th>
                                    <th style="vertical-align:middle"><center>N4</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="vertical-align:middle">05111640000115</td>
                                    <td style="vertical-align:middle">Dewi Ayu N</td>
                                    <td style="vertical-align:middle"><center>90</center></td>
                                    <td style="vertical-align:middle"><center>90</center></td>
                                    <td style="vertical-align:middle"><center>90</center></td>
                                    <td style="vertical-align:middle"><center>80</center></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
<script src="{!!asset('template/vendors/chosen/chosen.jquery.min.js')!!}"></script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, Periode tidak ditemukan",
            width: "100%"
        });
    });
</script>
@endsection