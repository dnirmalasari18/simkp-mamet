<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\Corp;
use App\Period;
use App\StudentDetail;
use APp\Report;
use App\User;
use App\GroupRequest;
use App\Notification;
use Alert;
class GroupController extends Controller
{
    //
    public function index(){
        // dd(Auth::user()->notifications);
        
        if(Auth::check()){
            if(Auth::user()->role == 'mahasiswa'){
                $groups = Auth::user()->groups;
            } else if (Auth::user()->role == 'dosen'){
                $groups = Auth::user()->lecturing->where('period_id', Period::current()->id);
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
        $lecturers = User::where('role', 'dosen')->orderBy('username')->get();
        
        $group->start_date = \App\Utils::IndonesianDate($group->start_date);
        $group->end_date = \App\Utils::IndonesianDate($group->end_date);
        return view('group.show')->with('group',$group)->with('lecturers', $lecturers);
    }

    public function create(){
        $corps = Corp::all();
        $users = User::where('role','mahasiswa')->where('id','!=', Auth::user()->id)->orderBy('fullname','asc')->get();
        return view('group.create')->with('corps',$corps)->with('users',$users);
    }

    public function store(Request $request){
        $this->validate($request, [
            'corporation.name' => 'required',
			'corporation.city' => 'required',
			'corporation.address' => 'required',
			'corporation.type' => 'required',
            'corporation.profile' => 'required',
            'corporation.post' => 'required',
			'group.start_date' => 'required|date|before:'.$request['group']['end_date'],
            'group.end_date' => 'required|date',
            'group.type' => 'required',
        ]);
        $friend = $request->friend;
        $request = $request->all();
        $creq = $request['corporation'];
        $greq = $request['group'];

        # check if student 1 has created group in the same semester
		$now = Period::current();
		$student_groups = Auth::user()->groups->where('period_id', $now->id);
		foreach ($student_groups as $group) {
			if ($group->status['status'] >= 0) {
                Alert::error('Error', 'Ada pengajuan yang belum kamu selesaikan');
                return redirect()->back();
			}
		}

        # Check if student 2 has created group in the same semester
        $friend_id = $request['friend'];
        $student2 = User::find($friend_id);
		if ($student2 != null) {
			$groups = $student2->groups->where('period_id', $now->id);
			foreach ($groups as $group) {
				if ($group->status['status'] >= 0) {
                    Alert::error('Error', 'Teman mu sudah tergabung dengan kelompok lain');
                    return redirect()->back()->with('you', true);
				}
			}
		}

        # fill corporation
        $corp = Corp::firstOrNew(array_only($creq, ['name', 'city']));
        $corp->fill($creq);
        $corp->save();

        # make group
        $group = new Group($greq);
		$group->corp()->associate($corp);
        $group->period()->associate(Period::current());
        $group->save();

        # connect group to student
        Auth::user()->groups()->save($group);

        if ($student2 != null) {
			# Create request for student 2
			$friend = new GroupRequest;
			$friend->group_id = $group->id;
			$friend->status = 0;
			$friend->save();

			# Create notification for student 2
			$notif = new Notification;
			$notif->user_id = $student2->id;
			$notif->notifiable_id = $friend->id;
			$notif->notifiable_type = 'group request';
			$notif->is_read = false;
			$notif->save();
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

    public function accept(Request $request)
	{
        $this->validate($request, [
            'req_id' => 'required',
            'notif_id' => 'required',
        ]);

        $groupreq = GroupRequest::find($request->req_id);
        $notif = Notification::find($request->notif_id);
		if ($groupreq != null) {
			$student = Auth::user();
            $groupreq->status = 1;
			$notif->is_read = 1;

			# check if alredy join group
			$now = Period::current();
			$student_groups = $student->groups->where('period_id', $now->id);
			foreach ($student_groups as $group) {
				if ($group->status['status'] >= 0) {
                    Alert::error('Error', 'Gagal bergabung karena sudah tergabung dengan kelompok lain');
					return redirect()->back();
				}
            }
            $notif->save();
			$groupreq->save();
			$student->groups()->attach($groupreq->group_id);
        }
        Alert::success('Success', 'Berhasil bergabung');
		return redirect()->back();
    }

    public function decline(Request $request)
	{
        $this->validate($request, [
            'id' => 'required'
        ]);

        $groupreq = GroupRequest::find($request->id);
		if ($groupreq != null) {
			$groupreq->status = -1;
			$groupreq->notification->is_read = 1;
            $groupreq->notification->save();
            Alert::success('Success', 'Berhasil ditolak');
			$groupreq->save();
		}
		return redirect()->back();
    }

    public function abstractUpdate(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'title' => 'required',
            'abstract' => 'required',
        ]);

        $group = Group::find($request->id);
        // if ($group->title != null){
        //     Alert::error('Error', 'Judul dan Abstrak tidak dapat diubah');
        //     return redirect()->back();
        // }

        $group->title = $request->title;
        $group->abstract = $request->abstract;
        $group->save();

        Alert::success('Success', 'Judul dan Abstrak berhasil disimpan');
        return redirect()->back();
    }

    public function destroy(Request $request){
        $this->validate($request, [
            'id' => 'required'
        ]);

        $group = Group::find($request->id);
        $group->students->delete();
        $group->reports->delete();
        $group->delete();
        Alert::success('Success', 'Group berhasil dihapus');
        return redirect()->back();
    }

}
