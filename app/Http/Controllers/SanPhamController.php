<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $san_pham = SanPham::with('danhMuc', 'nhaCungCap')->get();
        return view('admin.pages.sanpham.index', compact('san_pham'));
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
                'ten_san_pham' => 'required|unique:san_pham,ten_san_pham',
                'hinh_anh' => 'required|image|max:2048',
                'mo_ta' => 'required',
                'gia_ban' => 'required|numeric',
                'huong_dan_su_dung' => 'required',
                'don_vi_tinh' => 'required',
                'so_luong' => 'required|numeric',
                'id_danh_muc' => 'required',
                'id_nha_cung_cap' => 'required',
            ],
            [
                'ten_san_pham.required' => 'Tên sản phẩm không được để trống',
                'ten_san_pham.unique' => 'Tên sản phẩm đã tồn tại',
                'hinh_anh.required' => 'Hình ảnh không được để trống',
                'hinh_anh.image' => 'Hình ảnh phải là file ảnh',
                'hinh_anh.max' => 'Hình ảnh tối đa 2MB',
                'mo_ta.required' => 'Mô tả không được để trống',
                'gia_ban.required' => 'Giá bán không được để trống',
                'gia_ban.numeric' => 'Giá bán phải là số',
                'huong_dan_su_dung.required' => 'Hướng dẫn sử dụng không được để trống',
                'don_vi_tinh.required' => 'Đơn vị tính không được để trống',
                'so_luong.required' => 'Số lượng không được để trống',
                'so_luong.numeric' => 'Số lượng phải là số',
                'id_danh_muc.required' => 'Danh mục không được để trống',
                'id_nha_cung_cap.required' => 'Nhà cung cấp không được để trống',
            ]
        );

        $file = $request->hinh_anh;
        $name = time() . '_' . $file->getClientOriginalName();
        Storage::disk('images')->put($name, File::get($file));

        $san_pham = new SanPham();
        $san_pham->ten_san_pham = $request->ten_san_pham;
        $san_pham->hinh_anh = $name;
        $san_pham->mo_ta = $request->mo_ta;
        $san_pham->gia_ban = $request->gia_ban;
        $san_pham->huong_dan_su_dung = $request->huong_dan_su_dung;
        $san_pham->don_vi_tinh = $request->don_vi_tinh;
        $san_pham->so_luong = $request->so_luong;
        $san_pham->id_danh_muc = $request->id_danh_muc;
        $san_pham->id_nha_cung_cap = $request->id_nha_cung_cap;
        $san_pham->save();

        return response()->json(['success' => 'Thêm sản phẩm thành công']);
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
        $san_pham = SanPham::find($id);

        return response()->json($san_pham);
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
        $request->validate(
            [
                'ten_san_pham' => 'required',
                'hinh_anh' => 'nullable|image|max:2048',
                'mo_ta' => 'required',
                'gia_ban' => 'required|numeric',
                'huong_dan_su_dung' => 'required',
                'don_vi_tinh' => 'required',
                'so_luong' => 'required|numeric',
                'id_danh_muc' => 'required',
                'id_nha_cung_cap' => 'required',
            ],
            [
                'ten_san_pham.required' => 'Tên sản phẩm không được để trống',
                'hinh_anh.image' => 'Hình ảnh phải là file ảnh',
                'hinh_anh.max' => 'Hình ảnh tối đa 2MB',
                'mo_ta.required' => 'Mô tả không được để trống',
                'gia_ban.required' => 'Giá bán không được để trống',
                'gia_ban.numeric' => 'Giá bán phải là số',
                'huong_dan_su_dung.required' => 'Hướng dẫn sử dụng không được để trống',
                'don_vi_tinh.required' => 'Đơn vị tính không được để trống',
                'so_luong.required' => 'Số lượng không được để trống',
                'so_luong.numeric' => 'Số lượng phải là số',
                'id_danh_muc.required' => 'Danh mục không được để trống',
                'id_nha_cung_cap.required' => 'Nhà cung cấp không được để trống',
            ]
        );

        $san_pham = SanPham::find($id);
        $san_pham->ten_san_pham = $request->ten_san_pham;
        $san_pham->mo_ta = $request->mo_ta;
        $san_pham->gia_ban = $request->gia_ban;
        $san_pham->huong_dan_su_dung = $request->huong_dan_su_dung;
        $san_pham->don_vi_tinh = $request->don_vi_tinh;
        $san_pham->so_luong = $request->so_luong;
        $san_pham->id_danh_muc = $request->id_danh_muc;
        $san_pham->id_nha_cung_cap = $request->id_nha_cung_cap;

        if ($request->hasFile('hinh_anh')) {

            if (Storage::disk('images')->exists($san_pham->hinh_anh)) {
                Storage::disk('images')->delete($san_pham->hinh_anh);
            }

            $file = $request->hinh_anh;
            $name = time() . '_' . $file->getClientOriginalName();
            Storage::disk('images')->put($name, File::get($file));
            $san_pham->hinh_anh = $name;
        }

        $san_pham->save();
        return response()->json(['success' => 'Cập nhật sản phẩm thành công']);
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
        $san_pham = SanPham::find($id);
        $san_pham->delete();

        return response()->json(['success' => 'Xóa sản phẩm thành công']);
    }

    public function danhsach()
    {
        $san_pham = SanPham::with('nhaCungCap', 'danhMuc')->get();

        return Datatables::of($san_pham)->addIndexColumn()->addColumn('actions', function ($san_pham) {
            return '<button class="btn-primary btn me-5 sua_san_pham" data-toggle="modal" data-id="' . $san_pham->id . '">
            Sửa
        </button>
        <button class="btn-danger btn xoa_san_pham" data-toggle="modal" data-id="' . $san_pham->id . '">
            Xoá
        </button>';
        })->rawColumns(['actions'])->make(true);
    }
}
