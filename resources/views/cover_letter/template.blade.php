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

    <style>
        @page{width:21cm;
            height:29.7cm;}
        body {
            line-height: 22pt;
        }  
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }   
    </style>
</head>
<body>
    <div style="margin:0px auto;margin-top:5cm;margin-left: 1.5cm;margin-right: 1.5cm; ">
        <div style="width:70%;vertical-align:top;display:inline-block">
            <div style="display:inline-block;width:100px;vertical-align: top;">Nomor</div>
            <div style="display:inline-block;vertical-align: top;">:</div>
            <div style="display:inline-block;padding-left:10px;vertical-align:top;">{{$number}}</div>
        </div>
        <div style="width:25%; vertical-align:top;padding:0;display:inline-block;">
            {{$date}}
        </div>
    </div>
    <div style="margin:0px auto;margin-left: 1.5cm; margin-right: 1.5cm;">
        <div style="display:inline-block; width:100px">Perihal</div>
        <div style="display:inline-block;">:</div>
        <div style="display:inline-block;padding-left:10px;"><b>{{$group->type['desc']}}</b></div>
    </div>
    
    <div style="margin:0px auto;margin-left: 1.5cm; margin-right: 1.5cm;margin-top:1cm; vertical-align:top;">
        <div style="display:inline-block;vertical-align:top;width:20%">
            <div style="display:inline-block; width:100px;vertical-align:top;">Kepada Yth</div>
            <div style="display:inline-block;vertical-align:top;">:</div>
        </div>
        <div style="display:inline-block;width:75%;vertical-align:top;">
            <div style="display:inline;vertical-align:top;">{{$to}}</b><br></div>
            <div style="display:inline;vertical-align:top;">{{$group->corp->address}}<br></div>
            <div style="display:inline;vertical-align:top;">{{$group->corp->city}}</div>
        </div>
    </div>
    
    <div style="margin-top:1cm; display:inline-block;margin-right:1.5cm;">
        <div style="padding-left:190px;">
            <div style="text-align:justify;width:100%;text-indent:1.27cm;">
                Dalam rangka memenuhi persyaratan kurikulum, setiap mahasiswa Departemen Teknik Material FTI-ITS wajib melakukan 
                {{$group->type['desc']}}. Sehubungan dengan hal tersebut kami mohon dengan hormat agar mahasiswa tersebut di bawah 
                ini diijinkan untuk dapat melakukan Kerja Praktik selama {{$duration}} minggu yang dimulai tanggal {{$group->start_date}} 
                - {{$group->end_date}} di perusahaan yang Bapak/Ibu pimpin. Adapun mahasiswa yang dimaksud adalah sbb 
                :
            </div>
            <div style="text-align:center;text-indent:1.24cm;margin-top:5px">
                <table class="table table-bordered" style="border-color:black;">
                    <thead>
                        <tr>

                            <th><center><b>No</b></center></th>
                            <th><center><b>Nama Mahasiswa</b></center></th>
                            <th><center><b>NRP</b></center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $number=1;@endphp
                        @foreach ($group->students as $student)
                            <tr>
                                <td style="vertical-align:top;"><center><b>{{$number}}</b></center></td>
                                <td style="text-align:left;vertical-align:top;"><b>{{$student->fullname}}</b></td>
                                <td style="vertical-align:top;"><center><b>{{$student->username}}</b></center></td>
                            </tr>
                            @php $number+=1;@endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="text-align:justify;text-indent:1.27cm;margin-top:5px;">Demikian surat permohonan ini, kami menunggu konfirmasi penerimaan {{strtolower($group->type['desc'])}} dari perusahaan Bapak/Ibu dalam waktu yang tidak terlalu lama. Atas bantuan dan kerja sama yang baik, kami sampaikan terima kasih.</div>
        </div>
    </div>

    <div style="margin-top:1cm">
        <div style="padding-left:9.3cm;" >
            Kepala Departemen Teknik Material,<br><br><br>
            <b>Dr. Agung Purniawan, ST., M.Eng</b><br>
            <b>NIP. 197605282002121003</b>
        </div>
    </div>
</body>