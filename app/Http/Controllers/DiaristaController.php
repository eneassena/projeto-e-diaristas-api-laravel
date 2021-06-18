<?php

namespace App\Http\Controllers;


use App\Http\Requests\DiaristaRequest;
use App\Models\Diarista;
use App\Services\ViaCep;

class DiaristaController extends Controller
{

    public function __construct(
        protected ViaCep $viaCep
    )
    {

    }

    /**
     * Metodo renderiza a view index
     * @return string
     */
    public function index()
    {
        $diarista = Diarista::all();

        return view('index', [
            'diaristas' => $diarista
        ]);

    }

    /**
     * Exibe o formulario de criação de diarista
     * @return string
     *
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Salva a nova diarista
     * @param DiaristaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DiaristaRequest $request)
    {
        // apos terminar a aula fazer a validação do cep caso não exista

        $dados = $request->except('_token');
        $dados['foto_usuario'] = $request->foto_usuario->store('public');


        $dados = $this->limpamask($dados);

        Diarista::create($dados);


        return redirect()->route('diaristas.index');
    }

    /**
     * metodo criado para automatizar codigo repetitivo
     * @param $data
     * @return mixed
     */
    public function limpamask($data)
    {
        $dados = $data;
        $dados['cpf'] = str_replace(['.', '-'], '', $dados['cpf']);
        $dados['cep'] = str_replace('-', '', $dados['cep']);
        $dados['telefone'] = str_replace(['(', ')', '-'], '', $dados['telefone']);
        $dados['codigo_ibge'] = $this->viaCep->buscar($dados['cep'])['ibge'];
        return $dados;
    }

    /**
     * metodo busca a diarista pelo id e retorna seus dados
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $diarista = Diarista::findOrFail($id);
        return view('edit', [
            'diarista' => $diarista
        ]);
    }

    /**
     * metodo atualiza os dados da diarista
     *
     * @param int $id
     * @param DiaristaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $id, DiaristaRequest $request)
    {
        $diarista = Diarista::findOrFail($id);


        $dados = $request->except('_token', '_method');

        $dados = $this->limpamask($dados);

        if($request->hasFile('foto_usuario')) {
            $dados['foto_usuario'] = $request->foto_usuario->store('public');
        } else {
            $dados['foto_usuario']= '/null/';
        }



        $diarista->update($dados);

        return redirect()->route('diaristas.index');
    }

    /**
     * metodo apaga os dados da diarista
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $diarista = Diarista::findOrFail($id);
        $diarista->delete();

        return redirect()->route('diaristas.index');
    }
}
