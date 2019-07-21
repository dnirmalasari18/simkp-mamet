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
                                    <th style="vertical-align:middle;width:500px;">Kelompok</th>
                                    <th style="vertical-align:middle;widh:200px;">Jenis Pengajuan</th>
                                    <th style="vertical-align:middle;width:150px;">Status</th>
                                    <th style="width:150px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    <tr>
                                        <td style="vertical-align:middle">
                                            @foreach ($group->students as $student)
                                                {{$student->username}} - {{$student->fullname}} <br>
                                            @endforeach
                                        </td>
                                        <td style="vertical-align:middle">                                                
                                            {{ucwords($group->type['name'])}}
                                        </td>
                                        <td style="vertical-align:midle">
                                            {{strtoupper($group->status['name'])}}
                                        </td>
                                        <td style="vertical-align:middle"><center><button type="button" class="btn btn-secondary btn-sm detail" value="{{$group->id}}" data-toggle="modal" data-target="#scrollmodalSuratDetail" style="border-radius:3px;">Lihat Detail</button></center></td>
                                    </tr>
                                @endforeach                                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div><!-- .animated -->
</div><!-- .content -->
<div class="modal fade" id="scrollmodalSuratDetail" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Detail Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row form-group">
                        <div class="col col-md-4"><label class=" form-control-label"><strong>Jenis Pengajuan</strong></label></div>
                        <p id="group-type" style="color:#212529"></p>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-4"><label class=" form-control-label"><strong>Peserta</strong></label></div>
                            <p style="color:#212529">
                                <div class="col col-md-8" id="student-1"></div>
                                <div class="col col-md-4"></div><div class="col col-md-8" id="student-2"></div>
                                {{-- @foreach ($group->students as $student)
                                    {{$student->username}} - {{$student->fullname}} <br>
                                @endforeach --}}
                            </p>                            
                    </div>                        
                </div>
                <div class="col-md-12" style="background-color:#212529; height:1px; margin-bottom:1.5rem"></div>                       
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>Perusahaan</strong></label>
                        <p id="corp-name" style="color:#212529"></p>
                    </div>
                    <div class="form-group">
                        <label><strong>Alamat</strong></label>
                        <p id="corp-address" style="color:#212529"></p>
                    </div>
                    <div class="form-group">
                        <label><strong>Kota</strong></label>
                        <p id="corp-city"style="color:#212529"></p>
                    </div>        
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>Tanggal Mulai</strong></label>
                        <p id="group-start-date" style="color:#212529"></p>
                    </div>
                    <div class="form-group">
                        <label><strong>Tanggal Berakhir</strong></label>
                        <p id="group-end-date" style="color:#212529"></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info btn-sm"data-toggle="modal" data-target="#scrollmodalSuratBuat" style="border-radius:3px;float:right;">Buat Surat</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalSuratBuat" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('cover_letter.download')}}" method="post">
                @csrf
                <input id="group-id" type="hidden" name="group_id" value="1">
                <div class="modal-header">
                    Buat Surat
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Tanggal Surat</strong></label>
                        <input name="date" type="text" name="date" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Nomor Surat</strong></label>
                        <input name="number" type="text" name="number" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Kepada Surat</strong></label>
                        <input name="to" type="text" name="to" id="to"class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Download</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('additional-js')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{!!asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js')!!}"></script>
<script src="{!!asset('template/vendors/datatables.net-buttons/js/buttons.colVis.min.js')!!}"></script>
<script src="{!!asset('template/assets/js/init-scripts/data-table/datatables-init.js')!!}"></script>
<script>
    var groups = {!!$groups!!}    
    jQuery(document).ready(function(){
        jQuery('.detail').click(function(){                        
            var group                        
            for(var i=0;i < groups.length;i++){                
                if(jQuery(this).val() == groups[i].id){                                        
                    group = groups[i]                            
                    break
                }
            }            

            jQuery('#group-id').val(group.id)
            jQuery('#group-start-date').text(group.start_date)
            jQuery('#group-end-date').text(group.start_date)
            jQuery('#group-type').text(group.type['name'])

            getStudents(group.id)
            getCorp(group.id)            
        })
        jQuery("#bootstrap-data-table-export").dataTable({
            aaSorting: [[2, 'asc']],
            paging:false,
            searching:false,
            "bDestroy":true,
        });
    })

    function getStudents(id){        
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        
        var x = {}
        x['id'] = id

        jQuery.ajax({
                type:'POST',
                url:"{{route('ajax.student')}}",
                data: x,
                success:function(data) {                                        
                    // var students = ""
                    // data['students'].forEach(student => {
                    //     students = students + student.username + " " + student.fullname + '<br>'
                    // });
                    jQuery('#student-1').text(data['students'][0].username + "-" + data['students'][0].fullname)
                    jQuery('#student-2').text(data['students'][1].username + "-" + data['students'][1].fullname)
                }
            })
    }

    function getCorp(id){        
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        
        var x = {}
        x['id'] = id

        jQuery.ajax({
                type:'POST',
                url:"{{route('ajax.corp')}}",
                data: x,
                success:function(data) {                    
                    jQuery("#corp-name").text(data.corp.name);
                    jQuery("#corp-address").text(data.corp.address);
                    jQuery("#corp-city").text(data.corp.city);
                }
            })
    
    }
</script>
@endsection