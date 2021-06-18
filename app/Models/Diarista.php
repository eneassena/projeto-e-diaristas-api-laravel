<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diarista extends Model
{
    use HasFactory;

    /**
     * defini os campos que serão guardados
     * @var string[]
     */
    protected $fillable = ['nome_completo', 'cpf', 'email', 'telefone', 'logradouro',
        'numero', 'complemento', 'cep', 'bairro', 'cidade',
        'estado', 'codigo_ibge', 'foto_usuario'];


    /**
     * defini os campos que podem ser exibidos
     * @var string[]
     */
    protected $visible = [ 'nome_completo', 'cidade', 'foto_usuario' , 'reputacao' ];

    /**
     * adiciona campo virtual de reputação
     * @var string[]
     */
    protected $appends = ['reputacao'];

    /**
     * Gera a url da image
     * @param string $valor
     * @return string]
     */
    public function getFotoUsuarioAttribute(string $valor)
    {
        return config('app.url') . '/'. $valor;
    }



    /**
     * Retorna a reputação randomica
     * @param string $valor
     * @return string
     */
    public function getReputacaoAttribute($valor)
    {
        return mt_rand(1, 5);
    }




    /**
     * busca diarias por codigo ibge
     * @param int $codigoIbge
     * @return mixed
     */
    public static function buscaPorCodigoIbge(int $codigoIbge)
    {
        return self::where('codigo_ibge', $codigoIbge)->limit(6)->get();
    }



    /**
     * retorna a quantidade de diaristas
     * @param int $codigoibge
     * @return int
     */
    public static function quantidadePorCodigoIbge(int $codigoibge)
    {

        $quantidade = self::where('codigo_ibge', $codigoibge)->count();

        return ($quantidade > 6) ? $quantidade - 6 : 0;

    }
}
