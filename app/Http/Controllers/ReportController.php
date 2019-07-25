<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use Alert;

class ReportController extends Controller
{
    //
    public function store(Request $request){
        $this->validate($request,[
            'id' => 'required',
            'title' => 'required',
            'file' => 'required',
        ]);

        if ($request->hasFile('file')){            
            $allowedfileExtension=['jpg','png', 'doc', 'docx'];
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);                
            if($check){                    
                $path = $file->store('laporan');
                $report = Report::create([
                    'group_id' => $request->id,
                    'title' => $request->title,
                    'path' => $path,
                ]);
                Alert::success('Succees', 'Log berhasil diupload');
            } else Alert::error('Error', 'Pastikan extensi file berupa .jpg atau .png');            
        } else Alert::error('Error', 'Log gagal diupload');

        return redirect()->route('group.show',$request->id);
    }
}
