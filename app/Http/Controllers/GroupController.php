<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Corp;

class GroupController extends Controller
{
    //
    public function index(){        
        $groups = Group::all();
        return view('group.index')->with('groups',$groups);
    }

    public function show($id){
        $group = Group::find($id);
        return view('group.show')->with('group',$group);
    }

    public function create(){
        $corps = Corp::all();
        return view('group.create')->with('corps',$corps);
    }

    public function store(Request $request){
        $this->validate($request, [
            'corporation.name' => 'required',
			'corporation.city' => 'required',
			'corporation.address' => 'required',
			'corporation.business_type' => 'required',
			'corporation.description' => 'required',
			'group.start_date' => 'required|date|before:'.$request['group']['end_date'],
            'group.end_date' => 'required|date',
            // 'group.type' => 'required',
        ]);
        $request = $request->all();
        $creq = $request['corporation'];
        $greq = $request['group'];
        dd($creq);
        return redirect()->route('group.index');
    }
}
