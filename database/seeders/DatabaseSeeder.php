<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //   $user = new User();
    //         $user->name = 'aya';
    //         $user->email = 'aya@gmail.com';
    //         $user->password = Hash::make(123456789);
    //         $user->save();
    $this->call([
        AdminSeeder::class,
    ]);

    }
}
