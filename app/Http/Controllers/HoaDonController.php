<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hoa_don = HoaDon::where('id_user', Auth::user()->id)->get();
        return view('pages.hoadon.index', compact('hoa_don'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'id_tinh' => 'required|numeric',
                'id_huyen' => 'required|numeric',
                'id_xa' => 'required|numeric',
                'dia_chi' => 'required|string',
                'thanh_toan' => 'required',
            ],
            [
                'id_tinh.required' => 'Vui lòng chọn huyện',
                'id_tinh.numeric' => 'Vui lòng chọn huyện',
                'id_huyen.required' => 'Vui lòng chọn xã',
                'id_huyen.numeric' => 'Vui lòng chọn xã',
                'id_xa.required' => 'Vui lòng chọn xã',
                'id_xa.numeric' => 'Vui lòng chọn xã',
                'dia_chi.required' => 'Vui lòng nhập địa chỉ',
                'dia_chi.string' => 'Vui lòng nhập địa chỉ',
                'thanh_toan.required' => 'Vui lòng chọn phương thức thanh toán',
            ],
        );

        $gio_hang = GioHang::with('sanPham')->where('id_user', Auth::user()->id)->get();
        $tong_tien = 0;
        foreach ($gio_hang as $item) {
            $tong_tien += $item->sanPham->gia_ban * $item->so_luong;
        }

        $hoa_don = new HoaDon();
        $hoa_don->id_user = Auth::user()->id;
        $hoa_don->id_tinh = $request->id_tinh;
        $hoa_don->id_huyen = $request->id_huyen;
        $hoa_don->id_xa = $request->id_xa;
        $hoa_don->dia_chi = $request->dia_chi;
        $hoa_don->thanh_toan = $request->thanh_toan;
        $hoa_don->tong_tien = $tong_tien;
        $hoa_don->trang_thai = 'Đang chờ xử lý';
        $hoa_don->save();

        foreach ($gio_hang as $item) {
            $chi_tiet = new ChiTietHoaDon();
            $chi_tiet->id_hoa_don = $hoa_don->id;
            $chi_tiet->id_san_pham = $item->id_san_pham;
            $chi_tiet->so_luong = $item->so_luong;
            $chi_tiet->save();
        }

        GioHang::where('id_user', Auth::user()->id)->delete();

        return response()->json(['success' => 'Đặt hàng thành công'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function show(HoaDon $hoaDon)
    {
        //
        return view('pages.hoadon.chitiet');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function edit(HoaDon $hoaDon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HoaDon $hoaDon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function destroy(HoaDon $hoaDon)
    {
        //
    }
}
