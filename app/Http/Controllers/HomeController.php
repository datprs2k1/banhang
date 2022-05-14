<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;

class HomeController extends Controller
{
    //
    public function index()
    {
        $danh_muc = DanhMuc::with('sanPham')->get();
        return view('pages.home.index', compact('danh_muc'));
    }
}
