<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function index(){
        Alert::success('Success Title', 'Success Message');
        return view('mockup.coba-berita');
    }
}