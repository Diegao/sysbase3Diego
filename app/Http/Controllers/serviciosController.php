<?php

namespace App\Http\Controllers;

use App\DataTables\serviciosDataTable;
use App\Http\Requests\CreateserviciosRequest;
use App\Http\Requests\UpdateserviciosRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\servicios;
use Illuminate\Http\Request;

class serviciosController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Servicios')->only('show');
        $this->middleware('permission:Crear Servicios')->only(['create','store']);
        $this->middleware('permission:Editar Servicios')->only(['edit','update']);
        $this->middleware('permission:Eliminar Servicios')->only('destroy');
    }
    /**
     * Display a listing of the servicios.
     */
    public function index(serviciosDataTable $serviciosDataTable)
    {
    return $serviciosDataTable->render('servicios.index');
    }


    /**
     * Show the form for creating a new servicios.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created servicios in storage.
     */
    public function store(CreateserviciosRequest $request)
    {
        $input = $request->all();

        /** @var servicios $servicios */
        $servicios = servicios::create($input);

        flash()->success('Servicios guardado.');

        return redirect(route('servicios.index'));
    }

    /**
     * Display the specified servicios.
     */
    public function show($id)
    {
        /** @var servicios $servicios */
        $servicios = servicios::find($id);

        if (empty($servicios)) {
            flash()->error('Servicios no encontrado');

            return redirect(route('servicios.index'));
        }

        return view('servicios.show')->with('servicios', $servicios);
    }

    /**
     * Show the form for editing the specified servicios.
     */
    public function edit($id)
    {
        /** @var servicios $servicios */
        $servicios = servicios::find($id);

        if (empty($servicios)) {
            flash()->error('Servicios no encontrado');

            return redirect(route('servicios.index'));
        }

        return view('servicios.edit')->with('servicios', $servicios);
    }



    /**
     * Update the specified servicios in storage.
     */
    public function update($id, UpdateserviciosRequest $request)
    {
        /** @var servicios $servicios */
        $servicios = servicios::find($id);

        if (empty($servicios)) {
            flash()->error('Servicios no encontrado');

            return redirect(route('servicios.index'));
        }

        $servicios->fill($request->all());
        $servicios->save();

        flash()->success('Servicios actualizado.');

        return redirect(route('servicios.index'));
    }



    /**
     * Remove the specified servicios from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var servicios $servicios */
        $servicios = servicios::find($id);

        if (empty($servicios)) {
            flash()->error('Servicios no encontrado');

            return redirect(route('servicios.index'));
        }

        $servicios->delete();

        flash()->success('Servicios eliminado.');

        return redirect(route('servicios.index'));
    }
}
