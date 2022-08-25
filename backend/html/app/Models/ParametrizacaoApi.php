<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ParametrizacaoApi
 * @package App\Models
 * @version May 12, 2022, 1:08 pm UTC
 *
 * @property boolean $ativo
 * @property string $nome
 * @property integer $cache_expiracao
 * @property integer $tipo
 * @property string $rotulo
 * @property string $url
 */
class ParametrizacaoApi extends Model
{
    use HasFactory;

    public $table = 'parametrizacao_apis';
    protected $dates = ['deleted_at'];

    public $fillable = [
        'ativo',
        'nome',
        'tipo',
        'cache_expiracao',
        'rotulo',
        'url'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ativo' => 'boolean',
        'nome' => 'string',
        'tipo' => 'integer',
        'cache_expiracao' => 'integer',
        'rotulo' => 'string',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ativo' => 'required|boolean',
        'nome' => 'required|min:5|max:255',
        'tipo' => 'required|integer',
        'cache_expiracao' => 'required|integer',
        'rotulo' => 'required_if:tipo,2|prohibited_if:tipo,1|string|min:10|max:255',
        'url' => 'required|string|min:10|max:255',
        'parametros.nome' => 'required_with:parametros.*|max:255|string',
        'parametros.apelido' => 'required_with:parametros.*|max:255|string'
    ];

    public function parametros()
    {
        return $this->hasMany(ParametrizacaoApiParametros::class, 'parametrizacao_api_id', 'id');
    }
}
