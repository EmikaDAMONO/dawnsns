<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id as posts_id', 'posts.created_at as posts_created', 'posts.updated_at as posts_updated', 'users.username', 'posts.post', 'users.images', 'posts.user_id')
            ->latest('posts_created')
            ->get();
        return view('posts.index',['posts'=>$posts]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createForm()
    {
        return view('posts.createForm');
    }

   public function create(Request $request)
    {
        $post = $request->input('newPost');
        $userId = Auth::user()->id;
        DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $userId,
        ]);

        return redirect('/index');
    }

//更新

 public function updateForm($id)
{
    $post = DB::table('posts')
        ->where('id', $id)
        ->first();
    return view('posts.updateForm', ['post' => $post]);
}
  public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('/index');
    }
       public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/index');
    }


}
