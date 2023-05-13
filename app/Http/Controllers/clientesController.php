<?php

namespace App\Http\Controllers;

use App\DataTables\clientesDataTable;
use App\Http\Requests\CreateclientesRequest;
use App\Http\Requests\UpdateclientesRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\clientes;
use Illuminate\Http\Request;

class clientesController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Clientes')->only('show');
        $this->middleware('permission:Crear Clientes')->only(['create','store']);
        $this->middleware('permission:Editar Clientes')->only(['edit','update']);
        $this->middleware('permission:Eliminar Clientes')->only('destroy');
    }
    /**
     * Display a listing of the clientes.
     */
    public function index(clientesDataTable $clientesDataTable)
    {
    return $clientesDataTable->render('clientes.index');
    }


    /**
     * Show the form for creating a new clientes.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created clientes in storage.
     */
    public function store(CreateclientesRequest $request)
    {
        $input = $request->all();

        /** @var clientes $clientes */
        $clientes = clientes::create($input);

        flash()->success('Clientes guardado.');

        return redirect(route('clientes.index'));
    }

    /**
     * Display the specified clientes.
     */
    public function show($id)
    {
        /** @var clientes $clientes */
        $clientes = clientes::find($id);

        if (empty($clientes)) {
            flash()->error('Clientes no encontrado');

            return redirect(route('clientes.index'));
        }

        return view('clientes.show')->with('clientes', $clientes);
    }

    /**
     * Show the form for editing the specified clientes.
     */
    public function edit($id)
    {
        /** @var clientes $clientes */
        $clientes = clientes::find($id);

        if (empty($clientes)) {
            flash()->error('Clientes no encontrado');

            return redirect(route('clientes.index'));
        }

        return view('clientes.edit')->with('clientes', $clientes);
    }

    /**
     * Update the specified clientes in storage.
     */
    public function update($id, UpdateclientesRequest $request)
    {
        /** @var clientes $clientes */
        $clientes = clientes::find($id);

        if (empty($clientes)) {
            flash()->error('Clientes no encontrado');

            return redirect(route('clientes.index'));
        }

        $clientes->fill($request->all());
        $clientes->save();

        flash()->success('Clientes actualizado.');

        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified clientes from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var clientes $clientes */
        $clientes = clientes::find($id);

        if (empty($clientes)) {
            flash()->error('Clientes no encontrado');

            return redirect(route('clientes.index'));
        }

        $clientes->delete();

        flash()->success('Clientes eliminado.');

        return redirect(route('clientes.index'));
    }
}
