<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\Corp;
use App\Period;
use App\StudentDetail;
use App\User;
use Alert;

class GroupController extends Controller
{
    //
    public function index(){        
        if(Auth::check()){
            if(Auth::user()->role == 'mahasiswa'){
                $groups = Auth::user()->groups;
            } else if (Auth::user()->role == 'dosen'){
                $groups = Auth::user()->lectured;
            } else if (Auth::user()->role == 'koordinator'){
                $groups = Group::orderBy('created_at','desc')->get();
            }
        } else {
            $groups = Group::all();
        }                
        return view('group.index')->with('groups',$groups);
    }

    public function show($id){
        $group = Group::find($id);        
        return view('group.show')->with('group',$group);
    }

    public function create(){
        $corps = Corp::all();
        $users = User::where('role','mahasiswa')->orderBy('fullname','asc')->get();
        return view('group.create')->with('corps',$corps)->with('users',$users);
    }

    public function store(Request $request){        
        // dd($request);
        $this->validate($request, [
            'corporation.name' => 'required',
			'corporation.city' => 'required',
			'corporation.address' => 'required',
			'corporation.type' => 'required',
			'corporation.profile' => 'required',
			'group.start_date' => 'required|date|before:'.$request['group']['end_date'],
            'group.end_date' => 'required|date',
            'group.type' => 'required',
        ]);
        $friend = $request->friend;
        $request = $request->all();
        $creq = $request['corporation'];
        $greq = $request['group'];

        $corp = Corp::firstOrNew(array_only($creq, ['name', 'city']));
        $corp->fill($creq);        
        $corp->save();
        
        $group = new Group($greq);
		$group->corp()->associate($corp);
        $group->period()->associate(Period::current());
        $group->status = "Menunggu Persetujuan Koordinator KP";
        $group->save();
        
        // Auth::user()->groups()->save($group, ['accepted' => 1]);
        StudentDetail::create([
            'group_id' => $group->id,
            'student_id' => Auth::user()->id,
            'accepted' => 1,
        ]);

        if ($friend != null){
            StudentDetail::create([
                'group_id' => $group->id,
                'student_id' =>$friend,
                'accepted' => 0,
            ]); 
        }

        Alert::success('Success', 'Data telah tersimpan');
        return redirect()->route('group.index');
    }

    public function statusUpdate(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'status' => 'required',
        ]);
        
        $group = Group::find($request->id);
        $group->status = $request->status;
        $group->save();

        Alert::success('Success', 'Status berhasil diubah');
        return redirect()->route('group.show',$request->id);
    }
}
