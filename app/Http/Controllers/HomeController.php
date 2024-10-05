<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        echo "L";
    }
    public function createRole(){
        /////////////// 1. create roles and permissions
        //$role = \Spatie\Permission\Models\Role::create(['name' => 'manager']);
        //$permission = \Spatie\Permission\Models\Permission::create(['name' => 'view users']);
        ////////////// 2. assign a permission to role
        //$roleis = \Spatie\Permission\Models\Role::findByName("manager");
        //$roleis->givePermissionTo("view users");
        //$role->givePermissionTo($permission);
        //$roleis->syncPermissions(['view user', 'delete user']); //delete all old permissions and assign new ones

        //3. we can remove permissions or roles

        //$roleis->revokePermissionTo('delete user');
        //$permission->removeRole($role);
        
        //4. ASSIGN ROLE TO USER
        //$user = \App\Models\User::find(7); 
        
        //$user->assignRole('manager');

        dd("its me");
    }
    public function home(){
       return view('homecrontroller');
        
    }

}


/*

$role = \Spatie\Permission\Models\Role::create(['name' => 'manager']);
MODAL:: laravel_10\vendor\spatie\laravel-permission\src\Models

$permission = \Spatie\Permission\Models\Permission::create(['name' => 'edit articles']);
*/

