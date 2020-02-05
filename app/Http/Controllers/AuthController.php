<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if ($request->has('route')) {
                return redirect()->route($request->input('route'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('home');
        }
    }

    public function registration(Request $request)
    {
        if (User::exists($request->input('email'))) {
            // попробуем авторизаваться
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                if ($request->has('route')) {
                    return redirect()->route($request->input('route'));
                } else {
                    return redirect()->back();
                }
            } else {
                return redirect()->route('home');
            }
        } else {
            // новый пользователь
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
            Auth::login($user);
            if ($request->has('route')) {
                return redirect()->route($request->input('route'));
            } else {
                return redirect()->route('author.posts');
            }
        }
    }
}
