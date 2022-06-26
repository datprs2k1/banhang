<?php

namespace Database\Seeders;

use App\Models\DanhMuc;
use Illuminate\Database\Seeder;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'ten_danh_muc' => 'Rau - Củ - Trái Cây',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_danh_muc' => 'Thịt - Trứng - Hải Sản',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_danh_muc' => 'Thực Phẩm Đông Lạnh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_danh_muc' => 'Thực Phẩm Khô - Gia Vị',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_danh_muc' => 'Bánh Kẹo - Đồ Ăn Vặt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'ten_danh_muc' => 'Sữa - Sản Phẩm Từ Sữa',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'ten_danh_muc' => 'Đồ Uống - Giải Khát',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'ten_danh_muc' => 'Hóa Mỹ Phẩm',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'ten_danh_muc' => 'Chăm Sóc Cá Nhân',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'ten_danh_muc' => 'Chăm Sóc Mẹ Và Bé',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]
        ];

        DanhMuc::insert($data);
    }
}
