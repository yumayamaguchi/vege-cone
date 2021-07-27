<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;




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

    //登録処理
    public function register(Request $request)
    {
        //書き直す処理
        if($request->has('back')) {
            return redirect()->route('register')->withInput();
        }

        event(new Registered($user = $this->create(session()->get('form_input'))));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }



    private $formItems = ['producer_name', 'name', 'introduction', 'address', 'email', 'password'];

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        session()->flash('flash_message', 'ユーザー登録が完了しました');
        return RouteServiceProvider::HOME;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //インスタンス化の際
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
            'producer_name' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string',  'max:255'],
            'introduction' => ['required', 'string', 'max:500'],
            'image' => ['required', 'file', 'image'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
        ]);
    }

    //登録確認画面
    public function confirm(Request $request)
    {
        //バリデーション処理
        $this->validator($request->all())->validate();
        //requestのfile(image)を操作し、ハッシュネームに変更
        $image_name = request()->file('image')->hashName();
        //保存処理
        request()->file('image')->store('/public/image');

        $input = $request->only($this->formItems);
        $input['image'] = $image_name;
        $request->session()->put('form_input', $input);
        $confirm = $request->session()->get('form_input');

        if(!$confirm) {
            return redirect()->route('register');
        }

        return view('auth.confirm',[
            'confirm' => $confirm,
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = [
            'producer_name' => $data['producer_name'],
            'name' => $data['name'],
            'introduction' => $data['introduction'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $data['image'],
        ];

            return User::create($user);
    }
}
