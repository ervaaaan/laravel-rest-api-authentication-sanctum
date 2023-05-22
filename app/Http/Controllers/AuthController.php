<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Something is wrong',
                'data' => $validator->errors()
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['first_name'] = $user->first_name;
        $success['last_name'] = $user->last_name;

        return response()->json([
            'success' => true,
            'message' => 'Registered successfully',
            'data' => $success
        ]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['first_name'] = $auth->first_name;
            $success['last_name'] = $auth->last_name;
            $success['email'] = $auth->email;

            return response()->json([
                'success' => true,
                'message' => 'Logged in successfully',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Please check your email and password',
                'data' => null
            ]);
        }
    }
}
