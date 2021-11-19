<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Kosntrak;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'kosntrak_id',
        'user_id',
        'tanggal',
        'status_sewa',
        'status_bayar'
    ];

    public function kosntrak()
    {
        return $this->belongsTo(
            Kosntrak::class,
            'kosntrak_id',
            'id'
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }
}
