@extends('template.master')

@section('page-title')
Daftar Akun
@endsection
@section('additional-css')

<link rel="stylesheet" href="{!!secure_asset('template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')!!}">
<link rel="stylesheet" href="{!!secure_asset('template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')!!}">
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row" style="margin-bottom:15px;">
            <div class="col-lg-12" >
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodalAkunTambah"style="float:right; width:25%;">Tambah Akun</button>
            </div>            
        </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-dosen-tab" data-toggle="tab" href="#nav-dosen" role="tab" aria-controls="nav-dosen" aria-selected="true">Dosen</a>
                                        <a class="nav-item nav-link" id="nav-mahasiswa-tab" data-toggle="tab" href="#nav-mahasiswa" role="tab" aria-controls="nav-mahasiswa" aria-selected="false">Mahasiswa</a>    
                                        <a class="nav-item nav-link" id="nav-tendik-tab" data-toggle="tab" href="#nav-tendik" role="tab" aria-controls="nav-tendik" aria-selected="false">Tenaga Pendidik</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-dosen" role="tabpanel" aria-labelledby="nav-dosen-tab">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered display">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align:middle">Nama</th>                                                    
                                                    <th style="vertical-align:middle">No HP</th>
                                                    <th style="vertical-align:middle">Banyak Membimbing</th>
                                                    <th style="vertical-align:middle">Banyak Membimbing Periode Aktif</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dosen as $user)
                                                    <tr>
                                                        <td style="vertical-align:middle">{{$user->fullname}}</td>                                                        
                                                        <td style="vertical-align:middle">{{$user->phone_number}}</td>
                                                        <td style="vertical-align:middle">{{$user->lecturing->count()}}</td>
                                                        <td style="vertical-align:middle">{{$user->lecturing->where('period_id', App\Period::current()->id)->count()}}</td>
                                                        <td style="vertical-align: middle;">
                                                            <center><a href="{{route('lecturer.show', ['id' => $user->id])}}"><button type="button" class="btn btn-info btn-sm" style="border-radius:3px;">Lihat</button></a></center>
                                                        </td>
                                                        <td style="vertical-align:middle">
                                                            <center>
                                                                <span style="display:block;">
                                                                    <button id="{{$user->id}}" type="submit" class="btn btn-primary btn-sm btn-edit"  data-toggle="modal" data-target="#scrollmodalAkunEdit"style="border-radius:3px; width:70px;">Edit</button>
                                                                </span>
                                                                <span style="display:block; padding-block:5px; ">
                                                                    <form action="{{route('user.delete')}}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$user->id}}">
                                                                        <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px; width:70px;">Hapus</button>
                                                                    </form>
                                                                </span>
                                                            </center>
                                                        </td>
                                                    </tr>                                             
                                                @endforeach                                                     
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="nav-mahasiswa" role="tabpanel" aria-labelledby="nav-mahasiswa-tab">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered display">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align:middle">NRP</th>
                                                    <th style="vertical-align:middle;">Nama Lengkap</th>
                                                    <th style="vertical-align:middle;">No HP</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($mahasiswa as $user)
                                                    <tr>
                                                        <td style="vertical-align:middle">{{$user->username}}</td>
                                                        <td style="vertical-align:middle">{{$user->fullname}}</td>
                                                        <td style="vertical-align:middle">{{$user->phone_number}}</td>
                                                        <td style="vertical-align:middle; width:10%;">
                                                            <center>
                                                                <span style="display:block;">
                                                                    <button id="{{$user->id}}" type="submit" class="btn btn-primary btn-sm btn-edit"  data-toggle="modal" data-target="#scrollmodalAkunEdit"style="border-radius:3px; width:70px;">Edit</button>
                                                                </span>
                                                                <span style="display:block; padding-block:5px; ">
                                                                    <form action="{{route('user.delete')}}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$user->id}}">
                                                                        <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px; width:70px;">Hapus</button>
                                                                    </form>
                                                                </span>
                                                            </center>
                                                        </td>
                                                    </tr>                                          
                                                @endforeach                                                        
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="nav-tendik" role="tabpanel" aria-labelledby="nav-tendik-tab">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered display">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align:middle">NRP</th>
                                                    <th style="vertical-align:middle;">Nama Lengkap</th>
                                                    <th style="vertical-align:middle;">No HP</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tendik as $user)
                                                    <tr>
                                                        <td style="vertical-align:middle">{{$user->username}}</td>
                                                        <td style="vertical-align:middle">{{$user->fullname}}</td>
                                                        <td style="vertical-align:middle">{{$user->phone_number}}</td>
                                                        <td style="vertical-align:middle; width:10%;">
                                                            <center>
                                                                <span style="display:block;">
                                                                    <button id="{{$user->id}}" type="submit" class="btn btn-primary btn-sm btn-edit"  data-toggle="modal" data-target="#scrollmodalAkunEdit"style="border-radius:3px; width:70px;">Edit</button>
                                                                </span>
                                                                <span style="display:block; padding-block:5px; ">
                                                                    <form action="{{route('user.delete')}}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$user->id}}">
                                                                        <button type="submit" class="btn btn-secondary btn-sm" style="border-radius:3px; width:70px;">Hapus</button>
                                                                    </form>
                                                                </span>
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
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="modal fade" id="scrollmodalAkunTambah" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('user.create')}}" method="post">
            @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Milik</strong></label>
                    <select name="role" id="select" class="form-control">
                        <option value=""></option>
                        <option value="dosen">Dosen</option>
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="tendik">Tenaga Pendidik</option>
                    </select>
                    @error('role')
                        <small class="help-block form-text" style="color:red">Harap memilih salah satu opsi</small>
                    @enderror    
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>NIP/NRP</strong></label>
                    <input name="username" type="text" id="postal-code" class="form-control">
                    @error('username')
                        <small class="help-block form-text" style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Nama</strong></label>
                    <input name="fullname" type="text" id="postal-code" class="form-control">
                    @error('fullname')
                        <small class="help-block form-text" style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>No HP</strong></label>
                    <input name="phone_number" type="test" id="postal-code" class="form-control">
                    @error('phone_number')
                        <small class="help-block form-text" style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Password</strong></label>
                    <input name="password" type="password" id="postal-code" class="form-control">
                    @error('password')
                        <small class="help-block form-text" style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Konfirmasi Password</strong></label>
                    <input name="password_confirmation" type="password" id="postal-code" class="form-control">
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
<div class="modal fade" id="scrollmodalAkunEdit" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('user.edit')}}" method="post">
            @csrf
                <input type="hidden" class="edit-id" name="id" value="">
                <div class="modal-header">
                <h5 class="modal-title edit-user" id="scrollmodalLabel">Akun ((SAPA GITU)))</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Milik</strong></label>
                    <select name="role" id="select" class="form-control edit-role" disabled>
                        <option value=""></option>
                        <option value="dosen">Dosen</option>
                        <option value="mahasiswa">Mahasiswa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Kode Dosen/NRP</strong></label>
                    <input name="username" type="text" id="postal-code" class="form-control edit-username">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Nama</strong></label>
                    <input name="fullname" type="text" id="postal-code" class="form-control edit-fullname">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>No HP</strong></label>
                    <input name="phone_number" type="test" id="postal-code" class="form-control edit-phone_number">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Password</strong></label>
                    <input name="password" type="password" id="postal-code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="postal-code" class=" form-control-label"><strong>Konfirmasi Password</strong></label>
                    <input name="password_confirmation" type="password" id="postal-code" class="form-control">
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
<script src="{!!secure_asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js')!!}"></script>
<script src="{!!secure_asset('template/vendors/datatables.net-buttons/js/buttons.colVis.min.js')!!}"></script>
<script src="{!!secure_asset('template/assets/js/init-scripts/data-table/datatables-init.js')!!}"></script>
@if ($errors->any())
<script>
    jQuery(document).ready(function(){
        jQuery('#scrollmodalAkunTambah').modal('show');
    })
</script>    
@endif
<script>
    jQuery(document).ready(function() {
        var user = {!!$users!!}
                
        jQuery('table.display').DataTable();

        jQuery('.btn-edit').click(function(){            
            console.log(jQuery(this).attr('id'))            
            var p;            
            for (var i = 0; i < user.length; i++) {
                if (user[i].id == jQuery(this).attr('id')) {
                    p = user[i];
                    break;
                }
            };
            jQuery('.edit-id').val(p.id)
            jQuery('.edit-user').text('Akun' + p.fullname)
            jQuery('.edit-role').val(p.role)
            jQuery('.edit-username').val(p.username)
            jQuery('.edit-fullname').val(p.fullname)
            jQuery('.edit-phone_number').val(p.phone_number)
        })        
    } );
</script>
@endsection