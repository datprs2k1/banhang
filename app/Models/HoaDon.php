<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_tinh',
        'id_huyen',
        'id_xa',
        'dia_chi',
        'thanh_toan',
        'tong_tien',
        'trang_thai',
        'ten_nguoi_nhan',
        'so_dien_thoai',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];

    protected $hidden = [
        'updated_at',
    ];

    protected $primaryKey = 'id';

    protected $table = 'hoa_don';
}
