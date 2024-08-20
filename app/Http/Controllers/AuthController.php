<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
        public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required','email'],
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $credentials = $request->only('email','password');
        if (!Auth::attempt($credentials)) {
            Alert::error('Username or password incorrect');
            return redirect()->back();
            // error_log('error');
        }
        $user = Auth::user();
        if ($user->level) {
            return redirect('/admin');
        }
        return redirect('/');
    }
    public function logout(){
        Auth::logout();
    }
}
