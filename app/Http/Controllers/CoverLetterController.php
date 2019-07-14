<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use PDF;
class CoverLetterController extends Controller
{
  public function index(){
    $groups=Group::all();
    return view('mockup.coba-surat')->with('groups',$groups);
  }
<<<<<<< HEAD
  public function download($id){
    $group = Group::find($id);
        $lecturers = User::where('role', 'dosen')->orderBy('username')->get();
        return view('group.show')->with('group',$group)->with('lecturers', $lecturers);
=======

  public function downloadPDF($id){
    $group = Group::find($id);
    return view('surat')->with('group',$group);
>>>>>>> bdf0ce14efbf4f85ccdb07b0a2eefdc8bc7ebfe0
  }
}
