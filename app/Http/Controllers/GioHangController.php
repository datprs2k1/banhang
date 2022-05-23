<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use App\Models\Huyen;
use App\Models\Tinh;
use App\Models\Xa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GioHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gio_hang = GioHang::where('id_user', Auth::user()->id)->get();

        return view('pages.giohang.index', compact('gio_hang'));
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
                'id_san_pham' => 'required|numeric',
                'so_luong' => 'required|numeric',
            ],
            [
                'id_san_pham.required' => 'Vui lòng chọn sản phẩm',
                'id_san_pham.numeric' => 'Vui lòng chọn sản phẩm',
                'so_luong.required' => 'Vui lòng nhập số lượng',
                'so_luong.numeric' => 'Vui lòng nhập số lượng',
            ]
        );

        $find = GioHang::where('id_san_pham', $request->id_san_pham)->where('id_user', Auth::user()->id)->first();

        if ($find) {
            $find->so_luong += $request->so_luong;
            $find->save();
        } else {
            $gio_hang = new GioHang();
            $gio_hang->id_san_pham = $request->id_san_pham;
            $gio_hang->id_user = Auth::user()->id;
            $gio_hang->so_luong = $request->so_luong;
            $gio_hang->save();
        }

        return response()->json(['success' => 'Thêm giỏ hàng thành công'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $gio_hang = GioHang::where('id', $id)->where('id_user', Auth::user()->id)->first();
        $gio_hang->so_luong = $request->so_luong;
        $gio_hang->save();

        return response()->json(['success' => 'Cập nhật giỏ hàng thành công'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $gio_hang = GioHang::find($id);
        $gio_hang->delete();

        return response()->json(['success' => 'Xóa giỏ hàng thành công'], 200);
    }

    public function danhsach()
    {
        $gio_hang = GioHang::with('sanPham')->where('id_user', Auth::user()->id)->get();

        return response()->json($gio_hang, 200);
    }

    public function getTinh()
    {
        $tinh = Tinh::all();

        return response()->json($tinh, 200);
    }

    public function getHuyen($id)
    {
        $huyen = Huyen::where('tinh_id', $id)->get();

        return response()->json($huyen, 200);
    }

    public function getXa($id)
    {
        $xa = Xa::where('huyen_id', $id)->get();

        return response()->json($xa, 200);
    }
}
