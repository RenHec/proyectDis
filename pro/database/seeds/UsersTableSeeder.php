<?php

use App\Note;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 20)->create();
        factory(App\Note::class, 100)->create();

        //Permission list
        Permission::create(['name' => 'notes.index']);
        Permission::create(['name' => 'notes.edit']);
        Permission::create(['name' => 'notes.show']);
        Permission::create(['name' => 'notes.create']);
        Permission::create(['name' => 'notes.destroy']);

        //Administrador
        $admin = Role::create(['name' => 'Administrador']);

        $admin->givePermissionTo([
            'notes.index',
            'notes.edit',
            'notes.show',
            'notes.create',
            'notes.destroy'
        ]);

        //$admin->givePermissionTo('products.index');
        //$admin->givePermissionTo(Permission::all());
       
        //Director
        $guest = Role::create(['name' => 'Director']);

        $guest->givePermissionTo([
            'notes.index',
            'notes.edit',
            'notes.show',
            'notes.create',
            'notes.destroy'
        ]);

        //Cliente
        $guest = Role::create(['name' => 'Cliente']);

        $guest->givePermissionTo([
            'notes.index',
            'notes.create',
        ]);

        //User Administrador
        $user = User::find(1);
        $user->assignRole('Administrador');   
        
        //User Director
        $user = User::find(2);
        $user->assignRole('Director');    
        
        //User Cliente
        $user = User::find(3);
        $user->assignRole('Cliente');       
    }
}
