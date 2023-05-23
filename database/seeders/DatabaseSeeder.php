<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


            $user = new User();
            $user->first_name = 'aya';
            $user->last_name = 'matroud';
            $user->phone = '+963937158233';
            $user->email = 'aya@gmail.com';
            $user->password = Hash::make(123456789);
            $user->save();
            $this->call([
                AdminSeeder::class,
            ]);


    }

}
