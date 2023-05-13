<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateclientesAPIRequest;
use App\Http\Requests\API\UpdateclientesAPIRequest;
use App\Models\clientes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class clientesAPIController
 */
class clientesAPIController extends AppBaseController
{
    /**
     * Display a listing of the clientes.
     * GET|HEAD /clientes
     */
    public function index(Request $request): JsonResponse
    {
        $query = clientes::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $clientes = $query->get();

        return $this->sendResponse($clientes->toArray(), 'Clientes ');
    }

    /**
     * Store a newly created clientes in storage.
     * POST /clientes
     */
    public function store(CreateclientesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var clientes $clientes */
        $clientes = clientes::create($input);

        return $this->sendResponse($clientes->toArray(), 'Clientes guardado');
    }

    /**
     * Display the specified clientes.
     * GET|HEAD /clientes/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var clientes $clientes */
        $clientes = clientes::find($id);

        if (empty($clientes)) {
            return $this->sendError('Clientes no encontrado');
        }

        return $this->sendResponse($clientes->toArray(), 'Clientes ');
    }

    /**
     * Update the specified clientes in storage.
     * PUT/PATCH /clientes/{id}
     */
    public function update($id, UpdateclientesAPIRequest $request): JsonResponse
    {
        /** @var clientes $clientes */
        $clientes = clientes::find($id);

        if (empty($clientes)) {
            return $this->sendError('Clientes no encontrado');
        }

        $clientes->fill($request->all());
        $clientes->save();

        return $this->sendResponse($clientes->toArray(), 'clientes actualizado');
    }

    /**
     * Remove the specified clientes from storage.
     * DELETE /clientes/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var clientes $clientes */
        $clientes = clientes::find($id);

        if (empty($clientes)) {
            return $this->sendError('Clientes no encontrado');
        }

        $clientes->delete();

        return $this->sendSuccess('Clientes eliminado');
    }
}
