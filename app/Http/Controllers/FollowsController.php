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
        $searchingUser = $request->input('userSearch');
        if (!empty($SearchingUser)) {
            $searchingUsers = DB::table('users')->where('username', 'LIKE', "%{$searchingUser}%")->select('username', 'images', 'created_at')->latest('created_at')->get();
            $searchImage = $userSearch->images;
        }else{
                $searchingUsers = DB::table('users')->get();
        }
        return view('follows.usersearch', compact('searchingUsers'));
        }
    }
