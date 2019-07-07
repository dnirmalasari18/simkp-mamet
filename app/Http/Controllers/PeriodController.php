<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use App\Alert;

class PeriodController extends Controller
{
    //
    public function index(){
        $periods = Period::orderBy('created_at')->get();
        return view('period.index')->with('periods',$periods);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $activePeriod = Period::where('active',1)->first();
        $activePeriod->active = 0;
        $activePeriod->save();

        Period::create([
            'name' =>  request('name'),
            'start_date' =>  request('start_date'),
            'end_date' =>  request('end_date'),
            'active' => 1,
        ]);

        Alert::success('Success', 'Period baru berhasil dibuat');
        return redirect()->route('period.index');
    }

    public function activate(Request $request){
        $period = Period::find($request->id);
        $period->active = 1;
        $period->save();
        Alert::success('Success', 'Periode telah diaktifkan');
        return redirect()->route('period.index');        
    }

    public function deactivate(Request $request){
        $period = Period::find($request->id);
        $period->active = 1;
        $period->save();
        Alert::success('Success', 'Periode telah dinonaktifkan');
        return redirect()->route('period.index');        
    }

    public function destroy(Request $request){
        $period = Period::find($request->id);        
        $period->delete();
        Alert::success('Success', 'Periode telah dihapus');
        return redirect()->route('period.index');        
    }
}
