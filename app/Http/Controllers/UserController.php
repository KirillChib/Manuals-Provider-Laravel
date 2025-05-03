<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function auth(Request $request){
        $user = $request->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required'],
        ]);
        if(Auth::attempt($user)){
            $request->session()->regenerate();
            return redirect('manual');
        }
        return back()->withErrors(['email' => 'Предоставленные учетные данные не соответствуют нашим записям.'])->onlyInput('email');
    }
    public function loginForm(){
        return view('login')->with('page','Login');
    }
    public function registration(Request $request){
        $errorUser = $request->validate([
            'name' => ['required', 'max:25'],
            'email' => ['required', 'email'],
            'password'=>['required'],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        if($user->save()){
            return redirect(url('login'))->with('message', 'Пользователь успешно создан');
        }else{
            return back()->withErrors($errorUser)->onlyInput('name','email');
        }

    }
    public function regForm(){
        return view('reg')->with('page', 'Registration');
    }
}
