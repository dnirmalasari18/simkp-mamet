<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use Alert;

class LecturerController extends Controller
{
    //
    public function show($id){
        $lecturer = User::find($id);
        return view('lecturer.show')->with('lecturer', $lecturer);
    }

    public function assign(Request $request){
        foreach($request->groups as $groupid){
            $group = Group::find($groupid);
            $group->lecturer_id = $request->id;
            $group->save();
        }
        Alert::success('Success', 'Data telah tersiman');
        return redirect()->back();
    }

    public function unassign(Request $request){
        foreach($request->groups as $groupid){
            $group = Group::find($groupid);
            $group->lecturer_id = null;
            $group->save();
        }
        Alert::success('Success', 'Data telah tersiman');
        return redirect()->back();
    }
}
