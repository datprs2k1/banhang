<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\SanPham;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function doanhthutrong30ngay()
    {

        $start = Carbon::now()->subDay(31)->format('Y-m-d');
        $end = Carbon::now()->addDay(1)->format('Y-m-d');


        $doanhthu = HoaDon::select(
            DB::raw('sum(tong_tien) as doanhthu'),
            DB::raw("DATE_FORMAT(created_at,'%d-%m') as day")
        )
            ->whereBetween('created_at', [
                $start,
                $end
            ])
            ->where('trang_thai', 'Đã xác nhận')
            ->groupBy('day')
            ->get();

        $doanhthu30ngay = [];
        for ($i = 29; $i >= 0; $i--) {
            $key = Carbon::now()->subDays($i)->format('d-m');
            $doanhthu30ngay[$key] = 0;
        }

        foreach ($doanhthu as $item) {
            $doanhthu30ngay[$item->day] = $item->doanhthu;
        }

        return response()->json($doanhthu30ngay);
    }

    public function doanhthutrong12thang()
    {
        $start = Carbon::now()->subMonth(11)->format('Y-m-d');
        $end = Carbon::now()->subDay(1)->format('Y-m-d');

        $doanhthu = HoaDon::select(
            DB::raw('sum(tong_tien) as doanhthu'),
            DB::raw("DATE_FORMAT(created_at,'%m-%Y') as month")
        )
            ->whereBetween('created_at', [
                $start,
                $end
            ])
            ->where('trang_thai', 'Đã xác nhận')
            ->groupBy('month')
            ->get();

        $doanhthu12thang = [];
        for ($i = 11; $i >= 0; $i--) {
            $key = Carbon::now()->subMonths($i)->format('m-Y');
            $doanhthu12thang[$key] = 0;
        }

        foreach ($doanhthu as $item) {
            $doanhthu12thang[$item->month] = $item->doanhthu;
        }

        return response()->json($doanhthu12thang);
    }

    public function sanpham()
    {
        $sanpham = SanPham::select('ten_san_pham')->withCount(['hoaDon' => function ($query) {
            $query->where('trang_thai', 'Đã xác nhận');
        }], 'id')->get();

        $san_pham = [];

        foreach ($sanpham as $item) {
            $san_pham[$item->ten_san_pham] = $item->hoa_don_count;
        }
        return response()->json($san_pham);
    }
}
