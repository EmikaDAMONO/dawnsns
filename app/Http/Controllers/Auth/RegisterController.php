<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),

        ]);

    }



    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
    session()->put('added_name', $request->input('username'));
        if($request->isMethod('post')){
            $request->validate([
            'username' => 'required|min:4|max:12',
            'mail' => 'required|email|min:4|max:12|unique:users,mail',
            'password' => 'required|regex:/^[a-zA-Z0-9]+$/|min:4|max:12',
            'password_confirmation' => 'required|same:password'
],
    [
        'username.required' => '＊ユーザー名は入力必須項目です',
        'username.min' => '＊ユーザー名は4文字以上で入力してください',
        'pusername.max' => '＊ユーザー名は12文字以下で入力してください',
        'mail.required' => '＊メールアドレスは入力必須項目です',
        'mail.email' => '＊入力された文字列はメールアドレスではありません',
        'mail.min' => '＊メールアドレスは4文字以上で入力してください',
        'mail.max' => '＊メールアドレスは12文字以下で入力してください',
        'mail.unique' => '＊既に使用されているメールアドレスです',
        'password.required' => '＊パスワードは入力必須項目です',
        'password.min' => '＊パスワードは4文字以上で入力してください',
        'password.max' => '＊パスワードは12文字以下で入力してください',
        'password_confirmation.required' => '＊確認用パスワードは入力必須項目です',
        'password_confirmation.same' => '＊パスワードと確認用パスワードが一致していません'
    ]
    );
        $data = $request->input();
            $this->create($data);
            return redirect('added');
        }
        return view('auth.register');

    }




    public function added(){
        $added_name = session('added_name');
        return view('auth.added', compact('added_name'));
    }
}
