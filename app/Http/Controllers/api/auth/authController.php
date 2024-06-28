<?php

namespace App\Http\Controllers\api\auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\api\auth\adminLoginRequest;

class authController extends Controller
{
    public function login(adminLoginRequest $request)
    {
        try{
        $person = null;
        if(Admin::where('email',$request->email)->exists()){
            $person = Admin::where('email',$request->email)->first();
        }
        if(Instructor::where('email',$request->email)->exists()){
            $person = Instructor::where('email',$request->email)->first();
        }
        if($person == null){
            throw ValidationException::withMessages([
                'email' => [__('api/response_message.invalid_credentials')],
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
    // public function create(createAccountRequest $request){
    //     $data = $request->validated();
    //     if($data['role']=='admin'){

    //     }
    // }
    public function logout()
    {
        $user =  Auth::user()->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
    public function profile()
    {

       return response()->json(['admin',Auth::user()]);
    }
}
