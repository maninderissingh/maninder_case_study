<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Str;
use App\UserToken;
class AuthController extends Controller
{
    //
    protected function login(Request $request)
    {
        
        $result = [];
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
        
        if ($validator->fails()) {

            $result['status'] = 0 ;
            $result['error'] = $validator->errors()->first();
            $result['message'] = "Data Not Valid." ;
        } else {
            // ALL IS WELL
            $user = User::where(['email' =>$request->input('email')])->first();
            if(!empty($user)){                
                if (Hash::check($request->input('password'), $user->password)) {
                    
                    $token = Str::random(40);
                    UserToken::create([
                        'user_id' => $user->id,
                        'token' => $token 
                    ]);
                    $result['status'] = 1 ;
                    $result['user'] = $user ;
                    $result['token'] = $token ;
                    $result['message'] = 'Logged In Successfully.' ;    
                } else {
                    $result['status'] = 0 ;
                    $result['message'] = "Invalid username or password" ;    
                }

            } else {
                $result['status'] = 0 ;
                $result['message'] = "Email is registered with us." ;
            }
            
        }
        return response()->json($result, 200);
    }

}
