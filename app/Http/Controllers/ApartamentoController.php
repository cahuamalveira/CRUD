<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreapartamentoRequest;
use App\Http\Requests\UpdateapartamentoRequest;
use App\Models\apartamento;

class ApartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['apartamento'] = apartamento::orderBy('id','desc')->paginate(5);
        return view('apartamento.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apartamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreapartamentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreapartamentoRequest $request)
    {
        $validatedInput = $request->validated();

        apartamento::create([
            'metros_quadrados' => $validatedInput['metros_quadrados'],
            'numero_quartos' => $validatedInput['numero_quartos'],
        ]);

        return redirect()->route('apartamento.index')
            ->with('success', 'Apartamento criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apartamento  $apartamento
     * @return \Illuminate\Http\Response
     */
    public function show(apartamento $apartamento)
    {
        return view('apartamento.show', compact('apartamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apartamento  $apartamento
     * @return \Illuminate\Http\Response
     */
    public function edit(apartamento $apartamento)
    {
        return view('apartamento.edit', compact('apartamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateapartamentoRequest  $request
     * @param  \App\Models\apartamento  $apartamento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateapartamentoRequest $request, apartamento $apartamento)
    {
        $validatedInput = $request->validated();

        $apartamento->update([
            'metros_quadrados' => $validatedInput['metros_quadrados'],
            'numero_quartos' => $validatedInput['numero_quartos'],
        ]);

        return redirect()->route('apartamento.index')->with('success','Apartamento atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apartamento  $apartamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(apartamento $apartamento)
    {
        $apartamento->delete();

        return redirect()->route('apartamento.index')->with('success', 'Apartamento deletado com sucesso');    
    }
}
