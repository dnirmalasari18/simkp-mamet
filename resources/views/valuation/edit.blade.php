@extends('template.master')

@section('page-title')
Nilai Integra
@endsection
@section('additional-css')

<link rel="stylesheet" href="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/chosen/chosen.min.css">
<link rel="stylesheet" href="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/bootstrap-datepicker.css">
<link href="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/morrisjs/morris.css" rel="stylesheet">
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('valuation.store')}}" method="post">
                            @csrf
                            <div class="row" style="margin-bottom:1rem;">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" style="float:right;border-radius:3px; width:200px; margin-left:10px;">Simpan</button>
                                </div>
                            </div>
                            <table id="bootstrap-data-table-export" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="vertical-align:middle;width:100px;" >NRP</th>
                                        <th style="vertical-align:middle">Nama</th>
                                        <th style="vertical-align:middle;width:100px;"><center>N1</center></th>
                                        <th style="vertical-align:middle;width:100px;"><center>N2</center></th>
                                        <th style="vertical-align:middle;width:100px;"><center>N3</center></th>
                                        <th style="vertical-align:middle;width:100px;"><center>N4</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0 ?>
                                    @foreach ($students as $student)                                        
                                        <tr>
                                            <input type="hidden" name="id[{{$i}}]" value="{{$student->id}}">
                                            <td style="vertical-align:middle">{{$student->user->username}}</td>
                                            <td style="vertical-align:middle">{{$student->user->fullname}}</td>
                                            <td style="vertical-align:middle"><center><input name="valuation_1[{{$i}}]" type="text" class="form-control" style="text-align:center;" value="{{$student->valuation_1}}"></center></td>
                                            <td style="vertical-align:middle"><center><input name="valuation_2[{{$i}}]" type="text" class="form-control" style="text-align:center;" value="{{$student->valuation_2}}"></center></td>
                                            <td style="vertical-align:middle"><center><input name="valuation_3[{{$i}}]" type="text" class="form-control" style="text-align:center;" value="{{$student->valuation_3}}"></center></td>
                                            <td style="vertical-align:middle"><center><input name="valuation_4[{{$i}}]" type="text" class="form-control" style="text-align:center;" value="{{$student->valuation_4}}"></center></td>
                                        </tr>
                                        <?php $i++ ?>
                                    @endforeach                                                                                                                                
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('additional-js')
<script src="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="https://www.its.ac.id/tmaterial/simkp/public/template/assets/js/init-scripts/data-table/datatables-init.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://www.its.ac.id/tmaterial/simkp/public/template/vendors/chosen/chosen.jquery.min.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery("#bootstrap-data-table-export").dataTable({
            "bLengthChange": false,
            paging:false,
            "bDestroy":true,
        });
    });
</script>
@endsection