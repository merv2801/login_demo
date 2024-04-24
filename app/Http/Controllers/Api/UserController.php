<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //[METHOD:POST ] RegisterUser API (To register a new user) 
    public function register(Request $parameters){
        // Data Validation
        $parameters->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|confirmed|min:8"
        ]);
        // User Creation
        User::create([
            "name" => $parameters->name,
            "email" => $parameters ->email,
            "password" => Hash::make($parameters ->password)
        ]);
        // Response
        return response()->json([
            "status" => 200,
            "message" => "User has been created successfully."
        ]);
    }
    // EOF

    //[METHOD : POST ] Login API (User Login to Dashboard) 
    public function login(Request $parameters){
        
        // Data Validation
        $parameters->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);
        // Credential Validation
         if(Auth::attempt([
            "email"=>$parameters->email,
            "password"=>$parameters->password
            ])){
        //Success
        $user = Auth::user();
        $token = $user->createToken("UserToken")->accessToken;
        return response()->json([
            "status" => 200,
            "message"=>"Login Successful",
            "token"=>$token
            ]);
        }else{
        //Failure Response
        return response()->json([
            "status" => 401,
            "message"=>"Invalid Credentials"
        ]);
        }
     }
    // EOF

    //[METHOD : GET ] Dashboard API (Displays User Information) 
    public function dashboard(Request $parameters){
        $user = Auth::user();
        return response()->json([
            "status" => 200,
            "message"=>["user" => [
                "name" => $user->name,
                "email" => $user->email,
                "id" => $user->id

            ]]
        ]);

    }
    // EOF

    //[METHOD : GET ] Logout (User can Logout) 
    public function logout(Request $parameters){
        auth()->user()->token()->revoke();

        return response()->json([
            "status" => 200,
            "message"=>"User Has been logged out."
        ]);
    }
    // EOF
        

    }
