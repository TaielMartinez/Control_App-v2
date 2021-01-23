<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Business extends EloquentModel
{
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
