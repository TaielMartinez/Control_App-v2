<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class ClientsConnect extends EloquentModel
{

    public $table = 'clients_connect';

    protected $fillable = [
        'client_token'
    ];

    protected $casts = [
        'client_token' => 'string'
    ];

    public function client()
    {
        return $this->hasOne(Client::class, 'client_token', 'token');
    }
}
