<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;
use App\Models\SanPham;

class HomeController extends Controller
{
    //
    public function index()
    {
        $danh_muc = DanhMuc::with('sanPham')->get();
        return view('pages.home.index', compact('danh_muc'));
    }

    public function timkiem($keyword)
    {
        $san_pham = SanPham::where('ten_san_pham', 'like', '%' . $keyword . '%')->get();

        return response()->json($san_pham, 200);
    }
}
