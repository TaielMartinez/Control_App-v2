<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class UsersBusiness extends EloquentModel
{

    public $table = 'users_business';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'users_id',
        'business_id'
    ];

    protected $casts = [
        'users_id' => 'integer',
        'business_id' => 'integer'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function business()
    {
        return $this->hasOne(Business::class);
    }
}
