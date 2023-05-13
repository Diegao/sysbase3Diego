<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetipoequipoAPIRequest;
use App\Http\Requests\API\UpdatetipoequipoAPIRequest;
use App\Models\tipoequipo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class tipoequipoAPIController
 */
class tipoequipoAPIController extends AppBaseController
{
    /**
     * Display a listing of the tipoequipos.
     * GET|HEAD /tipoequipos
     */
    public function index(Request $request): JsonResponse
    {
        $query = tipoequipo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $tipoequipos = $query->get();

        return $this->sendResponse($tipoequipos->toArray(), 'Tipoequipos ');
    }

    /**
     * Store a newly created tipoequipo in storage.
     * POST /tipoequipos
     */
    public function store(CreatetipoequipoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var tipoequipo $tipoequipo */
        $tipoequipo = tipoequipo::create($input);

        return $this->sendResponse($tipoequipo->toArray(), 'Tipoequipo guardado');
    }

    /**
     * Display the specified tipoequipo.
     * GET|HEAD /tipoequipos/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var tipoequipo $tipoequipo */
        $tipoequipo = tipoequipo::find($id);

        if (empty($tipoequipo)) {
            return $this->sendError('Tipoequipo no encontrado');
        }

        return $this->sendResponse($tipoequipo->toArray(), 'Tipoequipo ');
    }

    /**
     * Update the specified tipoequipo in storage.
     * PUT/PATCH /tipoequipos/{id}
     */
    public function update($id, UpdatetipoequipoAPIRequest $request): JsonResponse
    {
        /** @var tipoequipo $tipoequipo */
        $tipoequipo = tipoequipo::find($id);

        if (empty($tipoequipo)) {
            return $this->sendError('Tipoequipo no encontrado');
        }

        $tipoequipo->fill($request->all());
        $tipoequipo->save();

        return $this->sendResponse($tipoequipo->toArray(), 'tipoequipo actualizado');
    }

    /**
     * Remove the specified tipoequipo from storage.
     * DELETE /tipoequipos/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var tipoequipo $tipoequipo */
        $tipoequipo = tipoequipo::find($id);

        if (empty($tipoequipo)) {
            return $this->sendError('Tipoequipo no encontrado');
        }

        $tipoequipo->delete();

        return $this->sendSuccess('Tipoequipo eliminado');
    }
}
