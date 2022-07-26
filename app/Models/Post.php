<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Post
 * @package App\Models
 * @version July 26, 2022, 9:09 pm WIB
 *
 * @property integer $website_id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $slug
 */
class Post extends Model
{
    use HasFactory;

    public $table = 'posts';

    public $fillable = [
        'website_id',
        'title',
        'description',
        'content',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'website_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
    ];


}
