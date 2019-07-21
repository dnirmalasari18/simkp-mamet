<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Corp;
use App\Group;
use App\Period;

class AjaxController extends Controller
{
    //
    public function getCorp(Request $request){
        $corp = Corp::find($request->id);
        return response()->json(['corp' => $corp], 200);
    }

    public function getStudent(Request $request){
        $group = Group::find($request->id);
        return response()->json(['group' => $group], 200);
        $students = $group->students;

        return response()->json(['students' => $students], 200);
    }

    public function getStatistic(Request $request){                             
        // return response()->json($request->period['IDs']);
        $periodIDs = $request->period['IDs'];
        // $periodIDs = [1,2];
        
        if(sizeof($periodIDs) == 1){ // Per semester
            $counts = DB::select('SELECT  COUNT(groups.`id`) AS group_count, corps.name FROM groups ,corps WHERE groups.period_id = '.$periodIDs[0].' AND groups.`corp_id` = corps.id GROUP BY corps.name');
        } else if(sizeof($periodIDs) == 2){ // 1 Tahun terakhir
            $counts = Group::select(DB::raw('count(*) as group_count, corps.name'))
            ->join('corps','groups.corp_id','=','corps.id')
            ->where('groups.period_id','=',$periodIDs[0])
            ->orWhere('groups.period_id','=',$periodIDs[1])
            ->groupBy('corps.name')->get();
        } else if(sizeof($periodIDs) == 4){ // 2 Tahun terakhir
            $counts = Group::select(DB::raw('count(*) as group_count, corps.name'))
            ->join('corps','groups.corp_id','=','corps.id')
            ->where('groups.period_id','=',$periodIDs[0])
            ->orWhere('groups.period_id','=',$periodIDs[1])
            ->orWhere('groups.period_id','=',$periodIDs[2])
            ->orWhere('groups.period_id','=',$periodIDs[3])
            ->groupBy('corps.name')->get();
        } else if(sizeof($periodIDs) == 6){ // 3 Tahun terakhir
            $counts = Group::select(DB::raw('count(*) as group_count, corps.name'))
            ->join('corps','groups.corp_id','=','corps.id')
            ->where('groups.period_id','=',$periodIDs[0])
            ->orWhere('groups.period_id','=',$periodIDs[1])
            ->orWhere('groups.period_id','=',$periodIDs[2])
            ->orWhere('groups.period_id','=',$periodIDs[3])
            ->orWhere('groups.period_id','=',$periodIDs[4])
            ->orWhere('groups.period_id','=',$periodIDs[5])
            ->groupBy('corps.name')->get();
        } else if(sizeof($periodIDs) == 8){ // 4 Tahun terakhir
            $counts = Group::select(DB::raw('count(*) as group_count, corps.name'))
            ->join('corps','groups.corp_id','=','corps.id')
            ->where('groups.period_id','=',$periodIDs[0])
            ->orWhere('groups.period_id','=',$periodIDs[1])
            ->orWhere('groups.period_id','=',$periodIDs[2])
            ->orWhere('groups.period_id','=',$periodIDs[3])
            ->orWhere('groups.period_id','=',$periodIDs[4])
            ->orWhere('groups.period_id','=',$periodIDs[5])
            ->orWhere('groups.period_id','=',$periodIDs[6])
            ->orWhere('groups.period_id','=',$periodIDs[7])
            ->groupBy('corps.name')->get();
        } else if(sizeof($periodIDs) == 10){ // 5 Tahun terakhir
            $counts = Group::select(DB::raw('count(*) as group_count, corps.name'))
            ->join('corps','groups.corp_id','=','corps.id')
            ->where('groups.period_id','=',$periodIDs[0])
            ->orWhere('groups.period_id','=',$periodIDs[1])
            ->orWhere('groups.period_id','=',$periodIDs[2])
            ->orWhere('groups.period_id','=',$periodIDs[3])
            ->orWhere('groups.period_id','=',$periodIDs[4])
            ->orWhere('groups.period_id','=',$periodIDs[5])
            ->orWhere('groups.period_id','=',$periodIDs[6])
            ->orWhere('groups.period_id','=',$periodIDs[7])
            ->orWhere('groups.period_id','=',$periodIDs[8])
            ->orWhere('groups.period_id','=',$periodIDs[9])
            ->groupBy('corps.name')->get();
        } 
                
        $res = [];
        foreach($counts as $count){            
            $arr = array('label' => $count->name, 'value' => $count->group_count);
            // $json = json_encode($arr);
            array_push($res, $arr);
        }

        return response()->json([$res], 200);
    }

    public function getStatisticC(){
        // return response()->json($request->period['IDs']);
        // $periodIDs = $request->period['IDs'];
        $periodIDs = [1,2];
        
        if(sizeof($periodIDs) == 1){            
            $counts = DB::select('SELECT  COUNT(groups.`id`) AS group_count, corps.name FROM groups ,corps WHERE groups.period_id = '.$periodIDs[0].' AND groups.`corp_id` = corps.id GROUP BY corps.name');
        } else if(sizeof($periodIDs) == 2){
            $counts = Group::select(DB::raw('count(*) as group_count, corps.name'))->join('corps','groups.corp_id','=','corps.id')->where('groups.period_id','=',$periodIDs[0])->orWhere('groups.period_id','=',$periodIDs[1])->groupBy('corps.name')->get();
        }
                
        $res = [];
        foreach($counts as $count){            
            $arr = array('label' => $count->name, 'value' => $count->group_count);
            // $json = json_encode($arr);
            array_push($res, $arr);
        }

        return response()->json([$res], 200);
    }

    public function getPeriodStudent(Request $request){
        $periodID = $request->id;
        $groups = Group::where('period_id','=',$periodID)->get();

        $students = [];
        foreach($groups as $group){
            foreach ($group->studentsdetails as $student) {
                $student->user;                
                array_push($students, $student);
            }
        }

        return response()->json($students,200);
    }

    public function getPeriodStudentC(){
        $periodID = 1;
        $groups = Group::where('period_id','=',$periodID)->get();

        $students = [];
        foreach($groups as $group){
            foreach ($group->studentsdetails as $student) {
                $student->user;
                // $student->username = $student->user->username;
                // $student->fullname = $student->user->fullname;
                array_push($students, $student);
            }
        }

        return response()->json($students,200);
    }
}
