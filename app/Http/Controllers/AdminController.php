<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function auth(Request $request)
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

        $remember = $request->remember;

        $cerdentials = $request->only('email', 'password');

        if (Auth::attempt($cerdentials, $remember)) {
            if (Auth::user()->hasRole('admin')) {
                return response()->json(['message' => 'Đăng nhập thành công.', 'status' => true]);
            } else {
                return response()->json(['errors' => [
                    'error' => 'Bạn không có quyền truy cập.'
                ]], 422);
            }
        } else {
            return response()->json(['errors' => [
                'error' => 'Email hoặc mật khẩu không đúng.'
            ]], 422);
        }
    }

    public function dashboard()
    {
        return view('admin.pages.dashboard.index');
    }

    public function login()
    {
        return view('admin.pages.login.index');
    }

    public function logout(Request $request)
    {

        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'Đăng xuất thành công.',
        ], 200);
    }
}
