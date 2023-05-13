<?php

namespace App\Http\Controllers;

use App\DataTables\equipoDataTable;
use App\Http\Requests\CreateequipoRequest;
use App\Http\Requests\UpdateequipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\equipo;
use Illuminate\Http\Request;

class equipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Equipos')->only('show');
        $this->middleware('permission:Crear Equipos')->only(['create','store']);
        $this->middleware('permission:Editar Equipos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Equipos')->only('destroy');
    }
    /**
     * Display a listing of the equipo.
     */
    public function index(equipoDataTable $equipoDataTable)
    {
    return $equipoDataTable->render('equipos.index');
    }


    /**
     * Show the form for creating a new equipo.
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created equipo in storage.
     */
    public function store(CreateequipoRequest $request)
    {
        $input = $request->all();

        /** @var equipo $equipo */
        $equipo = equipo::create($input);

        flash()->success('Equipo guardado.');

        return redirect(route('equipos.index'));
    }

    /**
     * Display the specified equipo.
     */
    public function show($id)
    {
        /** @var equipo $equipo */
        $equipo = equipo::find($id);

        if (empty($equipo)) {
            flash()->error('Equipo no encontrado');

            return redirect(route('equipos.index'));
        }

        return view('equipos.show')->with('equipo', $equipo);
    }

    /**
     * Show the form for editing the specified equipo.
     */
    public function edit($id)
    {
        /** @var equipo $equipo */
        $equipo = equipo::find($id);

        if (empty($equipo)) {
            flash()->error('Equipo no encontrado');

            return redirect(route('equipos.index'));
        }

        return view('equipos.edit')->with('equipo', $equipo);
    }

    /**
     * Update the specified equipo in storage.
     */
    public function update($id, UpdateequipoRequest $request)
    {
        /** @var equipo $equipo */
        $equipo = equipo::find($id);

        if (empty($equipo)) {
            flash()->error('Equipo no encontrado');

            return redirect(route('equipos.index'));
        }

        $equipo->fill($request->all());
        $equipo->save();

        flash()->success('Equipo actualizado.');

        return redirect(route('equipos.index'));
    }

    /**
     * Remove the specified equipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var equipo $equipo */
        $equipo = equipo::find($id);

        if (empty($equipo)) {
            flash()->error('Equipo no encontrado');

            return redirect(route('equipos.index'));
        }

        $equipo->delete();

        flash()->success('Equipo eliminado.');

        return redirect(route('equipos.index'));
    }
}
