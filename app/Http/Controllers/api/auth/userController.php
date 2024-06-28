<?php

namespace App\Http\Controllers\api\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    public function index(){
        try{
            $data = User::paginate();
            return response()->json($data);
        }catch(\throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
    public function destroy($id){
        try {
            $instructor=User::findOrFail($id);
            $instructor->delete();
            return response()->json("this user deleted successfully");
        }catch(\Throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
}
