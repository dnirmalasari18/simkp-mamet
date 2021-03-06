<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{    
    /**
	 * Display user list.
	 *
	 * @return Response
	 */
    public function index(){
        $users = User::all();
        $dosen = User::where('role','!=','mahasiswa')->orderBy('fullname')->get();
        $mahasiswa = User::where('role','mahasiswa')->orderBy('username')->get();
        $tendik = User::where('role','tendik')->orderBy('username')->get();
        return view('user.index')->with('dosen',$dosen)->with('mahasiswa',$mahasiswa)->with('tendik', $tendik)->with('users', $users);
    }    

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function create(){
        return view('user.create');    
    }

    /**
	 * Store a user in storage via coordinator
	 *
	 * @return Response
	 */
    public function store(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'fullname' => 'required',
            'phone_number' => 'required',
            'password' => 'required|confirmed',
            'role' => 'required',
        ],$message=[
            'required'=>'Atribut di atas perlu diisi',
            'confirmed'=>'Atribbt pada password dan konfirmasi password tidak boleh berbeda'
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

    /**
	 * Update user information
	 *
	 * @return Response
	 */
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

    /**
	 * Delete user.
	 *
	 * @return Response
	 */
    public function destroy(Request $request){
        $user = User::find($request->id);
        $user->delete();
        Alert::success('Success', 'Akun telah berhasil dihapus');
        return redirect()->route('user.index');
    }
    
    /**
	 * User login.
	 *
	 * @return Response
	 */
    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required',            
            'password' => 'required',
        ]);
        
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){            
            Alert::success('Success', 'Berhasil login');
            $user = Auth::user();
            if($user->role == 'tendik'){
                return redirect()->route('cover_letter.index');
            }
            else return redirect()->route('group.index');
        } else {
            return redirect()->back()->withErrors([
                'approve' => 'Username atau password yang anda masukkan salah',]);
        }
    }

    /**
	 * Store a student in storage.
	 *
	 * @return Response
	 */
    public function register(Request $request){      
          
        $this->validate($request, [
            'username' => 'required',
            'fullname' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:6|confirmed',
        ],$messages=[
            'required' => 'Atribut di atas perlu diisi',
            'min' => 'Atribut perlu diisi minimal :min karakter',
            'confirmed' => 'Atribut pada password dan konfirmasi password tidak boleh berbeda'
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

    /**
	 * Display reset password form.
	 *
	 * @return Response
	 */
    public function reset(){
        return view('auth.passwords.reset');
    }

    /**
	 * Reset password
	 *
	 * @return Response
	 */
    public function doReset(Request $request){
        $this->validate($request, [
            'password_old' => 'required',
            'password' => 'required|min:6|confirmed',            
        ],$messages = [
            'required' => 'Atribut di atas perlu diisi',
            'min' => 'Atribut perlu diisi minimal :min karakter',
            'confirmed' => 'Atribut pada password dan konfirmasi password tidak boleh berbeda'
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
