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

  public function download(Request $request){    
    $this->validate($request, [
      'date' => 'required',
      'number' => 'required',
      'to' => 'required',
    ]);
    
    $group = Group::find($request->group_id);
    // $pdf = PDF::loadView('cover_letter.template', compact('group'));
    // return $pdf->download('invoice.pdf');
    
    return view('cover_letter.template')->with('group',$group)->with('number',$request->number)->with('date',$request->date)->with('to',$request->to);    
  }
}