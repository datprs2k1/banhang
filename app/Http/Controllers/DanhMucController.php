<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;



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
        $danh_muc = DanhMuc::find($id);

        return response()->json(
            $danh_muc,
            200
        );
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
        $danh_muc->updated_at = Carbon::now();
        $danh_muc->save();

        return response()->json([
            $danh_muc
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
        $danh_muc = DanhMuc::find($id);

        $danh_muc->delete();

        return response()->json([
            'message' => 'Xóa danh mục thành công'
        ], 200);
    }

    public function danhsach()
    {
        $danh_muc = DanhMuc::all();

        return Datatables::of($danh_muc)->addIndexColumn()->addColumn('actions', function ($danh_muc) {
            return '<button class="btn-primary btn me-5 sua_danh_muc" data-toggle="modal" data-id="' . $danh_muc->id . '">
            Sửa
        </button>
        <button class="btn-danger btn xoa_danh_muc" data-toggle="modal" data-id="' . $danh_muc->id . '">
            Xoá
        </button>';
        })->rawColumns(['actions'])->make(true);
    }

    public function chi_tiet(Request $request)
    {
        $id = $request->id;
        $danh_muc = DanhMuc::with('sanPham')->find($id);

        return view('pages.danhmuc.index', compact('danh_muc'));
    }
}
