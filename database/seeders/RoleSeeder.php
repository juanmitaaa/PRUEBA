<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = new Role();
        $role1->name = 'admin';
        $role1->description = 'Administrator';
        $role1->save();
        $role2 = new Role();
        $role2->name = 'aux';
        $role2->description = 'Auxiliar';
        $role2->save();

        //Ya que el usuario admin lo hemos registrado con la vista pero lo podiamos haber creado así:
        /*$user1 = new User();
        $user1->name = 'admin';
        $user1->email => 'j_medi_rome@hotmail.com',
        $user1->password => Hash::make('12345678'),
        $user1->save();*/

        //Como ya lo teniamos creado lo cargamos de BBDD User::find es lo mismo que hacer SELECT * FROM `users` WHERE `id`='1'
        $user = User::find(1);
        $user->roles()->attach($role1->id);//Le asigno el Rol de administrador al primer usuario    
    }
}
