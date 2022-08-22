<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Global_admin_creation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Models\User();
        $admin->name = "GlobalAdmin";
        $admin->email = "admin@support.com";
        $admin->password = Hash::make('qwertyui');
        $admin->admin = true;
        $admin->save();
    }
}
