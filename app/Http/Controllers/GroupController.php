<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\Corp;
use App\Period;
use App\StudentDetail;
use Alert;

class GroupController extends Controller
{
    //
    public function index(){        
        $groups = Group::all();
        return view('group.index')->with('groups',$groups);
    }

    public function show($id){
        $group = Group::find($id);        
        return view('group.show')->with('group',$group);
    }

    public function create(){
        $corps = Corp::all();
        return view('group.create')->with('corps',$corps);
    }

    public function store(Request $request){        
        // dd(Auth::user());
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
