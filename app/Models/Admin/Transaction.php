<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Kosntrak;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'kosntrak_id',
        'user_id',
        'start_date',
        'end_date'
    ];

    public function kosntrak()
    {
        return $this->belongsTo(
            Kosntrak::class
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }
}
