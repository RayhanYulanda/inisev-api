<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Website
 * @package App\Models
 * @version July 26, 2022, 9:01 pm WIB
 *
 * @property string $name
 * @property string $domain
 */
class Website extends Model
{
    use HasFactory;
    public $table = 'websites';

    public $fillable = [
        'name',
        'domain'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'domain' => 'string'
    ];

    public static $rules = [
        'domain'=>'unique'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'website_id');
    }

    public function subscriber()
    {
        return $this->belongsToMany(User::class, 'user_subscribe_website', 'website_id', 'user_id');
    }

}
