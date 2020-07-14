<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        //Crear usuario con rol editor

        $editor = User::create( [
            'name' => 'editor',
            'email' => 'editor@editor.com',
            'password' => bcrypt( '12345678' ),
        ] );

        $editor->assignRole( 'editor' );

        //Crear usuario con rol moderador
        $moderador = User::create( [
            'name' => 'mod',
            'email' => 'mod@mod.com',
            'password' => bcrypt( '12345678' ),
        ] );

        $moderador->assignRole( 'moderador' );

        //Crear usuario con rol superadmin
        $super_admin = User::create( [
            'name' => 'super admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt( '12345678' ),
        ] );

        $super_admin->assignRole( 'super-admin' );
    }
}
