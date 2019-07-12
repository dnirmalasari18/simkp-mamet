@extends('template.master')

@section('page-title')
Periode
@endsection

@section('additional-css')

<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!asset('template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')!!}">
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row" style="margin-bottom:15px;">
            <div class="col-lg-12" >
                <button type="button" class="btn btn-primary" style="float:right; width:25%;" data-toggle="modal" data-target="#scrollmodalTambah">
                    Tambah Periode
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Periode</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="vertical-align:middle">Tahun Ajar</th>
                                    <th style="vertical-align:middle"><center>Tanggal Mulai Semester</center></th>
                                    <th style="vertical-align:middle"><center>Tanggal Akhir Semester</center></th>
                                    <th style="vertical-align:middle"><center>Batas Pengajuan</center></th>
                                    <th style="vertical-align:middle">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periods as $period)
                                    <tr>
                                        <td style="vertical-align:middle">{{ucwords($period->name)}}</td>
                                        <td style="vertical-align:middle"><center>{{$period->start_date}}</center></td>
                                        <td style="vertical-align:middle"><center>{{$period->end_date}}</center></td>
                                        <td style="vertical-align:middle"><center>{{$period->final_date}}</center></td>
                                        <td style="vertical-align:middle">
                                            @if ($period->active)
                                                <center><span class="badge badge-success">Active</span></center>
                                            @else
                                                <center><span class="badge badge-secondary">Inactive</span></center>
                                            @endif
                                        </td>
                                        <td style="vertical-align:middle">
                                            <center>
                                                <span style="display:block;margin-bottom:5px;">
                                                    @if ($period->active)
                                                        <form action="{{route('period.deactivate')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$period->id}}">
                                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius:3px; width:100px; ">Nonaktifkan</button>
                                                        </form>
                                                    @else
                                                        <form action="{{route('period.activate')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$period->id}}">
                                                            <button type="submit" class="btn btn-success btn-sm" style="border-radius:3px; width:100px; ">Aktifkan</button>
                                                        </form>
                                                    @endif                                                    
                                                </span>
                                                <span style="display:block;">
                                                    <button id="{{$period->id}}" type="button" class="btn btn-primary btn-sm btn-edit"  data-toggle="modal" data-target="#scrollmodalEdit"style="border-radius:3px; width:100px;">Edit</button>
                                                </span>
                                                <form action="{{route('period.delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$period->id}}">
                                                    <span style="display:block; padding-block:5px; ">
                                                        <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px; width:100px;">Hapus</button>
                                                    </span>
                                                </form>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>                
        </div>
    </div><!-- .animated -->
</div>
<div class="modal fade" id="scrollmodalTambah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('period.create')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Form Periode Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Tahun Ajaran</strong></label>
                        <input name="name" type="text" id="postal-code" placeholder="Tahun Ajaran" class="form-control">
                    </div>                    
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Tanggal Mulai Semester</strong></label>
                        <input name="start_date" type="date" id="postal-code" placeholder="Tanggal Mulai Semester" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Tanggal Akhir Semester</strong></label>
                        <input name="end_date" type="date" id="postal-code" placeholder="Tanggal Akhir Semester" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Batas Akhir Pengajuan</strong></label>
                        <input name="final_date" type="date" id="postal-code" placeholder="Batas Akhir Pengajuan" class="form-control">
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
<div class="modal fade" id="scrollmodalEdit" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('period.edit')}}" method="post">
                @csrf
                <input class="edit-period-id" type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title edit-period" id="scrollmodalLabel">((Periode berapa))</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Tahun Ajaran</strong></label>
                        <input name="name" type="text" id="postal-code" placeholder="Tahun Ajaran" class="form-control edit-period-name">
                    </div>                
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Tanggal Mulai Semester</strong></label>
                        <input name="start_date" type="date" id="postal-code" placeholder="Tanggal Mulai Semester" class="form-control edit-period-start">
                    </div>
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Tanggal Akhir Semester</strong></label>
                        <input name="end_date" type="date" id="postal-code" placeholder="Tanggal Akhir Semester" class="form-control edit-period-end">
                    </div>
                    <div class="form-group">
                        <label for="postal-code" class=" form-control-label"><strong>Batas Akhir Pengajuan</strong></label>
                        <input name="final_date" type="date" id="postal-code" placeholder="Batas Akhir Pengajuan" class="form-control edit-period-final">
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

<script>
    var periods = {!!$periods!!}
    jQuery(document).ready(function(){        
        jQuery('.btn-edit').click(function(){            
            console.log(jQuery(this).attr('id'))            
            var p;            
            for (var i = 0; i < periods.length; i++) {
                if (periods[i].id == jQuery(this).attr('id')) {
                    p = periods[i];
                    break;
                }
            };
            jQuery(".edit-period").text(p.name);
            jQuery(".edit-period-id").val(p.id);
            jQuery(".edit-period-name").val(p.name);
            jQuery(".edit-period-start").val(p.start_date);
            jQuery(".edit-period-end").val(p.end_date);
            jQuery(".edit-period-final").val(p.final_date);            
        })
    })
</script>
@endsection