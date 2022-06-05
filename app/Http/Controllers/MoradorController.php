<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremoradorRequest;
use App\Http\Requests\UpdatemoradorRequest;
use App\Models\morador;
use App\Models\apartamento;

class MoradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['morador'] = morador::orderBy('id','desc')->paginate(5);
        return view('morador.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('morador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremoradorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremoradorRequest $request)
    {
        $validatedInput = $request->validated();

        $apartamento = apartamento::find($validatedInput['apartamento_id']);
        if (is_null($apartamento)) {
            return redirect()->route('morador.index')
            ->withMessage('Apartamento não encontrado');
        }

        $morador = new morador();
        $morador->nome = $validatedInput['nome'];
        $morador->telefone = $validatedInput['telefone'];
        $morador->email = $validatedInput['email'];

        $apartamento->morador()->save($morador);

        return redirect()->route('morador.index')
            ->with('success', 'Morador criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\morador  $morador
     * @return \Illuminate\Http\Response
     */
    public function show(morador $morador)
    {
        return view('morador.show', compact('morador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\morador  $morador
     * @return \Illuminate\Http\Response
     */
    public function edit(morador $morador)
    {
        return view('morador.edit', compact('morador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemoradorRequest  $request
     * @param  \App\Models\morador  $morador
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemoradorRequest $request, morador $morador)
    {
        $validatedInput = $request->validated();

        $apartamento = apartamento::find($validatedInput['apartamento_id']);
        if (is_null($apartamento)) {
            return redirect()->route('morador.index')
            ->withMessage('Apartamento não encontrado');
        }

        $morador->update([
            'nome' => $validatedInput['nome'],
            'telefone' => $validatedInput['telefone'],
            'email' => $validatedInput['email'],
            'apartamento_id' => $validatedInput['apartamento_id']
        ]);

        $apartamento->morador()->save($morador);

        return redirect()->route('morador.index')
        ->with('success', 'Morador atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\morador  $morador
     * @return \Illuminate\Http\Response
     */
    public function destroy(morador $morador)
    {
        $morador->delete();

        return redirect()->route('morador.index')->with('success', 'Morador deletado com sucesso');    
    }
}
