<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|string|email',
                'password' => 'required|string|min:6',
            ],
            [
                'email.required' => 'Email không được để trống.',
                'email.email' => 'Email không đúng định dạng.',
                'email.string' => 'Email phải là chuỗi.',
                'password.required' => 'Mật khẩu không được để trống.',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
                'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
            ]
        );

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'errors' => [
                    'email' => 'Email không tồn tại.',
                ],
            ], 422);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'errors' => [
                    'password' => 'Mật khẩu không đúng.',
                ],
            ], 422);
        }

        $token = $user->createToken('BanHang')->plainTextToken;

        return response()->json([
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {

        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'Đăng xuất thành công.',
        ], 200);
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ],
            [
                'name.required' => 'Tên không được để trống.',
                'name.string' => 'Tên phải là chuỗi.',
                'name.max' => 'Tên tối đa 255 ký tự.',
                'email.required' => 'Email để được để trống.',
                'email.string' => 'Email phải là chuỗi.',
                'email.email' => 'Email không đúng định dạng.',
                'email.max' => 'Email tối đa 255 ký tự.',
                'email.unique' => 'Email đã tồn tại.',
                'password.required' => 'Mật khẩu để được để trống.',
                'password.string' => 'Mật khẩu phải là chuỗi.',
                'password.min' => 'Mật khẩu tối thiểu 6 ký tự.',
                'password.confirmed' => 'Mật khẩu không khớp.',
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'message' => 'Đăng ký thành công.',
        ], 200);
    }
}
