<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $getSAdmin = Admin::where('email', 'admin@example.com')->first();

        if (!$getSAdmin) {
            $admin = new Admin();
            $admin->role_id = 1;
            $admin->name = 'Super Admin';
            $admin->email = 'admin@example.com';
            $admin->phone = '01700000000';
            $admin->password = Hash::make('12345678');
            $admin->avatar = '';
            $admin->type = 'super_admin';
            $admin->status = 1;
            $admin->save();
        }
    }
}
