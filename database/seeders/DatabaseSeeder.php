<?php

namespace Database\Seeders;

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
        $role1 = Role::create(['name' => 'admin']);

        $role2 = Role::create(['name' => 'user']);



        // \App\Models\User::factory(10)->create();
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456')
        ]);

        $user->assignRole($role1);

        $this->call([
            DanhMucSeeder::class,
            NhacungCapSeeder::class,
        ]);
    }
}
