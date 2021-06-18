<?php

namespace App\Http\Controllers;

use App\Models\Diarista;
use App\Services\ViaCep;
use Illuminate\Http\Request;

class BuscaDiaristaCep extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, ViaCep $viacep)
    {
        $endereco = $viacep->buscar($request->cep);

        if($endereco) {

            return [
                'diaristas' => Diarista::buscaPorCodigoIbge( $endereco['ibge'] ),
                'quantidade_diaristas' => Diarista::quantidadePorCodigoIbge( (int)$endereco['ibge'] )
                ];

        } else {

            return response()->json(['erro' => 'cep invalido'], 400);

        }



    }
}
