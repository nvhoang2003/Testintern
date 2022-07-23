<?php

namespace App\Http\Controllers;

use App\Repos\Acc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    //
    public function login(){
        return view('login');
    }

    public function signin(Request $request){
        $this->formValidate($request)->validate();
        $acc= Acc::getAccbyEmail($request->input('email'));
        Session::put('name', $acc[0]->name);
        return view('loginSuccess', ["acc" => $acc[0]]);
    }

    function formValidate(Request $request){
        return \Illuminate\Support\Facades\Validator::make(
            $request ->all(),
            [
                'email' => ['required'],
                'pwd'=> ['required',
                    function($attribute, $value , $fail){
                        global $request;
                        $key = 0;
                        $acc = Acc::getAllAcc();
                        $pass = sha1($request->input('pwd'));
                        foreach ($acc as $a){
                            if($a->email == $request->input('email')){
                                $account = Acc::getAccbyEmail($request->input('email'));
                                if($account[0]->password == $pass){
                                    $key =1;
                                } else {
                                    $key = 0;
                                }
                            }
                        }
                        if($key != 1){
                            $fail('Wrong Pass Or Email.');
                        }
                    },
                ]
            ],
            [
                'pwd.required'=>'Please enter your password'
            ]
        );
    }
}
