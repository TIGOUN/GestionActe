<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use MercurySeries\Flashy\Flashy;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /* @return \Illuminate\Http\Response */
    public function index(Request $request)
    {
            $data = User::orderBy('id','DESC')->paginate(5);
    return view('admin.users.index',compact('data'))
    ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }


    protected function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->input('roles'));

        Flashy::message('L\'utilisateur a été crée avec succès !!!');

        return redirect()->route('user.index');
    }


    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }


    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.users.edit',compact('user','roles','userRole'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'same:confirm-password',
                'roles' => 'required'
            ]);
        $input = $request->all();
        if(!empty($input['password'])){
                    $input['password'] = Hash::make($input['password']);
        }else{
                    $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        
        $user->assignRole($request->input('roles'));

        Flashy::message('L\'utilisateur a été mise à jour avec succès !!!');

            return redirect()->route('user.index');
    }


    public function destroy(User $user)
    {
        $user->delete();

        Flashy::message('L\'utilisateur a été supprimer avec succès !!!');

        return redirect()->route('user.index');
    }
}