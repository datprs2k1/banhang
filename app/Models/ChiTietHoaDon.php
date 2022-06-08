<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_hoa_don',
        'id_san_pham',
        'so_luong',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = 'id';

    protected $table = 'chi_tiet_hoa_don';

    public function hoaDon()
    {
        return $this->belongsTo(HoaDon::class, 'id_hoa_don');
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_san_pham');
    }

    public function tinh()
    {
        return $this->hasOneThrough(Tinh::class, HoaDon::class, 'id', 'id', 'id_hoa_don', 'id_tinh');
    }

    public function huyen()
    {
        return $this->hasOneThrough(Huyen::class, HoaDon::class, 'id', 'id', 'id_hoa_don', 'id_huyen');
    }

    public function xa()
    {
        return $this->hasOneThrough(Xa::class, HoaDon::class, 'id', 'id', 'id_hoa_don', 'id_xa');
    }

    public function user()
    {
        return $this->hasOneThrough(User::class, HoaDon::class, 'id', 'id', 'id_hoa_don', 'id_user');
    }
}
