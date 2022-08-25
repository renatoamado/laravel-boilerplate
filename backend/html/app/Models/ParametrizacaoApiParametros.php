<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class parametrizacao_api_parametros
 * @package App\Models
 * @version May 12, 2022, 1:25 pm UTC
 *
 * @property string $nome
 * @property string $apelido
 * @property integer $ParametrizacaoApi_id
 */
class ParametrizacaoApiParametros extends Model
{
    use HasFactory;

    public $table = 'parametrizacao_api_parametros';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome',
        'apelido',
        'parametrizacao_api_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'apelido' => 'string',
        'parametrizacao_api_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'apelido' => 'required',
        'parametrizacao_api_id' => 'required'
    ];

    public function parametrizacao()
    {
        return $this->belongsToMany(ParametrizacaoApi::class, 'parametrizacao_api_id', 'id');
    }
}
