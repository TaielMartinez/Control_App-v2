<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Clients extends EloquentModel
{
    use SoftDeletes;

    public $table = 'clients';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'token',
        'name',
        'description',
        'password',
        'clients_config_id'
    ];

    protected $casts = [
        'token' => 'string',
        'name' => 'string',
        'description' => 'longText',
        'password' => 'string',
        'clients_config_id' => 'integer'
    ];

    public function business()
    {
        return $this->belongsTo(ClientsBusiness::class, 'id', 'clients_id');
    }
}
