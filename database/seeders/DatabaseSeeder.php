<?php

namespace Database\Seeders;

use App\Models\NhaCungCap;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Factories\DanhMucFactory;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            DiaChiSeeder::class,
            UserSeeder::class,
            DanhMucSeeder::class,
            NhaCungCapSeeder::class,
            SanPhamSeeder::class,
        ]);
    }
}
