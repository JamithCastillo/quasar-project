<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Perro;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Http\Requests\StorePerroRequest;
use App\Http\Requests\UpdatePerroRequest;
use Inertia\Inertia;
use App\Models\Tamano;
use App\Models\Raza;
use App\Models\User;

class PerroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    
        $tamano = request()->get('tamano');
        $raza = request()->get('raza');
        
        $itemsPerPage = (int) request()
            ->query('itemsPerPage');

        $grupo = Perro::select(
            'razas.name as nombre',
            \DB::raw('SUM(perros.importotal) as total_monto'),
            \DB::raw('MAX(perros.raza) as raza'),
            \DB::raw('MAX(perros.tamano) as tamano'),
            \DB::raw('MAX(perros.fechafactura) as fechafactura'),
            \DB::raw('MAX(perros.created_at) as fechagasto'), )
        ->whereRaw("(`tamano` like '%$tamano%' " .
        "and  `raza` like '%$raza%' )")
        // ->where('gastos.tipo_factura',$tipo)
        ->join('razas', 'razas.id', '=', 'perros.raza')
        ->groupBy('razas.name')->orderBy('perros.updated_at', 'asc')->get();
        
        // ->orderBy('gastos.updated_at', 'asc');
        
       

        $perros = Perro::join('tamanos', 'tamanos.id', '=', 'perros.tamano')
        ->select('razas.name as razaname','perros.*', 'users.email as usuario', 'tamanos.name as tamano')
        ->whereRaw("(`tamano` like '%$tamano%' " .
        "and  `raza` like '%$raza%' )")
        ->join('razas', 'razas.id', '=', 'perros.raza')
        ->join('users', 'users.id', '=', 'perros.dueno')
        ->orderBy('perros.updated_at', 'asc')->paginate($itemsPerPage);
        
        $tamano = Tamano::select(['id', 'name'])->get();
        $raza = Raza::select(['id', 'name'])->get();

        return Inertia::render('Perros/Index', [
            'paginationObject' => $perros,
            'tamano' => $tamano ?? [],
            'raza' => $raza ?? [],
            'grupo' => $grupo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $tamano = Tamano::select(['id', 'name'])->get();
        $raza = Raza::select(['id', 'name'])->get();
        $user = User::select(['users.id', 'users.name', 'users.email'])
        ->where('role_id', '3')
        ->join('role_users', 'role_users.user_id', '=', 'users.id')
        ->get();

        return Inertia::render('Perros/Create', [
            'tamano' => $tamano ?? [],
            'raza' => $raza ?? [],
            'user' => $user ?? [],
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePerroRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StorePerroRequest $request): RedirectResponse
    {
        Artisan::call('storage:link');

        $validated = $request->validated();
    
        if ($request->file('image') != null) {
            sleep(1);
                 $request->file('image')->storeAs('perros', $validated['numero'] . '_perro.png', ['disk' => 'public']);
                }

       
        $Perro = Perro::create($validated);
        return redirect('/perros')->with([
            'success' => "Perro \"{$Perro->numero}\" guardada con éxito",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Perro $Perro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tamano = Tamano::select(['id', 'name'])->get();
        $raza = Raza::select(['id', 'name'])->get();
        $perros = Perro::where('numero', $id)->firstOrFail();
        $user = User::select(['users.id', 'users.name', 'users.email'])
        ->where('role_id', '3')
        ->join('role_users', 'role_users.user_id', '=', 'users.id')
        ->get();
        
        return inertia('Perros/Edit', [
            'perros' => $perros,
            'tamano' => $tamano ?? [],
            'raza' => $raza ?? [],
            'user' => $user ?? [],
        ]);
        

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerroRequest $request, Perro $Perro)
    {

        $validated = $request->validated();
        if ($request->file('image') != null) {
            sleep(1);
                 $request->file('image')->storeAs('perros', $request['numero'] . '_perro.png', ['disk' => 'public']);
           
        }
        $Perro = Perro::where('numero', $request['numero'])->update($validated);
        

        return redirect('/perros')->with([
            'success' => "Perro \"{$Perro}\" guardado con éxito",
        ])->header('refresh', '0');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id , Perro $Perro)
    {
        $Perro = Perro::where('numero', $id)->delete();
        
        return redirect('/perros')->with([
            'success' => "Perro \"{$Perro}\" eliminado con éxito",
        ])->header('refresh', '0');
    }
}
