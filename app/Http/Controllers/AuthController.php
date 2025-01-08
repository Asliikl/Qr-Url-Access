<?php

namespace App\Http\Controllers;

use App\Models\Custom\CustomLink;
use App\Models\Custome\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }
        $checkUser = User::where('email', $request->email)->first();
        if ($checkUser) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email already exists'
            ]);
        } else {
            $user = new User();
            $user->email = $request->email;
            $user->password = \Hash::make($request->password);
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Register success',
                'data' => [
                    'email' => $user->email
                ]
            ]);
        }
    }

    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }
        $checkUser = User::where('email', $request->email)->first();
        if ($checkUser) {
            if (password_verify($request->password, $checkUser->password)) {
                $checkUser->login_token = md5($checkUser->email . time());
                $checkUser->save();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login success',
                    'data' => [
                        'email' => $checkUser->email,
                        'login_token' => $checkUser->login_token,
                    ]
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Password is incorrect'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ]);
        }
    }

    public function storeCustomLink(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'link' => 'required',
            'json_data' => 'required',
            'login_token' => 'required|exists:users,login_token'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }
        $checkUser = User::where('login_token', $request->login_token)->first();
        $newLink = new CustomLink();
        $newLink->hashed_id = md5(time());
        $newLink->user_id = $checkUser->id;
        $newLink->url = $request->link;
        $newLink->json_data = $request->json_data;
        if ($newLink->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Link stored',
                'data' => [
                    'link' => $newLink->url,
                    'id' => $newLink->hashed_id,
                    'json_data' => json_decode($newLink->json_data)
                ]
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to store link'
            ]);
        }
    }

    public function getLinks(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'login_token' => 'required|exists:users,login_token'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }
        $checkUser = User::where('login_token', $request->login_token)->first();
        $links = CustomLink::where('user_id', $checkUser->id)->get();
        $data = [];
        foreach ($links as $link) {
            $data[] = [
                'link' => $link->url,
                'id' => $link->hashed_id,
                'json_data' => json_decode($link->json_data)
            ];
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Links found',
            'data' => $data
        ]);
    }
}
