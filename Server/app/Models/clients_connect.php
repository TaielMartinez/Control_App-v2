<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class ClientsConnect extends EloquentModel
{
    use SoftDeletes;

    public $table = 'clients_connect';

    protected $fillable = [
        'uuid'
    ];

    protected $casts = [
        'uuid' => 'string'
    ];

    public function client()
    {
        return $this->hasOne(Client::class, 'uuid', 'token');
    }
}
