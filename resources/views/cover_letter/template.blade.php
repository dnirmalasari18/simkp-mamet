<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>simKP</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('partials.css')
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>
        body {
            width:21cm;
            height:29.7cm;
        }
    </style>
</head>
<body>
    <div class="row" style="margin-top:3cm; margin-left:2.5cm; margin-right:2.5cm;">
        <div class="col-md-9">
            <div class="row form-group">
                <div style="width:100px;">Nomor</div>
                <div>:</div>
                <div style="padding-left:5px;">{{$number}}</div>
            </div>
            <div class="row form-group">
                <div style="width:100px;">Perihal</div>
                <div>:</div>
                <div style="padding-left:5px;"><b>{{$group->type['desc']}}</b></div>
            </div>
        </div>
        <div class="col-md-3" >
            {{$date}}
        </div>
    </div>
    <div class="row" style="margin-top:1.5cm; margin-left:2.5cm; margin-right:2.5cm;">
        
        <div div style="width:100px;">Kepada Yth</div>
        <div>:</div>
        <div style="padding-left:5px;">
            <b>{{$to}}</b><br>
            {{$group->corp->address}}<br>
            {{$group->corp->city}}
        </div>
    </div>

    <div class="row"style="margin-top:1.5cm; margin-left:2.5cm; margin-right:2.5cm;">
        <div style="padding-left:105px">
            <div style="text-align:justify;text-indent:1.27cm;">
                Dalam rangka memenuhi persyaratan kurikulum, setiap mahasiswa Departemen Teknik Material FTI-ITS wajib melakukan 
                {{$group->type['desc']}}. Sehubungan dengan hal tersebut kami mohon dengan hormat agar mahasiswa tersebut di bawah 
                ini diijinkan untuk dapat melakukan Kerja Praktik yang dimulai tanggal {{date('d-M-y', strtotime($group->start_date))}} 
                - {{date('d-M-y', strtotime($group->end_date))}} di perusahaan yang Bapak/Ibu pimpin. Adapun mahasiswa yang dimaksud adalah sbb 
                :
            </div>
            <div style="text-align:center;text-indent:1.27cm;">
                <table class="table table-bordered" style="border-color:black;">
                    <thead>
                        <tr>

                            <th><center><b>No</b></center></th>
                            <th><center><b>Nama Mahasiswa</b></center></th>
                            <th><center><b>NRP</b></center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>1</b></td>
                            <td><b>Dewi Ayu N</b></td>
                            <td><center><b>051164000115</b></center></td>
                        </tr>
                        <tr>
                            <td><b>2</b></td>
                            <td><b>Frandita Adhitama</b></td>
                            <td><center><b>051164000129</b></center></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="text-align:justify;text-indent:1.27cm;">Demikian surat permohonan ini, kami menunggu konfirmasi penerimaan {{strtolower($group->type['desc'])}} dari perusahaan Bapak/Ibu dalam waktu yang tidak terlalu lama. Atas bantuan dan kerja sama yang baik, kami sampaikan terima kasih.</div>
        </div>
    </div>
    <div class="row" style="margin-top:2cm; margin-left:2.5cm; margin-right:2.5cm;">
        <div style="padding-left:9cm;" >
            Ka.Dept.,<br><br><br>
            <b>Dr. Agung Purniawan, ST., M.Eng</b><br>
            <b>NIP. 197605282002121003</b>
        </div>
    </div>
</body>