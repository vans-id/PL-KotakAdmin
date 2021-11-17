<?php

namespace App\Models;

use App\Models\Admin\Kosntrak;
use App\Models\Admin\Transaction;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kosntraks()
    {
        return $this->hasMany(
            Kosntrak::class,
            'owner_id',
            'id'
        );
    }

    public function transactions()
    {
        return $this->hasMany(
            Transaction::class
        );
    }
}
