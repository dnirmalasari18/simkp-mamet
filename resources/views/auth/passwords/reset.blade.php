@extends('template.master')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Ganti Password</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{route('reset')}}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="postal-code" class=" form-control-label"><strong>Password Lama</strong></label>
                                <input name="password_old" type="password" id="postal-code" placeholder="Password Lama" class="form-control">
                                @error('password_old')
                                    <small class="help-block form-text" style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="postal-code" class=" form-control-label"><strong>Password Baru</strong></label>
                                <input name="password" type="password" id="postal-code" placeholder="Password Baru" class="form-control">
                                @error('password')
                                    <small class="help-block form-text" style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="postal-code" class=" form-control-label"><strong>Konfirmasi Password Baru</strong></label>
                                <input name="password_confirmation" type="password" id="postal-code" placeholder="Konfirmasi Password Baru" class="form-control">
                            </div>                   
                            <button type="submit" class="btn btn-primary">Simpan</button> 
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>              
@endsection