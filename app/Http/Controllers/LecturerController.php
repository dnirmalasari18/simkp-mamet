<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Group;
use App\Report;
use App\Notification;
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

        // $group = Group::find($request->group_id);
        // $group->lecturer_id = $request->lecturer_id;
        // $group->save();

        $notif = new Notification;
        $notif->user_id = $request->lecturer_id;
        $notif->notifiable_id = $request->group_id;
        $notif->notifiable_type = 'group';
        $notif->is_read = false;
        $notif->save(); 

        Alert::success('Success', 'Permintaan telah terkirim ke dosen');
        return redirect()->back();
    }

    public function assign(Request $request){
        foreach($request->groups as $groupid){
            // $group = Group::find($groupid);
            // $group->lecturer_id = $request->id;
            // $group->save();

            $notif = new Notification;
            $notif->user_id = $request->lecturer_id;
            $notif->notifiable_id = $groupid;
            $notif->notifiable_type = 'group';
            $notif->is_read = false;
            $notif->save(); 
        }
        Alert::success('Success', 'Permintaan telah terkirim ke dosen');
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

    public function acceptGroup(Request $request){
        $group = Group::find($request->group_id);
        $group->lecturer_id = Auth::user()->id;
        $group->save();

        $notif = Notification::find($request->notif_id);        
        $notif->delete();        

        Alert::success('Success', 'Data telah tersimpan');
        return redirect()->back();
    }

    public function declineGroup(Request $request){        
        $notif = Notification::find($request->notif_id);        
        $notif->delete();        

        Alert::success('Success', 'Data telah tersimpan');
        return redirect()->back();
    }

    public function acceptLog(Request $request){
        // dd($request);
        foreach($request->reports as $reportid){
            $report = Report::find($reportid);
            $report->status = 1;
            $report->save();
        }
        Alert::success('Success', 'Log telah disetujui');
        return redirect()->back();
    }
}
