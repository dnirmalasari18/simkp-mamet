<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use Alert;

class PeriodController extends Controller
{
    //
    public function index(){
        $periods = Period::orderBy('created_at')->get();
        return view('period.index')->with('periods',$periods);
    }

    public function store(Request $request){
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'final_date' => 'required',            
        ],$message=[
            'required' =>'Atribut di atas perlu diisi',
        ]);

        $activePeriod = Period::where('active',1);
        if ($activePeriod->count()){
            $activePeriod = $activePeriod->first();
            $activePeriod->active = 0;
            $activePeriod->save();
        }        

        Period::create([
            'name' =>  request('name'),
            'start_date' =>  request('start_date'),
            'end_date' =>  request('end_date'),
            'final_date' =>  request('final_date'),
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
        $period->active = 0;
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

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'final_date' => 'required',            
        ]);

        $period = Period::find($request->id);
        $period->name = $request->name;
        $period->start_date = $request->start_date;
        $period->end_date = $request->end_date;
        $period->final_date = $request->final_date;
        $period->save();

        Alert::success('Success', 'Data telah tersimpan');
        return redirect()->route('period.index');
    }
}
