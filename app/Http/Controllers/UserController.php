<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show(string $producer_name)
    {
        $user = User::where('producer_name', $producer_name)->first();

        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function list()
    {
        $list = User::get();

        return view('users.list', ['list' => $list]);
    }
}
