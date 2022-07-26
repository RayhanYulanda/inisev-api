<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\BaseRepository;

/**
 * Class PostRepository
 * @package App\Repositories
 * @version July 26, 2022, 9:09 pm WIB
*/

class PostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'website_id',
        'title',
        'description',
        'content',
        'slug'
    ];
    protected $selectColumns = [
        '*',
    ];
    protected $paginate = 10;

    /**
     * Return searchable fields filled search query
     *
     * @return array
     */
    public function search($request)
    {
        return $request->search ? array_fill_keys($this->getFieldsSearchable(), $request->search) : [];
    }

    /**
     * Return searchable fields filled search query
     *
     * @return LengthAwarePaginator
     */
    public function getPaginate($search, $columns = null)
    {
        $columns = !empty($columns) ? $columns : $this->selectColumns;
        return $this->allQuery($this->search($search), true)->paginate($this->paginate, $columns);
    }

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
        return Post::class;
    }
}
