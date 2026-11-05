<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'c_id';

    protected $fillable = [
        'category_name',
        'status'
    ];
}
