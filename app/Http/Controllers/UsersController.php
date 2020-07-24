<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view("users.create", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nombre = $request->input('name');
        $email = $request->input('email');
        $clave = bcrypt($request->input('password'));
        $rol = $request->input('rol');

        try {
            $user = new User();
            $user->name = $nombre;
            $user->email = $email;
            $user->password = $clave;
            $user->save();

            $user->assignRole($rol);

            return redirect("/usuarios")->with(["message" => "Registro realizado con exito", "status" => 200]);
        } catch (Exception $e) {

            return back()->with([
                'message' => "Oh! Ha ocurrido un error!",
                'status' => 500,
            ]);
        }

    }

    /**
     * Display the specified resource.
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);

        $roles = Role::all()->pluck('name', 'id');

        return view("users.edit", compact("users", "roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $name = $request->input('name');
        $email = $request->input('email');
        $rol = $request->input('rol');

        $user->name = $name;
        $user->email = $email;
        $user->save();

        $user->syncRoles($rol);

        return redirect("/usuarios")->with(["message" => "Modificacion realizada con exito", "status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
