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
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">List Periode</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tahun Ajar</th>
                                        <th>Banyak KP</th>
                                        <th>Banyak Magang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2016/2017 Gasal</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>2016/2017 Genap</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>2017/2018 Gasal</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>2017/2018 Genap</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>2018/2019 Gasal</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>2018/2019 Genap</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>2019/2020 Genap</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Rhona Davidson</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Colleen Hurst</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Sonya Frost</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Jena Gaines</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Charde Marshall</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Haley Kennedy</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Tatyana Fitzpatrick</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Silva</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Paul Byrd</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Gloria Little</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Bradley Greer</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Dai Rios</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Jenette Caldwell</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Yuri Berry</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Caesar Vance</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Doris Wilder</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Angelica Ramos</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Gavin Joyce</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Jennifer Chang</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Brenden Wagner</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Fiona Green</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Shou Itou</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Michelle House</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Suki Burks</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Prescott Bartlett</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Gavin Cortez</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>Martena Mccray</td>
                                        <td>20</td>
                                        <td>5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                        <div class="card">
                            <div class="card-header"><strong> Periode</strong></div>
                            <div class="card-body card-block">
                                <label for="company" class=" form-control-label">Tahun Ajaran</label>
                                <div class="row form-group">
                                    <div class="col col-md-6"><input type="text" placeholder="Tahun Mulai" class="form-control"></div>
                                    <div class="col col-md-6"><input type="text" placeholder="Tahun Selesai" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-12">
                                        <div class="form-check-inline form-check">
                                            <label for="inline-radio1" class="form-check-label">
                                                <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input">Gasal
                                            </label>
                                            <label for="inline-radio2" class="form-check-label ">
                                                <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input" style="margin-left:50px">Genap
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions form-group" style="float:right;">
                                    <button type="submit" class="btn btn-primary btn-sm" style="width:150px;">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div><!-- .animated -->
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
@endsection