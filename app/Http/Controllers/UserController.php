<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        $dosen = User::where('role','!=','mahasiswa')->orderBy('fullname')->get();
        $mahasiswa = User::where('role','mahasiswa')->orderBy('username')->get();
        return view('user.index')->with('dosen',$dosen)->with('mahasiswa',$mahasiswa)->with('users', $users);
    }

    public function create(){
        return view('user.create');    
    }

    public function store(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'fullname' => 'required',
            'phone_number' => 'required',
            'password' => 'required|confirmed',
            'role' => 'required',
        ]);

        User::create([
            'username' => request('username'),
            'fullname' => request('fullname'),
            'phone_number' => request('phone_number'),
            'password' => bcrypt(request('password')),
            'role' => request('role'),
        ]);

        Alert::success('Success', 'Data telah tersimpan');
        return redirect()->route('user.index');
    }

    public function edit($id){
        $user = User::find($id);
        return view('user.edit')->with('user',$user);    
    }

    public function update(Request $request){
        // dd($request);
        $this->validate($request, [
            'id' => 'required',
            'username' => 'required',
            'fullname' => 'required',
            'phone_number' => 'required',                        
        ]);
        
        $user = User::find(request('id'));
        $user->username = request('username');
        $user->fullname = request('fullname');
        $user->phone_number = request('phone_number');                        

        if($request->password != null){            
            $this->validate($request, [
                'password' => 'required|confirmed'
            ]);
            $user->password = bcrypt(request('password'));
        }
        $user->save();
        
        Alert::success('Success', 'Data telah tersimpan');
        return redirect()->route('user.index');
    }

    public function destroy(Request $request){
        $user = User::find($request->id);
        $user->delete();
        Alert::success('Success', 'Akun telah berhasil dihapus');
        return redirect()->route('user.index');
    }

    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required',            
            'password' => 'required',
        ]);
        
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){            
            Alert::success('Success', 'Berhasil login');
            return redirect()->route('group.index');
        } else {
            Alert::error('Error', 'Username atau password salah');
            return redirect()->back();
        }
    }

    public function register(Request $request){
        // dd($request);
        $this->validate($request, [
            'username' => 'required',
            'fullname' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'username' => request('username'),
            'fullname' => request('fullname'),
            'phone_number' => request('phone_number'),
            'password' => bcrypt(request('password')),
            'role' => 'mahasiswa',
        ]);
        Alert::success('Success', 'Selamat datang di SimKP');
        return redirect()->route('login');
    }

    public function reset(){
        return view('auth.passwords.reset');
    }

    public function doReset(Request $request){
        $this->validate($request, [
            'password_old' => 'required',
            'password' => 'required|confirmed',            
        ]);
        $user = Auth::user();

        if ($user->password == bcrypt(request('password_old'))){
            $user->password = bcrypt(request('password'));
            $user->save();

            Alert::success('Success', 'Password berhasil diganti');
        } else {
            Alert::error('Error', 'Password lama salah');
        }
        
        return redirect()->route('reset');
    }
}
