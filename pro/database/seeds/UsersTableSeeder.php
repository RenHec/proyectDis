<?php

use App\Note;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmpleadoImport;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Imports\DepartamentoImport;
use App\Imports\RolesPermisosImport;
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
        $insert = Role::create(['name' => 'Administrador']);
        $insert = Role::create(['name' => 'Gerente']);
        $insert = Role::create(['name' => 'Compra']);
        $insert = Role::create(['name' => 'Bodega']);
        $insert = Role::create(['name' => 'Repartidor']);
        $insert = Role::create(['name' => 'Venta']);
        $insert = Role::create(['name' => 'Director']);
        $insert = Role::create(['name' => 'Cliente']);

        factory(App\Note::class, 100)->create();
        Excel::import(new RolesPermisosImport, 'database/seeds/Catalogo/RolesPermisos.xlsx');  	     	   	    	     	
        Excel::import(new DepartamentoImport, 'database/seeds/Catalogo/Municipios.xlsx');  	     	   	    	     	
        Excel::import(new EmpleadoImport, 'database/seeds/Catalogo/EmpleadoMomentaneos.xlsx');  	     	   	    	     	

        //User Administrador
        $user = User::find(1);
        $user->assignRole('Administrador');     

        //User Gerente
        $user = User::find(2);
        $user->assignRole('Gerente');   

        //User Director
        $user = User::find(3);
        $user->assignRole('Director');    

        //User Cliente
        $user = User::find(4);
        $user->assignRole('Cliente');     
    }
}
