<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_san_pham', 'hinh_anh', 'mo_ta', 'gia_ban', 'huong_dan_su_dung', 'don_vi_tinh', 'trang_thai', 'id_danh_muc', 'id_nha_cung_cap'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = 'id';

    protected $table = 'san_pham';

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];

    public function danhMuc()
    {
        return $this->belongsTo('App\Models\DanhMuc', 'id_danh_muc', 'id');
    }

    public function nhaCungCap()
    {
        return $this->belongsTo('App\Models\NhaCungCap', 'id_nha_cung_cap', 'id');
    }

    public function hoaDon()
    {
        return $this->belongsToMany(HoaDon::class, 'chi_tiet_hoa_don', 'id_san_pham', 'id_hoa_don');
    }
}
