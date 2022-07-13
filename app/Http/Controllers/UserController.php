<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {
        $result = [];
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'name' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        //return response()->json( $validator->messages(), 200);
        
        if ($validator->fails()) {

            $result['status'] = 0 ;
            $result['error'] = $validator->errors()->first();
            $result['message'] = "Data Not Valid." ;
        } else {
            // ALL IS WELL
            User::create([
                'name' => $request->input('name'),
                'password' => bcrypt($request->input('password')),
                'email' => $request->input('email'),
            ]);
            $result['status'] = 1 ;
            $result['message'] = "Registered Successfully!" ;
        }
        return response()->json($result, 200);
    }


}
