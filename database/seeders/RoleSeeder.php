<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Spatie
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
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleAfiliado = Role::create(['name' => 'Afiliado']);

        Permission::create(['name' => 'afiliado.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'afiliado.crear'])->syncRoles([$roleAdmin,$roleAfiliado]);
        Permission::create(['name' => 'afiliado.editar'])->syncRoles([$roleAdmin,$roleAfiliado]);
        Permission::create(['name' => 'afiliado.eliminar'])->syncRoles([$roleAdmin]);
    }
}
