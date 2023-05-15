<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateserviciosAPIRequest;
use App\Http\Requests\API\UpdateserviciosAPIRequest;
use App\Models\servicios;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class serviciosAPIController
 */
class serviciosAPIController extends AppBaseController
{
    /**
     * Display a listing of the servicios.
     * GET|HEAD /servicios
     */
    public function index(Request $request): JsonResponse
    {
        $query = servicios::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $servicios = $query->get();

        return $this->sendResponse($servicios->toArray(), 'Servicios ');
    }

    /**
     * Store a newly created servicios in storage.
     * POST /servicios
     */
    public function store(CreateserviciosAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var servicios $servicios */
        $servicios = servicios::create($input);

        return $this->sendResponse($servicios->toArray(), 'Servicios guardado');
    }

    /**
     * Display the specified servicios.
     * GET|HEAD /servicios/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var servicios $servicios */
        $servicios = servicios::find($id);

        if (empty($servicios)) {
            return $this->sendError('Servicios no encontrado');
        }

        return $this->sendResponse($servicios->toArray(), 'Servicios ');
    }

    /**
     * Update the specified servicios in storage.
     * PUT/PATCH /servicios/{id}
     */
    public function update($id, UpdateserviciosAPIRequest $request): JsonResponse
    {
        /** @var servicios $servicios */
        $servicios = servicios::find($id);

        if (empty($servicios)) {
            return $this->sendError('Servicios no encontrado');
        }

        $servicios->fill($request->all());
        $servicios->save();

        return $this->sendResponse($servicios->toArray(), 'servicios actualizado');
    }

    /**
     * Remove the specified servicios from storage.
     * DELETE /servicios/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var servicios $servicios */
        $servicios = servicios::find($id);

        if (empty($servicios)) {
            return $this->sendError('Servicios no encontrado');
        }

        $servicios->delete();

        return $this->sendSuccess('Servicios eliminado');
    }
}
