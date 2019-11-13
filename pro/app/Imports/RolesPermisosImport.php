<?php

namespace App\Imports;

use App\Models\Menu;
use App\Models\MenuRol;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Concerns\ToCollection;

class RolesPermisosImport implements ToCollection
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $value) {
            if(!is_null($value[0]) && $value[1] != 'Pantalla')
            {
                $menu = Menu::where('name',$value[1])->first();
                if(is_null($menu))
                {
                    $menu = new Menu();
                    $menu->icon = $value[11];
                    $menu->name = $value[1];
                    $menu->route = $value[2];
                    $menu->save();
                }

                $permiso = $value[0].' '.$value[1];
                Permission::create(['name' => $permiso]);

                if(!is_null($value[3])){
                    $rol = Role::findOrfail(1);

                    $rol->givePermissionTo([
                        $permiso
                    ]);
                    
                    if(is_null(MenuRol::where('menus_id', $menu->id)->where('roles_id', $rol->id)->first()))
                    {
                        $menu_rol = new MenuRol();
                        $menu_rol->menus_id = $menu->id;
                        $menu_rol->roles_id = $rol->id;
                        $menu_rol->save();
                    }

                     echo 'Pantalla '.$permiso.'  ----  Rol '.$rol->name.PHP_EOL;
                }
                if(!is_null($value[4])){
                    $rol = Role::findOrfail(2);

                    $rol->givePermissionTo([
                        $permiso
                    ]);

                    if(is_null(MenuRol::where('menus_id', $menu->id)->where('roles_id', $rol->id)->first()))
                    {
                        $menu_rol = new MenuRol();
                        $menu_rol->menus_id = $menu->id;
                        $menu_rol->roles_id = $rol->id;
                        $menu_rol->save();
                    }

                     echo 'Pantalla '.$permiso.'  ----  Rol '.$rol->name.PHP_EOL;
                }    
                if(!is_null($value[5])){
                    $rol = Role::findOrfail(3);

                    $rol->givePermissionTo([
                        $permiso
                    ]);

                    if(is_null(MenuRol::where('menus_id', $menu->id)->where('roles_id', $rol->id)->first()))
                    {
                        $menu_rol = new MenuRol();
                        $menu_rol->menus_id = $menu->id;
                        $menu_rol->roles_id = $rol->id;
                        $menu_rol->save();
                    }

                     echo 'Pantalla '.$permiso.'  ----  Rol '.$rol->name.PHP_EOL;
                }     
                if(!is_null($value[6])){
                    $rol = Role::findOrfail(4);

                    $rol->givePermissionTo([
                        $permiso
                    ]);

                    if(is_null(MenuRol::where('menus_id', $menu->id)->where('roles_id', $rol->id)->first()))
                    {
                        $menu_rol = new MenuRol();
                        $menu_rol->menus_id = $menu->id;
                        $menu_rol->roles_id = $rol->id;
                        $menu_rol->save();
                    }

                     echo 'Pantalla '.$permiso.'  ----  Rol '.$rol->name.PHP_EOL;
                }            
                if(!is_null($value[7])){
                    $rol = Role::findOrfail(5);

                    $rol->givePermissionTo([
                        $permiso
                    ]);

                    if(is_null(MenuRol::where('menus_id', $menu->id)->where('roles_id', $rol->id)->first()))
                    {
                        $menu_rol = new MenuRol();
                        $menu_rol->menus_id = $menu->id;
                        $menu_rol->roles_id = $rol->id;
                        $menu_rol->save();
                    }

                     echo 'Pantalla '.$permiso.'  ----  Rol '.$rol->name.PHP_EOL;
                }    
                if(!is_null($value[8])){
                    $rol = Role::findOrfail(6);

                    $rol->givePermissionTo([
                        $permiso
                    ]);

                    if(is_null(MenuRol::where('menus_id', $menu->id)->where('roles_id', $rol->id)->first()))
                    {
                        $menu_rol = new MenuRol();
                        $menu_rol->menus_id = $menu->id;
                        $menu_rol->roles_id = $rol->id;
                        $menu_rol->save();
                    }

                     echo 'Pantalla '.$permiso.'  ----  Rol '.$rol->name.PHP_EOL;
                }     
                if(!is_null($value[9])){
                    $rol = Role::findOrfail(7);

                    $rol->givePermissionTo([
                        $permiso
                    ]);

                    if(is_null(MenuRol::where('menus_id', $menu->id)->where('roles_id', $rol->id)->first()))
                    {
                        $menu_rol = new MenuRol();
                        $menu_rol->menus_id = $menu->id;
                        $menu_rol->roles_id = $rol->id;
                        $menu_rol->save();
                    }

                     echo 'Pantalla '.$permiso.'  ----  Rol '.$rol->name.PHP_EOL;
                }         
                if(!is_null($value[10])){
                    $rol = Role::findOrfail(8);

                    $rol->givePermissionTo([
                        $permiso
                    ]);

                    if(is_null(MenuRol::where('menus_id', $menu->id)->where('roles_id', $rol->id)->first()))
                    {
                        $menu_rol = new MenuRol();
                        $menu_rol->menus_id = $menu->id;
                        $menu_rol->roles_id = $rol->id;
                        $menu_rol->save();
                    }

                     echo 'Pantalla '.$permiso.'  ----  Rol '.$rol->name.PHP_EOL;
                }  
            }
        }
    }
}
