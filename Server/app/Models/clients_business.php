<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class ClientsBusiness extends EloquentModel
{

    public $table = 'clients_business';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'business_id',
        'clients_id'
    ];

    protected $casts = [
        'business_id' => 'string',
        'clients_id' => 'string'
    ];

    public function client()
    {
        return $this->hasOne(Clients::class);
    }

    public function business()
    {
        return $this->hasOne(Business::class);
    }
}
