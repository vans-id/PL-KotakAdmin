<?php

namespace App\Models;

use App\Models\Admin\Kosntrak;
use App\Models\Admin\Sewa;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'no_hp',
        'rekening',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kosntrak()
    {
        return $this->hasMany(
            Kosntrak::class,
            'user_id',
            'id'
        );
    }

    public function sewa()
    {
        return $this->hasMany(
            Sewa::class,
            'user_id',
            'id'
        );
    }
}
