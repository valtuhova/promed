<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function regSave(Request $request){
        $request->validate([
            'fio'=>['required','regex:/[А-Яа-яЁё]/u'],
            'phone'=>['required','unique:users'],
            'login'=>['required', 'unique:users'],
            'password'=>['required', 'confirmed', 'min:4'],
            'rule'=>['required']
        ]);

        $user = new User();
        $user->fio = $request->fio;
        $user->login = $request->login;
        $user->phone = $request->phone;
        $user->password = md5($request->password);
        $user->save();
        return redirect()->route('authPage');
    }

    public function auth(Request $request){


                $user = User::query()->
                where('login',$request->login)->
                where('password', md5($request->password))->first();


                if($user){
                    Auth::login($user);
                    if($user->role == 0){
                        return redirect()->route('welcome');
                    }else if($user->role == 1){
                        return redirect()->route('welcome');
                    }
                }else{
                    return redirect()->route('authPage')->with('err', 'Неверный логин или пароль');
                }
            }

            public function exit(){
                Auth::logout();
                return redirect()->route('authPage');
            }
}
