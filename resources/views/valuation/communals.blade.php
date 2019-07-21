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
                            <div class="row" style="margin-bottom:1rem;">
                                <div class="col-md-4">
                                    <select data-placeholder="Pilih Periode" class="standardSelect" tabindex="1">
                                        <option value="4">2015/2016 Gasal</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px; width:70px; margin-left:10px;height:1.54rem;padding:.1rem.5rem;margin-left:0;">Submit</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('valuation.communal.edit')}}"><button type="submit" class="btn btn-primary" style="float:right;border-radius:3px; width:200px; margin-left:10px;">Ubah Nilai</button></a>
                                </div>
                            </div>
                            <table id="bootstrap-data-table-export" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th  style="vertical-align:middle;width:100px;" >NRP</th>
                                    <th  style="vertical-align:middle">Nama</th>
                                    <th style="vertical-align:middle;width:100px;"><center>N1</center></th>
                                    <th style="vertical-align:middle;width:100px;"><center>N2</center></th>
                                    <th style="vertical-align:middle;width:100px;"><center>N3</center></th>
                                    <th style="vertical-align:middle;width:100px;"><center>N4</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td style="vertical-align:middle">{{$student->user->username}}</td>
                                    <td style="vertical-align:middle">{{$student->user->fullname}}</td>
                                    <td style="vertical-align:middle"><center>{{$student->valuation_1}}</center></td>
                                    <td style="vertical-align:middle"><center>{{$student->valuation_2}}</center></td>
                                    <td style="vertical-align:middle"><center>{{$student->valuation_3}}</center></td>
                                    <td style="vertical-align:middle"><center>{{$student->valuation_4}}</center></td>
                                </tr>
                                @endforeach                                                                
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
<script src="{!!asset('template/vendors/jszip/dist/jszip.min.js')!!}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="{!!asset('template/vendors/chosen/chosen.jquery.min.js')!!}"></script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            no_results_text: "Oops, Periode tidak ditemukan",
            width: "100%"
        });
        
        jQuery("#bootstrap-data-table-export").dataTable({
            "bLengthChange": false,
            paging:false,
            "bDestroy":true,
            dom: 'Bfrtip',
            buttons: [
                'copy',
                {
                    extend: 'excel',
                    filename: 'NilaiKPIntegra',
                    header:false,
                },
            ]
        });
    });
</script>
@endsection