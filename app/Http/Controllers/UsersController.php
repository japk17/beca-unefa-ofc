<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use Redirect,Response,DB,Config;
use Datatables;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create user'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:read users'], ['only' => 'index']);
        $this->middleware(['permission:update user'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:delete user'], ['only' => 'delete']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.index');
    }

    //Datatables laravel
    public function usersList()
    {
        $users = User::with('Useroles.role')->get();
                //dd(str_replace(['[',']','"'],'', $users[3]->Useroles->pluck('role')->pluck('name')->unique()));
                //dd($users[3]);
        return datatables()->of($users)
            ->addColumn('roles', function ($user) {
                return str_replace(['[',']','"'],' ', $user->Useroles->pluck('role')->pluck('name')->unique());
            })
            ->addColumn('action', function ($user) {
                return '<a href="'.route("usuarios.edit",$user->id).'" class="btn btn-primary">Editar</a> &nbsp; 
                <a href="'.route("usuarios.delete",$user->id).'" class="btn btn-danger">Eliminar</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');

        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $usuario = new User;


        $usuario->doc_type = $request->doc_type;
        $usuario->doc_id = $request->doc_id;
        $usuario->name = $request->name;
        $usuario->last_name = $request->last_name;
        $usuario->email = $request->email;
        //$usuario->password = bcrypt($request->password);
        //$usuario->password = Hash::make($request->password);
        $usuario->password = $request->password;
        $usuario->save();
        //dd($usuario);
        if (empty($usuario->id) != true) {
            // asignar el rol
            //$usuario->syncRoles([$request->rol]);
            $usuario->assignRole($request->rol);

            return redirect('/usuarios');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        $usuario = User::findOrFail($id);

        $roles = Role::all()->pluck('name', 'id');

        return view('usuarios.edit', compact('usuario', 'roles'));
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
        $usuario = User::findOrFail($id);
        
        $usuario->doc_type = $request->doc_type;
        $usuario->doc_id = $request->doc_id;
        $usuario->name = $request->name;
        $usuario->last_name = $request->last_name;
        $usuario->email = $request->email;

        if ($request->password != null) {
            $usuario->password = $request->password;
        }

        $usuario->syncRoles([$request->rol]);

        $usuario->save();

        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        try{
            $usuario = User::findOrFail($id);
            $usuario->removeRole($usuario->roles->implode('name', ', '));
            $usuario->delete();
                return redirect('/usuarios');
        } catch(\Exception $e){
            return response()->json([
                'mensaje' => 'Error al eliminar el usuario.'
            ]);
        }

    }
}
