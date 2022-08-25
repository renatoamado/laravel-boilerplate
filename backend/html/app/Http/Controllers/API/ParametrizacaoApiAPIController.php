<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParametrizacaoApiAPIRequest;
use App\Http\Requests\API\UpdateParametrizacaoApiAPIRequest;
use App\Models\ParametrizacaoApi;
use App\Models\ParametrizacaoApiParametros;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParametrizacaoApiController
 * @package App\Http\Controllers\API
 */

class ParametrizacaoApiAPIController extends AppBaseController
{
    /**
     * Display a listing of the ParametrizacaoApi.
     * GET|HEAD /parametrizacaoApis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ParametrizacaoApi::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $parametrizacaoApis = $query->with('parametros')->get();

        return $this->sendResponse($parametrizacaoApis->toArray(), 'Parametrizacao Apis retrieved successfully');
    }

    /**
     * Store a newly created ParametrizacaoApi in storage.
     * POST /parametrizacaoApis
     *
     * @param CreateParametrizacaoApiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParametrizacaoApiAPIRequest $request)
    {
        $input = $request->all();
        /** @var ParametrizacaoApi $parametrizacaoApi */
        $parametrizacaoApi = ParametrizacaoApi::create($input);
        $this->storeChildren($parametrizacaoApi, $input);

        return $this->sendResponse($parametrizacaoApi->toArray(), 'Parametrizacao Api saved successfully');
    }

    private function storeChildren($parametrizacaoApi, $input)
    {
        ParametrizacaoApiParametros::where('parametrizacao_api_id', $parametrizacaoApi->id)->delete();

        foreach ($input['parametros'] as $valor) {
            $parametros = new ParametrizacaoApiParametros([
                'nome'                  => $valor['nome'],
                'apelido'               => $valor['apelido'],
                'parametrizacao_api_id' => $parametrizacaoApi->id
            ]);

            $parametrizacaoApi->parametros()->save($parametros);
        }
    }

    /**
     * Display the specified ParametrizacaoApi.
     * GET|HEAD /parametrizacaoApis/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
       
        /** @var ParametrizacaoApi $parametrizacaoApi */
        $parametrizacaoApi = ParametrizacaoApi::with('parametros')->find($id);

        if (empty($parametrizacaoApi)) {
            return $this->sendError('Parametrizacao Api not found');
        }

        return $this->sendResponse($parametrizacaoApi->toArray(), 'Parametrizacao Api retrieved successfully');
    }

    /**
     * Update the specified ParametrizacaoApi in storage.
     * PUT/PATCH /parametrizacaoApis/{id}
     *
     * @param int $id
     * @param UpdateParametrizacaoApiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParametrizacaoApiAPIRequest $request)
    {
        /** @var ParametrizacaoApi $parametrizacaoApi */
        $parametrizacaoApi = ParametrizacaoApi::find($id);
        $input = $request->all();

        if (empty($parametrizacaoApi)) {
            return $this->sendError('Parametrizacao Api not found');
        }

        $parametrizacaoApi->fill($input);
        $parametrizacaoApi->save();

        $this->storeChildren($parametrizacaoApi, $input);

        return $this->sendResponse($parametrizacaoApi->toArray(), 'ParametrizacaoApi updated successfully');
    }

    /**
     * Remove the specified ParametrizacaoApi from storage.
     * DELETE /parametrizacaoApis/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ParametrizacaoApi $parametrizacaoApi */
        $parametrizacaoApi = ParametrizacaoApi::find($id);

        if (empty($parametrizacaoApi)) {
            return $this->sendError('Parametrizacao Api not found');
        }

        $parametrizacaoApi->delete();
        ParametrizacaoApiParametros::where('parametrizacao_api_id', $parametrizacaoApi->id)->delete();

        return $this->sendSuccess('Parametrizacao Api deleted successfully');
    }
}
