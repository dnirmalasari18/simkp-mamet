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
  public function downloadPDF($id){
    $group = Group::find($id);
    return view('surat');
  }
}
