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
        $periodIDs = $request->periodIDs;
        // $periodIDs = 1;
        $period = Period::find($periodIDs);
        
        $counts = DB::select('SELECT  COUNT(groups.`id`) AS group_count, corps.name FROM groups ,corps WHERE groups.period_id = 1 AND groups.`corp_id` = corps.id GROUP BY corps.name');

        // dd($counts);
        $res = [];
        foreach($counts as $count){            
            $arr = array('label' => $count->name, 'value' => $count->group_count);
            // $json = json_encode($arr);
            array_push($res, $arr);
        }

        return response()->json([$res], 200);
    }
}
