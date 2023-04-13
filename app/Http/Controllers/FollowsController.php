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
        $searchingUser = $request->input('user_search');
        if (!empty($searchingUser)) {
            $findingUsers = DB::table('users')->where('username', 'LIKE', '%'.$searchingUser.'%')->select('username', 'images','id')->latest('created_at')->get();
        }else{
            $findingUsers = DB::table('users')->get();
        }
                    return view('follows.usersearch', compact('findingUsers'));
        }
    }
