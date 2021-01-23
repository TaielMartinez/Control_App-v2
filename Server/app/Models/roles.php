<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Roles extends EloquentModel
{
    use SoftDeletes;

    public $table = 'roles';

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'string'
    ];
}
