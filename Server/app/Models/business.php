<?php

namespace App\Models;

use ClientsBusiness;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Business extends EloquentModel
{
    use SoftDeletes;

    public $table = 'business';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'token',
        'name',
        'email'
    ];

    protected $casts = [
        'token' => 'string',
        'name' => 'string',
        'email' => 'string'
    ];

    public function clients()
    {
        return $this->belongsTo(ClientsBusiness::class, 'id', 'business_id');
    }
}
