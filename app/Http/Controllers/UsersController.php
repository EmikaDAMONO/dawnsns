<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

        //プロフ更新の方
    public function profUp(Request $request){
        $my_id = Auth::id();
        $my_pass = Auth::user()->password;
        $request->validate([
            //プロフィール更新用バリデーション
            'profile-username' => 'required|min:4|max:12',
            'profile-mail' => ['required', 'email', 'min:4', 'max:12', Rule::unique('users', 'mail')->ignore($my_id)],
            'profile-new-password' => 'nullable|min:4|max:12|regex:/^[a-zA-Z0-9]+$/',
            'profile-bio' => 'max:200',
            'icon-image' => 'image',
        ],
    [
        'profile-username.required' => '＊ユーザー名は入力必須項目です',
        'profile-username.min' => '＊ユーザー名は4文字以上で入力してください',
        'profile-username.max' => '＊ユーザー名は12文字以下で入力してください',
        'profile-mail.required' => '＊メールアドレスは入力必須項目です',
        'profile-mail.email' => '＊入力された文字列はメールアドレスではありません',
        'profile-mail.min' => '＊メールアドレスは4文字以上で入力してください',
        'profile-mail.max' => '＊メールアドレスは12文字以下で入力してください',
        'profile-mail.unique' => '＊既に使用されているメールアドレスです',
        'profile-new-password.regex' => '＊パスワードに使用不可能な文字が使用されています',
        'profile-new-password.min' => '＊パスワードは4文字以上で入力してください',
        'profile-new-password.max' => '＊パスワードは12文字以下で入力してください',
        'profile-bio.max' => '＊自己紹介、長いね。200文字以下で入力してください',
        'icon-image.image' => '＊画像ファイルを選択してください',
	]
    );
        $data = $request->input();
        if (Hash::check($data['profile-new-password'], $my_pass)) {
           throw ValidationException::withMessages([
            'msg' => '＊現在のパスワードと同じです',
            ]);
        }
        $file =$request->file('icon-image');

        //アイコン名の更新有無分岐・アイコン保存記述
        if (!empty($file)) {
            $dir = 'icons';
            $file_name = $request->file('icon-image')->getClientOriginalName();
            if (!preg_match('/^[-_a-zA-Z0-9]+\.png$/', $file_name)) {
                return back()
                    ->withErrors(array('icon-image' => '＊使用不可能なファイル名です'));
            }
            $request->file('icon-image')->storeAs('images/icons', $file_name, 'public_uploads');
            $icon_name = $request->file('icon-image')->getClientOriginalName();
            DB::table('users')
                ->where('id', $my_id)
                ->update([
                    'images' => $icon_name,
                ]);
        }
                else {
            $icon_name = Auth::user()->images;
            DB::table('users')
            ->where('id', $my_id)
            ->update([
                'images' => $icon_name,
            ]);
        }

        //パスワードの更新があった場合の●反映
        if (!empty($data['profile-new-password'])){
            $request->session()->forget('pass_count');
            $new_pass = $request->input('profile-new-password');
            $pass_count = mb_strlen($new_pass);
            $request->session()->put('pass_count', $pass_count);
        }

        $this->update($data);
        return back();
    }

        protected function update(array $data){
        $my_id = Auth::id();
        //プロフィール更新記述
        if (!empty($data['profile-new-password'])){
            DB::table('users')
            ->where('id', $my_id)
            ->update([
            'username' => $data['profile-username'],
            'mail' => $data['profile-mail'],
            'password' => bcrypt($data['profile-new-password']),
            'bio' => $data['profile-bio'],
            ]);
        }
        else{
            DB::table('users')
            ->where('id', $my_id)
            ->update([
            'username' => $data['profile-username'],
            'mail' => $data['profile-mail'],
            'bio' => $data['profile-bio'],
            ]);
        }
            }




}
