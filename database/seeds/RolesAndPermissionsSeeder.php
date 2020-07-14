<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create( ['name' => 'create users'] );
        Permission::create( ['name' => 'update users'] );
        Permission::create( ['name' => 'delete users'] );
        Permission::create( ['name' => 'read users'] );

        Permission::create( ['name' => 'create roles'] );
        Permission::create( ['name' => 'update roles'] );
        Permission::create( ['name' => 'delete roles'] );
        Permission::create( ['name' => 'read roles'] );

        Permission::create( ['name' => 'create permission'] );
        Permission::create( ['name' => 'update permission'] );
        Permission::create( ['name' => 'delete permission'] );
        Permission::create( ['name' => 'read permission'] );

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create( ['name' => 'editor'] );
        $role->givePermissionTo( 'read users' );
        $role->givePermissionTo( 'update users' );

        // or may be done by chaining
        $role = Role::create( ['name' => 'moderador'] )
        ->givePermissionTo( ['create users', 'update users', 'delete users', 'read users'] );

        $role = Role::create( ['name' => 'super-admin'] );
        $role->givePermissionTo( Permission::all() );
    }
}
