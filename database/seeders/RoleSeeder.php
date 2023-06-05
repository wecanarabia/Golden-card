<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            'name'=>'admin',
            'roleable_id'=>0,
            'roleable_type'=>get_class(app(Admin::class)),
            'permissions'=>json_encode(array_keys(config('global.admin'))),
        ]);

    }
}
