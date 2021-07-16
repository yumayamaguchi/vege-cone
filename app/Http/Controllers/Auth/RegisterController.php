<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;




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
    protected function redirectTo() {
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
            'image' => ['file', 'image'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
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
        ];
        //画像が添付されている場合
        if (request()->hasFile('image')) {
            $image = request()->file('image')->hashName();
            request()->file('image')->store('/public/image');
            //'image' => $image の代入
            $user['image'] = $image;
            return User::create($user);
        } else {
            return User::create($user);
        }
    }
}
