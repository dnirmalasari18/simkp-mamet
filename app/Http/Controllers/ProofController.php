<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Group;
use Alert;

class ProofController extends Controller
{
    //
    public function store(Request $request){
        $this->validate($request,[
            'id' => 'required',
            'file' => 'required'
        ]);

        if ($request->hasFile('file')){            
            $allowedfileExtension=['jpg','png'];
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);                
            if($check){                    
                $path = $file->store('proof');
                $group = Group::find($request->id);

                if($group->proof_path != null){
                    Storage::delete($group->proof_path);
                }

                $group->proof_path = $path;
                $group->save();

                Alert::success('Succees', 'File berhasil diupload');
            } else Alert::error('Error', 'Pastikan extensi file berupa .jpg atau .png');            
        } else Alert::error('Error', 'File gagal diupload');

        return redirect()->route('group.show',$request->id);
    }
}
