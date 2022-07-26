<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserSubscribeWebsite extends Pivot
{
    protected $table = 'user_subscribe_website';

    protected $fillable = [
        'user_id', 'website_id'
    ];
}
