<?php

namespace App\Repositories;

use App\Models\Idea;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class IdeaRepository
 * @package App\Repositories
 * @version April 15, 2018, 4:36 am UTC
 *
 * @method Idea findWithoutFail($id, $columns = ['*'])
 * @method Idea find($id, $columns = ['*'])
 * @method Idea first($columns = ['*'])
*/
class IdeaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'platform',
        'title'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Idea::class;
    }
}
