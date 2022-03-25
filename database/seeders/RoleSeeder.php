<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin, editor, viewer

        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $developer = Role::create(['name' => 'viewer']);

        Permission::create(['name' => 'dashboard'])->assignRole($admin);
        Permission::create(['name' => 'gallery'])->syncRoles($admin, $editor, $developer);
    }
}
