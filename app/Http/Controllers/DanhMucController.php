<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danh_muc = DanhMuc::all();
        return view('admin.pages.danhmuc.index', compact('danh_muc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.danhmuc.create');
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
                'ten_danh_muc' => 'required|unique:danh_muc,ten_danh_muc',
            ],
            [
                'ten_danh_muc.required' => 'Tên danh mục không được để trống',
                'ten_danh_muc.unique' => 'Tên danh mục đã tồn tại',
            ]
        );

        $danh_muc = new DanhMuc();
        $danh_muc->ten_danh_muc = $request->ten_danh_muc;
        $danh_muc->save();

        return response()->json([
            'message' => 'Thêm mới danh mục thành công'
        ], 200);
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
        $danh_muc = DanhMuc::find($id);

        return view('admin.pages.danhmuc.edit', compact('danh_muc'));
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
                'ten_danh_muc' => 'required',
            ],
            [
                'ten_danh_muc.required' => 'Tên danh mục không được để trống',
            ]
        );

        $danh_muc = DanhMuc::find($id);
        $danh_muc->ten_danh_muc = $request->ten_danh_muc;
        $danh_muc->save();

        return response()->json([
            'message' => 'Sửa danh mục thành công',
            'ten_danh_muc' => $danh_muc->ten_danh_muc,
        ], 200);
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
    }

    public function xoadachon(Request $request)
    {
        foreach ($request->id as $item) {
            $danh_muc = DanhMuc::find($item);
            $danh_muc->delete();
        }

        return response()->json([
            'message' => 'Xóa danh mục thành công'
        ], 200);
    }
}
