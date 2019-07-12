<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LecturerController extends Controller
{
    //
    public function show($id){
        $lecturer = User::find($id);
        return view('lecturer.show')->with('lecturer', $lecturer);
    }
}
