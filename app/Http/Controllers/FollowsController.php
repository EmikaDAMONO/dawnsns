<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class FollowsController extends Controller
{
    //
    public function followList(){
        $posts = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('follows', 'posts.user_id', '=', 'follows.follow_id')
            ->select('posts.id as posts_id', 'posts.created_at as posts_created', 'posts.updated_at as posts_updated', 'users.username', 'posts.post', 'users.images', 'posts.user_id','follows.follow_id', 'follows.follower_id')
            ->latest('posts_created')
            ->where('follower_id', Auth::id())
            ->get();

        $icons = DB::table('follows')
            ->join('users', 'follows.follow_id', '=', 'users.id')
            ->select('users.username', 'users.id', 'users.images', 'follows.follow_id', 'follows.follower_id')
            ->latest('follows.created_at')
            ->where('follower_id', Auth::id())
            ->get();

        return view('follows.followList', compact('posts', 'icons'),['posts'=>$posts]);
    }
    public function followerList(){
        $posts = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('follows', 'posts.user_id', '=', 'follows.follower_id')
            ->select('posts.id as posts_id', 'posts.created_at as posts_created', 'posts.updated_at as posts_updated', 'users.username', 'posts.post', 'users.images', 'posts.user_id','follows.follow_id', 'follows.follower_id')
            ->latest('posts_created')
            ->where('follow_id', Auth::id())
            ->get();

        $icons = DB::table('follows')
            ->join('users', 'follows.follower_id', '=', 'users.id')
            ->select('users.username', 'users.id', 'users.images', 'follows.follow_id', 'follows.follower_id')
            ->latest('follows.created_at')
            ->where('follow_id', Auth::id())
            ->get();
        return view('follows.followerList', compact('posts', 'icons'),['posts'=>$posts]);
    }

    public function userSearch(Request $request){
        $my_follow_users = DB::table('follows')
            ->where('follower_id', Auth::id())
            ->pluck('follow_id');
        $my_id = Auth::id();
        $searchingUser = $request->input('user_search');
        if (!empty($searchingUser)) {
            $findingUsers = DB::table('users')->where('username', 'LIKE', '%'.$searchingUser.'%')->select('username', 'images','id')->latest('created_at')->get();
        }else{
            $findingUsers = DB::table('users')
            ->whereNotIn('id',[$my_id])->get();
        }
        return view('follows.usersearch', compact('findingUsers', 'my_follow_users'));
        }

        public function follow(Request $request){
            $my_id = Auth::id();
            $followed = $request->input('followId');
            DB::table('follows')->insert([
                'follower_id' => $my_id,
                'follow_id' => $followed,
            ]);
            return back();
        }
        public function remove(Request $request){
            $my_id = Auth::id();
            $good_bye = $request->input('followerId');
            DB::table('follows')
            ->where('follower_id', $my_id)
            ->where('follow_id', $good_bye)
            ->delete();
            return back();
        }
        public function friendsProf(Request $request){
            $friends_id = $request->input('friendsId');
            $friend_report = DB::table('users')
            ->select('username', 'images', 'bio', 'id')
            ->where('id', $friends_id)
            ->first();
            $my_follow_users = DB::table('follows')
                ->where('follower_id', Auth::id())
                ->pluck('follow_id');
            $posts = DB::table('posts')
                ->leftJoin('users', 'posts.user_id', '=', 'users.id')
                ->select('posts.id as posts_id', 'posts.created_at as posts_created', 'posts.updated_at as posts_updated', 'users.username', 'posts.post', 'users.images', 'posts.user_id')
                ->latest('posts_created')
                ->where('user_id', $friends_id)
                ->get();
        return view('follows.friendsProf', compact('friend_report', 'my_follow_users', 'posts'),['posts'=>$posts]);
        }
        public function followProf(Request $request){
            $my_id = Auth::id();
            $followed = $request->input('followId');
            DB::table('follows')->insert([
                'follower_id' => $my_id,
                'follow_id' => $followed,
            ]);
            $friends_id = $followed;
            $friend_report = DB::table('users')
            ->select('username', 'images', 'bio', 'id')
            ->where('id', $friends_id)
            ->first();
            $my_follow_users = DB::table('follows')
            ->where('follower_id', Auth::id())
            ->pluck('follow_id');
            $posts = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id as posts_id', 'posts.created_at as posts_created', 'posts.updated_at as posts_updated', 'users.username', 'posts.post', 'users.images', 'posts.user_id')
            ->latest('posts_created')
            ->where('user_id', $friends_id)
            ->get();
        return view('follows.friendsProf', compact('friend_report', 'my_follow_users', 'posts'),['posts'=>$posts]);

        }
        public function removeProf(Request $request){
            $my_id = Auth::id();
            $good_bye = $request->input('followerId');
            DB::table('follows')
            ->where('follower_id', $my_id)
            ->where('follow_id', $good_bye)
            ->delete();
            $friends_id = $good_bye;
            $friend_report = DB::table('users')
            ->select('username', 'images', 'bio', 'id')
            ->where('id', $friends_id)
            ->first();
            $my_follow_users = DB::table('follows')
            ->where('follower_id', Auth::id())
            ->pluck('follow_id');
            $posts = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id as posts_id', 'posts.created_at as posts_created', 'posts.updated_at as posts_updated', 'users.username', 'posts.post', 'users.images', 'posts.user_id')
            ->latest('posts_created')
            ->where('user_id', $friends_id)
            ->get();
        return view('follows.friendsProf', compact('friend_report', 'my_follow_users', 'posts'),['posts'=>$posts]);
        }
    }
