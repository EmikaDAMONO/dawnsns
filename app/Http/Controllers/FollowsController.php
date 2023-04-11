<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
    public function userSearch(Request $request){
        $SearchingUser = $request->input('userSearch');
        if ($SearchingUser) {
        $userSearch = DB::table('users')->where('username', 'LIKE', "%{$SearchingUser}%")->select('username', 'images', 'created_at')->latest('created_at')->get();
        $searchImage = $userSearch->images;
        };
                return view('follows.usersearch');
        }


    }
