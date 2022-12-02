<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset chaced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayPremissionName = [
            // product
            "access product",
            // order
            "access bid",
            // admin
            "access admin", "create admin",
            // owner
            'access owner', 'update owner',
        ];

        $premission = collect($arrayPremissionName)->map(function ($premission) {
            return ['name' => $premission, 'guard_name' => "web"];
        });

        Permission::insert($premission->toArray());

        // create role
        Role::create(['name' => 'owner'])->givePermissionTo($arrayPremissionName);
        Role::create(['name' => 'admin'])->givePermissionTo('access product', 'access bid', 'access admin');
        Role::create(['name' => 'customer'])->givePermissionTo('access product', 'access bid');
    }
}
