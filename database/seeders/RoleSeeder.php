<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Service;
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        DB::table('roles')->insert([
            'name'=>'admin',
            'roleable_id'=>0,
            'roleable_type'=>get_class(app(Admin::class)),
            'permissions'=>json_encode(array_keys(config('global.admin'))),
        ]);

        DB::table('roles')->insert([
            'name'=>'main',
            'roleable_id'=>0,
            'roleable_type'=>get_class(app(Service::class)),
            'permissions'=>json_encode(array_keys(config('global.service'))),
        ]);

    }
}
