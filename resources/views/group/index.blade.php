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
                                        <th>Status</th>
                                        <th>Peserta</th>
                                        <th>Perusahaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $group)
                                        <tr>
                                            <td>{{strtoupper($group->status)}}</td>
                                            <td>                                                                                                
                                                @foreach ($group->students as $student)                                                    
                                                    - {{$student->fullname}} <br>
                                                @endforeach                                                
                                            </td>
                                            <td>{{$group->corp->name}}</td>
                                        </tr>    
                                    @endforeach                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div><!-- .animated -->
    </div>
@endsection