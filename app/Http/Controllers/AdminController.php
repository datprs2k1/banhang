<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HoaDon;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

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
        $hoa_don = HoaDon::where('id_user', Auth::user()->id)->where('trang_thai', 'Đang chờ xử lý')->get();
        return view('admin.pages.dashboard.index', compact('hoa_don'));
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

    public function hoadon()
    {
        return view('admin.pages.hoadon.index');
    }

    public function danhsachhoadon()
    {
        $hoa_don = HoaDon::get();

        return Datatables::of($hoa_don)->addIndexColumn()->addColumn('mahoadon', function ($object) {
            return $object->id;
        })->rawColumns(['mahoadon'])->make(true);
    }

    public function khachhang()
    {
        return view('admin.pages.khachhang.index');
    }

    public function danhsachkhachhang()
    {
        $khach_hang = User::role('user')->get();
        return FacadesDataTables::of($khach_hang)
            ->addIndexColumn()
            ->addColumn('hanh_dong', function ($object) {
                return route('khachhang.delete', [
                    'id' => $object->id
                ]);
            })
            ->rawColumns(['hanh_dong'])
            ->make(true);
    }

    public function deletekhachhang($id)
    {
        User::destroy($id);
    }
}
