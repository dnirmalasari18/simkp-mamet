@extends('template.master')

@section('page-title')
Kelompok
@endsection

@section('content')
<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">List Kelompok</strong>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div><!-- .animated -->
    </div>
@endsection