<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class ClientsConfig extends EloquentModel
{
    public $table = 'clients_config';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'connect_interval',
        'screenshot',
        'monitor'
    ];

    protected $casts = [
        'connect_interval' => 'integer',
        'screenshot' => 'integer',
        'monitor' => 'integer'
    ];
}
