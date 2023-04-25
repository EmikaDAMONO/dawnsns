<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function test(){
        $postings = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id as posts_id', 'posts.created_at as posts_created', 'posts.updated_at as posts_updated', 'users.username', 'posts.post', 'users.images', 'posts.user_id')
            ->latest('posts_created')
            ->Where('user_id', Auth::id())
            ->get();
        $posts = $postings->unique('posts_id');
        $my_id = Auth::user()->id;
        return view('posts.test', compact('posts', 'my_id'));
    }


    public function store(Request $request)
{
    $request->validate([
	     'newPost' => 'required|max:10',
    ]);
}
    //
    public function index(){
        $postings = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
            ->leftJoin('follows', 'posts.user_id', '=', 'follows.follow_id')
            ->select('posts.id as posts_id', 'posts.created_at as posts_created', 'posts.updated_at as posts_updated', 'users.username', 'posts.post', 'users.images', 'posts.user_id','follows.follow_id', 'follows.follower_id')
            ->latest('posts_created')
            ->where('follower_id', Auth::id())
            ->orWhere('user_id', Auth::id())
            ->get();
        $posts = $postings->unique('posts_id');
        $my_id = Auth::user()->id;
        return view('posts.index', compact('posts', 'my_id'));
    }




   public function create(Request $request)
    {
            $request->validate([
	     'newPost' => 'required|max:200'
],
        ['newPost.max' => '＊つぶやきの内容は200文字までです']);
        $post = $request->input('newPost');
        $userId = Auth::user()->id;
        DB::table('posts')->insert([
            'post' => $post,
            'user_id' => $userId,
        ]);

        return redirect('/index');
    }

//更新

  public function update(Request $request)
    {
        $request->validate([
	     'upPost' => 'required|max:200'
        ],
        ['upPost.max' => '＊つぶやきの内容は200文字までです']
);
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
