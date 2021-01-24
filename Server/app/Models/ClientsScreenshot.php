<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class ClientsScreenshot extends EloquentModel
{

    public $table = 'clients_screenshot';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'clients_token',
        'img_url',
        'error',
        'monitor'
    ];

    protected $casts = [
        'clients_token' => 'string',
        'img_url' => 'string',
        'error' => 'string',
        'monitor' => 'integer'
    ];

    public function client()
    {
        return $this->hasOne(Clients::class, 'clients_token', 'token');
    }
}
