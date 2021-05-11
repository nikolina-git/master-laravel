<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseCOntroller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends BaseController
{
   public function register(Request $request){
       $validator=Validator::make($request->all(),[
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required',
        'c_password'=>'required|same:password',
       ]);

      if($validator->fails()){
           return $this->sendError('Validation error.',$validator->errors());
       }

       $input = $request->all();
       $input['password']=bcrypt($input['password']);
       $user=User::create($input);
       $succes['token']=$user->createToken('MyApp')->accessToken;
       $succes['name']=$user->name;

       return $this->sendResponse($succes,'User registered successfully.');
   }


   public function login(Request $request){
    if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){

        $user=Auth::user();
    
    
    $succes['token']=$user->createToken('MyApp')->accessToken;
    $succes['name']=$user->name;

    return $this->sendResponse($succes,'User logged in successfly.');
}else{
    return $this->sendError('Unauthorised',['error'=>'Unauthorised']);
}
}

}
