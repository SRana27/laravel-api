<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use Auth;


class RegisterController extends Controller
{

    public function register( Request $request)
    {
      $validator =Validator::make($request->all(),[
           'name'=>'required|string',
           'email'=>'required|email|unique:users',
           'password'=>'required|min:8',
           'confirm_password'=>'required|same:password',

      ]);

      if($validator->fails())
      {
          return (new ErrorResource($validator->getMessageBag()))->response()->setStatusCode(422);
      }
       $password =bcrypt($request->password);
           $user=User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>$password,

        ]);

        $success['token'] =$user->createToken('RestApi')->plainTextToken;
        $success['name']=$user->name;

        return (new SuccessResource(['message'=>'user registered successfully','data'=>$success]))->response()->setStatusCode(201);



    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return (new ErrorResource($validator->errors()))->response()->setStatusCode(422);
        }

        if ( Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('RestApi')->plainTextToken;
            $success['name'] = $user->name;
            return (new SuccessResource(['message' => 'user login successfully', 'data' => $success]))->response()->setStatusCode(200);
        } else
            {
              return (new ErrorResource(['message'=>'unauthorized']))->response()->setStatusCode(422);
           }

    }

    public function logout()
    {
       auth()->user()->tokens()->delete();
        return (new ErrorResource(['message'=>'logout successfully']))->response()->setStatusCode(200);
    }
}

