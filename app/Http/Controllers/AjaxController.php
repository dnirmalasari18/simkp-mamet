<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corp;
use App\Group;

class AjaxController extends Controller
{
    //
    public function getCorp(Request $request){
        $corp = Corp::find($request->id);
        return response()->json(['corp' => $corp], 200);
    }

    public function getStudent(Request $request){
        $group = Group::find($request->id);
        // return response()->json(['group' => $group], 200);
        $students = $group->students;

        return response()->json(['students' => $students], 200);
    }
}
