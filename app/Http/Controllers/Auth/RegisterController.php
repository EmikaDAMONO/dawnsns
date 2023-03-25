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
    protected function validator(array $data)
    {
        return Validator::make($data, [
             //ユーザー登録用バリデーション
            'username' => 'required|min:4|max:12',
            'mail' => 'required|email|min:4|max:12|unique:users',
            'password' => 'required|alpha_num|min:4|max:12',
            'password-confirm' => 'required|min:4|max:12|same:password',
            //プロフィール更新用バリデーション
            'profile-username' => 'min:4|max:12',
            'profile-mail' => ['email', 'min:4', 'max:12', 'unique:users', Rule::exists('users', 'mail')],
            'profile-new-password' => 'required|alpha_num|min:4|max:12|different:password',
            'profile-bio' => 'min:200',
            'icon-image' => 'alpha_num|image',
        ],
    [
		'mail.required' => '必須項目です',
		'mail.email' => 'メールアドレスではありません',
		'password.required' => '必須項目です',
		'password.min' => '4文字以上で入力してください',
        'password.max' => '12文字以下で入力してください',
		'password-confirm.required' => '必須項目です',
		'password-confirm.min' => '4文字以上で入力してください',
		'password-confirm.max' => '12文字以下で入力してください',
		'password-confirm.same' => 'パスワードと確認用パスワードが一致していません',
	]
    );
    }

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
        if($request->isMethod('post')){
            $data = $request->input();

            $this->create($data);
            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
