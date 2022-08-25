<?php

namespace App\Repositories;

use App\Models\Teste;
use App\Repositories\BaseRepository;

/**
 * Class TesteRepository
 * @package App\Repositories
 * @version May 4, 2022, 7:09 pm UTC
*/

class TesteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firstname',
        'lastname',
        'email',
        'age',
        'gender'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Teste::class;
    }
}
