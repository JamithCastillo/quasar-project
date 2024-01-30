<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Raza;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoriaRequest;
use Inertia\Inertia;


class RazaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemsPerPage = (int) request()
            ->query('itemsPerPage');


        $razas = Raza::orderBy('updated_at', 'asc')->paginate($itemsPerPage);
        // $gastos = $this->paginate($newDistinctives, $itemsPerPage);
        return Inertia::render('Razas/Index', ['paginationObject' => $razas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return Inertia::render('Razas/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriaRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreCategoriaRequest $request): RedirectResponse
    {

        $validated = $request->validated();
        $Raza = Raza::create($validated['categoria']);
        return redirect('/razas')->with([
            'success' => "Tasa \"{$Raza->name}\" guardada con éxito",
        ]);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Raza $Raza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Raza $Raza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Raza $Raza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Raza $Raza)
    {
        $Raza = Raza::where('id', $id)->delete();
// dd($id);
        return redirect('/razas')->with([
            'success' => "Raza \"{$Raza}\" eliminado con éxito",
        ])->header('refresh', '0');
    }
}
