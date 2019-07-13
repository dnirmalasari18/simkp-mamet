<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corp;

class StatisticController extends Controller
{
    //
    public function show(){
        $corps = Corp::with('notes')->get();

        return view('statistic.show')->with('corps', $corps);
    }
}
