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

    public function assignGroup(Request $request){
        // dd($request);

        $this->validate($request, [
            'group_id' => 'required',
            'lecturer_id' => 'required'
        ]);

        $group = Group::find($request->group_id);
        $group->lecturer_id = $request->lecturer_id;
        $group->save();

        Alert::success('Success', 'Data telah tersimpan');
        return redirect()->back();
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

    public function acceptLog(Request $request){
        foreach($request->reports as $reportid){
            $report = Report::find($reportid);
            $report->status = 1;
            $report->save();
        }
        Alert::success('Success', 'Log telah disetujui');
        return redirect()->back();
    }
}
