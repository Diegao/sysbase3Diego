<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateequipoAPIRequest;
use App\Http\Requests\API\UpdateequipoAPIRequest;
use App\Models\equipo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class equipoAPIController
 */
class equipoAPIController extends AppBaseController
{
    /**
     * Display a listing of the equipos.
     * GET|HEAD /equipos
     */
    public function index(Request $request): JsonResponse
    {
        $query = equipo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $equipos = $query->get();

        return $this->sendResponse($equipos->toArray(), 'Equipos ');
    }

    /**
     * Store a newly created equipo in storage.
     * POST /equipos
     */
    public function store(CreateequipoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var equipo $equipo */
        $equipo = equipo::create($input);

        return $this->sendResponse($equipo->toArray(), 'Equipo guardado');
    }

    /**
     * Display the specified equipo.
     * GET|HEAD /equipos/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var equipo $equipo */
        $equipo = equipo::find($id);

        if (empty($equipo)) {
            return $this->sendError('Equipo no encontrado');
        }

        return $this->sendResponse($equipo->toArray(), 'Equipo ');
    }

    /**
     * Update the specified equipo in storage.
     * PUT/PATCH /equipos/{id}
     */
    public function update($id, UpdateequipoAPIRequest $request): JsonResponse
    {
        /** @var equipo $equipo */
        $equipo = equipo::find($id);

        if (empty($equipo)) {
            return $this->sendError('Equipo no encontrado');
        }

        $equipo->fill($request->all());
        $equipo->save();

        return $this->sendResponse($equipo->toArray(), 'equipo actualizado');
    }

    /**
     * Remove the specified equipo from storage.
     * DELETE /equipos/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var equipo $equipo */
        $equipo = equipo::find($id);

        if (empty($equipo)) {
            return $this->sendError('Equipo no encontrado');
        }

        $equipo->delete();

        return $this->sendSuccess('Equipo eliminado');
    }
}
