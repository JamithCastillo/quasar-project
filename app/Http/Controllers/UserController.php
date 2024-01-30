<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
// use App\Http\Requests\UpdateUserRequest;
// use App\Models\Company;
// use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\ResponseFactory;
use Inertia\Inertia;
use Inertia\Response;


class UserController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->authorizeResource(User::class, 'user');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
    }
    
    public function administradores()
    {
        
       $itemsPerPage = (int) request()
            ->query('itemsPerPage');

        $administradores = User::join('role_users', 'role_users.user_id', '=', 'users.id')->orderBy('users.updated_at', 'asc')->where('role_id', '2')->paginate($itemsPerPage);
        return Inertia::render('Administradores/Index', ['paginationObject' => $administradores]);


    }
    
    public function duenos()
    {
        
       $itemsPerPage = (int) request()
            ->query('itemsPerPage');

        $administradores = User::join('role_users', 'role_users.user_id', '=', 'users.id')->orderBy('users.updated_at', 'asc')->where('role_id', '3')->paginate($itemsPerPage);
        return Inertia::render('Duenos/Index', ['paginationObject' => $administradores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if user is admin
        if (Auth::user()->hasRole('admin')) {
            // retrieve all roles and companies
            $companies = Company::select(['id', 'name', 'code'])->get();
            $roles = Role::select(['id', 'name'])->get();
        }

        // else, is company admin
        else {
            // don't retrieve companies

            // retrieve all roles
            $roles = Role::select(['id', 'name'])
                ->where('name', '!=', 'admin')
                ->where('name', '!=', 'company_admin')
                ->get();
        }

        return inertia('Users/Create', [
            'companies' => $companies ?? [],
            'roles' => $roles,
        ]);
    }

    public function search(): Response|ResponseFactory
    {
        $everywhere = request()->get('everywhere');

        $users = User::with('company:id,name')
            ->with('roles:id,name')
            ->orderBy('updated_at', 'desc')
            ->paginate(((int) request()->query('itemsPerPage')) ?? 20);

        if ($everywhere) {
            $users = $users->where('email', 'like', '%' . $everywhere . '%');
        }

        return inertia('Users/Index', [
            'paginationObject' => $users,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        
        $validated = $request->validated();
        //  dd($request['rol']);
        $validated['password'] = Hash::make($validated['password']);
        
        // if the user is is company_admin and not admin
        $user = User::create($validated);
        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => $request['rol'],
        ]);
       
       if($request['rol'] == '3'){
        return redirect(route('duenos.index'))->with([
            'success' => 'Usuario "' . $user->email . '" creado con éxito',
            'itemId' => $user->id,
        ]);
       
       }else{
        return redirect(route('administradores.index'))->with([
            'success' => 'Usuario "' . $user->email . '" creado con éxito',
            'itemId' => $user->id,
        ]);
       }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // if the user is is company_admin and not admin
        if (Auth::user()->hasRole('company_admin') && !Auth::user()->hasRole('admin')) {
            // just keep the user as it is
        }

        // else, is admin
        else {
            // get roles and companies
            $roles = Role::select(['id', 'name'])->get();
            $companies = Company::select(['id', 'name', 'code'])->get();

            // and get the user with company and roles
            $user = User::with('company')
                ->with('roles:id,name')
                ->findOrFail($user->id);
        }

        return inertia('Users/Edit', [
            'user' => $user,
            'companies' => $companies ?? null,
            'roles' => $roles ?? null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        // if user is admin
        if (Auth::user()->hasRole('admin')) {
            // remove all user roles
            RoleUser::where('user_id', $user->id)->delete();

            // and add new validated ones
            foreach ($validated['user']['roles'] as $role) {
                RoleUser::create([
                    'user_id' => $user->id,
                    'role_id' => $role['id'],
                ]);
            }
        }

        // if user didn't update the password
        if (!array_key_exists('password', $validated['user'])) {
            // remove it from validated user
            unset($validated['user']['password']);
        } else {
            // else, hash it
            $validated['user']['password'] = Hash::make($validated['user']['password']);
        }

        // remove roles from validated user, they have already been updated
        unset($validated['user']['roles']);

        $user->update($validated['user']);

        return redirect('/users')->with([
            'success' => 'Usuario "' . $user->email . '" actualizado con éxito',
            'itemId' => $user->id,
        ]);
    }
}
