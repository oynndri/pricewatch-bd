<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'role', 'contributions', 'avatar', 'join_date',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'join_date' => 'date',
        'contributions' => 'integer',
    ];

    // Use camelCase keys in JSON for frontend compatibility
    public function toArray()
    {
        $array = parent::toArray();
        return [
            'id' => $array['id'] ?? null,
            'name' => $array['name'] ?? null,
            'email' => $array['email'] ?? null,
            'role' => $array['role'] ?? 'user',
            'contributions' => $array['contributions'] ?? 0,
            'avatar' => $array['avatar'] ?? null,
            'joinDate' => $array['join_date'] ?? null,
        ];
    }
}
