<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(Request $request){
    $my_id = Auth::user()->id;
    $my_type = DB::table('users')
    ->where('id', $my_id)
    ->first();
    $pass_count = $request->session()->get('pass_count');
    $dot = str_repeat('●', $pass_count);
        return view('users.profile', compact('my_type', 'dot'));
    }
    public function search(){
        return view('users.search');
    }
}
