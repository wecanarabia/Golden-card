<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('admins')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'Admin@golden-card.com',
            'role_id' => Role::where('name','admin')->where('roleable_id',0)->first()->id,
            'password' => Hash::make('12345678'),
        ]);
    }
}
