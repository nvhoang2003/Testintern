<?php

namespace App\Http\Controllers;

use App\Repos\Acc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    //
    public function form(){
        return view(
            'signup',
            ["account"=>(object)[
                'email'=>'',
                'password'=>'',
                'name'=>'',
                'address'=>'',
                'phonenumber'=>'',
            ]]);
    }

    public function signup(Request $request){

        $this->formValidate($request)->validate();
        $acc = (object)[
            'email' => $request->input('email'),
            'password' => sha1($request->input('pwd')),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phonenumber' => $request->input('phone')
        ];
        $newId = Acc::insert($acc);
        return view('success');
    }

    function formValidate(Request $request){
        return Validator::make(
            $request->all(),[
            'name' => ['required'],
            'email' => ['required', 'email'],
            'pwd' => ['required'],
            'phone' => ['required','starts_with:0', 'digits:10'],
            'address' => ['required']
        ],[
            'pwd.required'=>'Please enter your password'
            ]
        );
    }
}


