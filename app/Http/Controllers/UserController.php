<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
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
            return response()->json([
                'message' => 'Đăng nhập thành công.',
                'status' => true,
            ]);
        } else {
            return response()->json(
                [
                    'errors' => [
                        'error' => 'Email hoặc mật khẩu không đúng.',
                    ],
                ],
                422
            );
        }
    }

    public function login()
    {
        return view('pages.login.index');
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

        $user->assignRole('user');

        return response()->json(
            [
                'message' => 'Đăng ký thành công.',
            ],
            200
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function taikhoan()
    {
        $user = Auth::user();
        return view('pages.taikhoan.index', compact('user'));
    }

    public function suataikhoan(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()
            ->route('taikhoan')
            ->with('success', 'Sửa tài khoản thành công');
    }

    public function doimatkhau(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = User::find(Auth::user()->id);
        if (!Hash::check($request->password, $user->password)) {
            return redirect()
                ->route('taikhoan')
                ->withErrors([
                    'msg' => 'Mật khẩu cũ không chính xác',
                ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        $this->logout($request);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
