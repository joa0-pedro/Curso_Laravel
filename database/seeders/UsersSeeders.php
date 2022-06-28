<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Console\JobMakeCommand;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(['email'=>'jpedroad14@gmail.com'],[
            'name'=>'João Pedro',
            'email'=>'jpedroad14@gmail.com',
            'password'=> bcrypt('12345ab'),
        ]);
        User::firstOrCreate(['email'=>'gikalunatic@gmail.com'],[
            'name'=>'Giovanne Araujo',
            'email'=>'gikalunatic@gmail.com',
            'password'=> bcrypt('ba54321'),
        ]);
    }
}
