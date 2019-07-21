<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentDetail;
use App\Period;
use Alert;

class ValuationController extends Controller
{
    //
    public function communal(){
        $groups = Period::find(1)->groups;        
        $students = [];
        foreach($groups as $group){
            foreach($group->studentsdetails as $student){
                $students[] = $student;
            }
        }

        return view('valuation.communals')->with('students', $students);
    }

    public function editCommunal(){
        $groups = Period::find(1)->groups;        
        $students = [];
        foreach($groups as $group){
            foreach($group->studentsdetails as $student){
                $students[] = $student;
            }
        }

        return view('valuation.edit')->with('students', $students);
    }
    
    public function store(Request $request){
        // dd($request);
        $ids = $request->id;
        $valuation_1 = $request->valuation_1;
        $valuation_2 = $request->valuation_2;
        $valuation_3 = $request->valuation_3;
        $valuation_4 = $request->valuation_4;

        for($i = 0;$i < sizeof($ids); $i++){
            $student = StudentDetail::find($ids[$i]);
            $student->valuation_1 = $valuation_1[$i];
            $student->valuation_2 = $valuation_2[$i];
            $student->valuation_3 = $valuation_3[$i];
            $student->valuation_4 = $valuation_4[$i];
            $student->valuation = ($valuation_1[$i] + $valuation_2[$i] + $valuation_3[$i] + $valuation_4[$i])/4;
            $student->save();
        }

        Alert::success('Success', 'Nilai berhasil disimpan');
        return redirect()->route('valuation.communal');
    }
}
