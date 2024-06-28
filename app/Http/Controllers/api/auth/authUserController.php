<?php

namespace App\Http\Controllers\api\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\api\auth\registerRequest;
use App\Http\Requests\api\auth\adminLoginRequest;

class authUserController extends Controller
{
    public function login(adminLoginRequest $request)
    {
        try{
        $person = null;
        if(User::where('email',$request->email)->exists()){
            $person = User::where('email',$request->email)->first();
        }
        if($person == null){
            throw ValidationException::withMessages([
                'email' =>'invalid credentials',
            ]);
        }
        if(!Hash::check($request->password,$person->password)){
            return response()->json(['message'=>"Invalid password"],420);
        }
         $token = $person->createToken('user_token');
         return response()->json(['message'=>$person,"token"=>$token->plainTextToken]);
        }catch(\Exception $e){
            return response()->json(["error"=>$e->getMessage(),"error code"=>$e->getCode(),"message"=>"sorry there was an error!!."]);
        }
    }
    public function register(registerRequest $request){
        try{
            $data = $request->validated();
            $user = User::create($data);
            return response()->json(['data' => $user, 'message' => 'successfully registered'],200);
        }catch(\Throwable $e){
            return response()->json(['error'=>$e->getMessage(),'error_code'=>$e->getCode(),'message'=>'sorry there was an error'],500);
        }


    }
    public function logout()
    {
        if (Auth::user()) {
            $user = Auth::user()->tokens()->delete();
          } else {
            return response()->json(['message' => 'Not logged in'], 401);
          }
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
