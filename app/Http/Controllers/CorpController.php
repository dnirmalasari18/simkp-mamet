<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corp;
use App\CorpNote;
use RealRashid\SweetAlert\Facades\Alert;

class CorpController extends Controller
{
    public function show($id){
        $corp = Corp::find($id);
        return view('corp.show')->with('corp', $corp);
    }

    public function noteStore(Request $request){
        $this->validate($request, [
            'corp_id' => 'required',
            'detail' => 'required'
        ]);

        $note = new CorpNote;
        $note->fill($request->all());
        $note->save();

        Alert::success('Success', 'Catatan berhasil disimpan');
        return redirect()->back();
    }

    public function noteDelete(Request $request){
        // dd($request);
        $note = CorpNote::find($request->id);
        $note->delete();

        Alert::success('Success', 'Catatan berhasil dihpaus');
        return redirect()->back();
    }
}
