<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;

class BaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            'admin',
            'cashier',
        ];

        foreach($roles as $role) {
            Role::create(['name' => $role]);
        }

        $admin = User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'password' => 'admin',
        ]);

        $cashier = User::create([
            'name' => 'Cashier',
            'username' => 'cashier',
            'password' => 'cashier',
        ]);

        $admin->assignRole('admin');
        $cashier->assignRole('cashier');
    }
}
