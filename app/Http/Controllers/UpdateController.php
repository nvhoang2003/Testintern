<?php

namespace App\Http\Controllers;

use App\Repos\Acc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    //
    public function edit($email){
        $acc = Acc::getAccbyEmail($email);
        return view('edit',[
            "acc" => $acc[0]
        ]);
    }
    public function update(Request $request){
        $this->formValidate($request)->validate();
        $acc =(object)[
            'id' => $request->input('id'),
            'newpass' => sha1($request->input('npwd'))
        ];
        Acc::update($acc);
        return view('updateSuccess');

    }
    function formValidate(Request $request){
        return Validator::make(
            $request->all(),[
                'npwd' => ['required'],
            ],[
                'npwd.required'=>'Please enter your new password'
            ]
        );
    }
}
