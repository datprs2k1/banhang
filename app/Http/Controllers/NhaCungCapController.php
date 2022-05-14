<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nha_cung_cap = NhaCungCap::all();
        return view('admin.pages.nhacungcap.index', compact('nha_cung_cap'));
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
                'ten_nha_cung_cap' => 'required|unique:nha_cung_cap,ten_nha_cung_cap',
                'gioi_thieu' => 'required|max:255',
                'dia_chi' => 'required|max:255',
                'phone' => 'required|numeric|digits:10',
                'email' => 'required|email',
                'website' => 'required|url',
                'logo' => 'required|file|image|max:2048',
            ],
            [
                'ten_nha_cung_cap.required' => 'Tên nhà cung cấp không được để trống',
                'ten_nha_cung_cap.unique' => 'Tên nhà cung cấp đã tồn tại',
                'gioi_thieu.required' => 'Giới thiệu không được để trống',
                'gioi_thieu.max' => 'Giới thiệu không được quá 255 ký tự',
                'dia_chi.required' => 'Địa chỉ không được để trống',
                'dia_chi.max' => 'Địa chỉ không được quá 255 ký tự',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.numeric' => 'Số điện thoại phải là số',
                'phone.digits' => 'Số điện thoại phải có 10 số',
                'email.required' => 'Email không được để trống',
                'website.required' => 'Website không được để trống',
                'website.url' => 'Website không đúng định dạng',
                'logo.required' => 'Logo không được để trống',
                'logo.file' => 'Logo phải là file',
                'logo.image' => 'Logo phải là file ảnh',
                'logo.max' => 'Logo phải là file ảnh có dung lượng nhỏ hơn 2MB',
            ]
        );

        $file = $request->logo;
        $name = time() . '_' . $file->getClientOriginalName();
        Storage::disk('nhacungcap')->put($name, File::get($file));

        $nha_cung_cap = new NhaCungCap();
        $nha_cung_cap->ten_nha_cung_cap = $request->ten_nha_cung_cap;
        $nha_cung_cap->gioi_thieu = $request->gioi_thieu;
        $nha_cung_cap->dia_chi = $request->dia_chi;
        $nha_cung_cap->phone = $request->phone;
        $nha_cung_cap->email = $request->email;
        $nha_cung_cap->website = $request->website;
        $nha_cung_cap->logo = $name;
        $nha_cung_cap->save();

        return response()->json(['success' => 'Thêm nhà cung cấp thành công']);
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
        $nha_cung_cap = NhaCungCap::find($id);
        return response()->json($nha_cung_cap, 200);
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

        $nha_cung_cap = NhaCungCap::find($id);

        $request->validate(
            [
                'ten_nha_cung_cap' => 'required',
                'gioi_thieu' => 'required|max:255',
                'dia_chi' => 'required|max:255',
                'phone' => 'required|numeric|digits:10',
                'email' => 'required|email',
                'website' => 'required|url',
                'logo' => 'nullable|file|image|max:2048',
            ],
            [
                'ten_nha_cung_cap.required' => 'Tên nhà cung cấp không được để trống',
                'gioi_thieu.required' => 'Giới thiệu không được để trống',
                'gioi_thieu.max' => 'Giới thiệu không được quá 255 ký tự',
                'dia_chi.required' => 'Địa chỉ không được để trống',
                'dia_chi.max' => 'Địa chỉ không được quá 255 ký tự',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.numeric' => 'Số điên thoại phải là số',
                'phone.digits' => 'Số điện thoại phải có 10 số',
                'email.required' => 'Email không được để trống',
                'website.required' => 'Website không được để trống',
                'website.url' => 'Website không đúng định dạng',
                'logo.file' => 'Logo phải là file',
                'logo.image' => 'Logo phải là file ảnh',
                'logo.max' => 'Logo phải là file ảnh có dung lượng nhỏ hơn 2MB',
            ]
        );

        $nha_cung_cap->ten_nha_cung_cap = $request->ten_nha_cung_cap;
        $nha_cung_cap->gioi_thieu = $request->gioi_thieu;
        $nha_cung_cap->dia_chi = $request->dia_chi;
        $nha_cung_cap->phone = $request->phone;
        $nha_cung_cap->email = $request->email;
        $nha_cung_cap->website = $request->website;

        if ($request->hasFile('logo')) {

            if (Storage::disk('nhacungcap')->exists($nha_cung_cap->logo)) {
                Storage::disk('nhacungcap')->delete($nha_cung_cap->logo);
            }

            $file = $request->logo;
            $name = time() . '_' . $file->getClientOriginalName();
            Storage::disk('nhacungcap')->put($name, File::get($file));
            $nha_cung_cap->logo = $name;
        }

        $nha_cung_cap->save();

        return response()->json(['success' => 'Cập nhật nhà cung cấp thành công']);
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
        $nha_cung_cap = NhaCungCap::find($id);
        $nha_cung_cap->delete();

        return response()->json(['success' => 'Xóa nhà cung cấp thành công'], 200);
    }

    public function danhsach()
    {
        $nha_cung_cap = NhaCungCap::all();

        return Datatables::of($nha_cung_cap)->addIndexColumn()->addColumn('actions', function ($nha_cung_cap) {
            return '<button class="btn-primary btn me-5 sua_nha_cung_cap" data-toggle="modal" data-id="' . $nha_cung_cap->id . '">
            Sửa
        </button>
        <button class="btn-danger btn xoa_nha_cung_cap" data-toggle="modal" data-id="' . $nha_cung_cap->id . '">
            Xoá
        </button>';
        })->rawColumns(['actions'])->make(true);
    }
}
