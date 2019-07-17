<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentDetail;
use Alert;

class ValuationController extends Controller
{
    //
    public function store(Request $request){
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
            $student->save();
        }

        Alert::success('Success', 'Nilai berhasil disimpan');
        return redirect()->back();
    }
}
