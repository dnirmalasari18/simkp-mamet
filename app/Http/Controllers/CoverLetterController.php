<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Group;
use PDF;
class CoverLetterController extends Controller
{
  public function index(){
    //$groups=Group::where('status',Group::statusAll()[2])->get();
    $groups=Group::select('*')->where('status','1')->orWhere('status','2')
                  ->get();
    return view('cover_letter.index')->with('groups',$groups);
  }

  public function download(Request $request){    
    $this->validate($request, [
      'date' => 'required',
      'number' => 'required',
      'to' => 'required',
    ]);
    
    $group = Group::find($request->group_id);
    $group->status = 2;
    $group->save();
    
    $duration=CoverLetterController::diffInWeeks($group->start_date, $group->end_date);
    $group->start_date = \App\Utils::IndonesianDate($group->start_date);
    $group->end_date = \App\Utils::IndonesianDate($group->end_date);
    
    
    $pdf= PDF::loadView('cover_letter.template',['group'=>$group,'number'=>$request->number,'date'=>$request->date, 'to'=>$request->to, 'duration'=>$duration])->setPaper('a4','potrait');
    //return $pdf->download($request->number.".pdf");
    return view('cover_letter.template')->with('group',$group)->with('number',$request->number)->with('date',$request->date)->with('to',$request->to)->with('duration',$duration);    
  }


  public function diffInWeeks($date1, $date2){
    //$end= strtotime($date2)/60/60/24/7);
  return ceil(abs(strtotime($date2) - strtotime($date1)) / 60 / 60 / 24 / 7);
  }
}