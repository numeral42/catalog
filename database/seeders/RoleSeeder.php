<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{

    public function run()
    {
        $role1=Role::create(['name' => 'Guest']);
        $role2=Role::create(['name' => 'User']);
        $role3=Role::create(['name' => 'Admin']);

        Permission::create(['name' => 'index', 
                            'description' => 'Mostrar welcome'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.index', 
                            'description' => 'Mostrar dashboard'])->syncRoles([$role3, $role2]);

        Permission::create(['name' => 'admin.users.index', 
                            'description' => 'Ver lista de usurios'])->syncRoles([$role3]);        
        Permission::create(['name' => 'admin.users.edit', 
                            'description' => 'Editar usuarios'])->syncRoles([$role3]);        

        Permission::create(['name' => 'admin.categories.index', 
                            'description' => 'Ver lista de categorías'])->syncRoles([$role3, $role2]);        
        Permission::create(['name' => 'admin.categories.create', 
                            'description' => 'Crear categorías'])->syncRoles([$role3]);        
        Permission::create(['name' => 'admin.categories.edit', 
                            'description' => 'Editar categorias'])->syncRoles([$role3]);        
        Permission::create(['name' => 'admin.categories.destroy', 
                            'description' => 'Eliminar categorías'])->syncRoles([$role3]);

        Permission::create(['name' => 'admin.tags.index', 
                            'description' => 'Ver lista de etiquetas'])->syncRoles([$role3, $role2]);        
        Permission::create(['name' => 'admin.tags.create', 
                            'description' => 'Crear etiquetas'])->syncRoles([$role3]);        
        Permission::create(['name' => 'admin.tags.edit', 
                            'description' => 'Editar etiquetas'])->syncRoles([$role3]);        
        Permission::create(['name' => 'admin.tags.destroy', 
                            'description' => 'Eliminar etiquetas'])->syncRoles([$role3]);

        Permission::create(['name' => 'admin.products.index', 
                            'description' => 'Ver lista de productos'])->syncRoles([$role3, $role2]);        
        Permission::create(['name' => 'admin.products.create', 
                            'description' => 'Crear productos'])->syncRoles([$role3, $role2]);        
        Permission::create(['name' => 'admin.products.edit', 
                            'description' => 'Editar productos'])->syncRoles([$role3, $role2]);        
        Permission::create(['name' => 'admin.products.destroy', 
                            'description' => 'Eliminar productos'])->syncRoles([$role3, $role2]);

        Permission::create(['name' => 'admin.roles.index', 
                            'description' => 'Ver lista de roles'])->syncRoles([$role3, $role2]);        
        Permission::create(['name' => 'admin.roles.create', 
                            'description' => 'Crear roles'])->syncRoles([$role3]);        
        Permission::create(['name' => 'admin.roles.edit', 
                            'description' => 'Editar roles'])->syncRoles([$role3]);        
        Permission::create(['name' => 'admin.roles.destroy', 
                            'description' => 'Eliminar roles'])->syncRoles([$role3]);
    }
}
