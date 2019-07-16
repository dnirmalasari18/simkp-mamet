<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Group;
use PDF;
class CoverLetterController extends Controller
{
  public function index(){
    $groups=Group::all();
    return view('cover_letter.index')->with('groups',$groups);
  }

  public function download($id){
    $group = Group::find($id);
    $pdf = PDF::loadView('cover_letter.template', compact('group'));
    return $pdf->download('invoice.pdf');
    
    //return view('cover_letter.template')->with('group',$group)->with('number',$number)->with('date',$date)->with('to',$to);
    //return "Hi $to";
    
  }
}