<?php

namespace App\Http\Controllers;

use App\DataTables\tipoequipoDataTable;
use App\Http\Requests\CreatetipoequipoRequest;
use App\Http\Requests\UpdatetipoequipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\tipoequipo;
use Illuminate\Http\Request;

class tipoequipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Tipoequipos')->only('show');
        $this->middleware('permission:Crear Tipoequipos')->only(['create','store']);
        $this->middleware('permission:Editar Tipoequipos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Tipoequipos')->only('destroy');
    }
    /**
     * Display a listing of the tipoequipo.
     */
    public function index(tipoequipoDataTable $tipoequipoDataTable)
    {
    return $tipoequipoDataTable->render('tipoequipos.index');
    }


    /**
     * Show the form for creating a new tipoequipo.
     */
    public function create()
    {
        return view('tipoequipos.create');
    }

    /**
     * Store a newly created tipoequipo in storage.
     */
    public function store(CreatetipoequipoRequest $request)
    {
        $input = $request->all();

        /** @var tipoequipo $tipoequipo */
        $tipoequipo = tipoequipo::create($input);

        flash()->success('Tipoequipo guardado.');

        return redirect(route('tipoequipos.index'));
    }

    /**
     * Display the specified tipoequipo.
     */
    public function show($id)
    {
        /** @var tipoequipo $tipoequipo */
        $tipoequipo = tipoequipo::find($id);

        if (empty($tipoequipo)) {
            flash()->error('Tipoequipo no encontrado');

            return redirect(route('tipoequipos.index'));
        }

        return view('tipoequipos.show')->with('tipoequipo', $tipoequipo);
    }

    /**
     * Show the form for editing the specified tipoequipo.
     */
    public function edit($id)
    {
        /** @var tipoequipo $tipoequipo */
        $tipoequipo = tipoequipo::find($id);

        if (empty($tipoequipo)) {
            flash()->error('Tipoequipo no encontrado');

            return redirect(route('tipoequipos.index'));
        }

        return view('tipoequipos.edit')->with('tipoequipo', $tipoequipo);
    }

    /**
     * Update the specified tipoequipo in storage.
     */
    public function update($id, UpdatetipoequipoRequest $request)
    {
        /** @var tipoequipo $tipoequipo */
        $tipoequipo = tipoequipo::find($id);

        if (empty($tipoequipo)) {
            flash()->error('Tipoequipo no encontrado');

            return redirect(route('tipoequipos.index'));
        }

        $tipoequipo->fill($request->all());
        $tipoequipo->save();

        flash()->success('Tipoequipo actualizado.');

        return redirect(route('tipoequipos.index'));
    }

    /**
     * Remove the specified tipoequipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var tipoequipo $tipoequipo */
        $tipoequipo = tipoequipo::find($id);

        if (empty($tipoequipo)) {
            flash()->error('Tipoequipo no encontrado');

            return redirect(route('tipoequipos.index'));
        }

        $tipoequipo->delete();

        flash()->success('Tipoequipo eliminado.');

        return redirect(route('tipoequipos.index'));
    }
}
