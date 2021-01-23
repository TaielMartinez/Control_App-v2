<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class UsersRoles extends EloquentModel
{
    use SoftDeletes;

    public $table = 'users_roles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'users_id',
        'rol_id'
    ];

    protected $casts = [
        'users_id' => 'integer',
        'rol_id' => 'integer'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function rol()
    {
        return $this->hasOne(Roles::class, 'rol_id');
    }
}
