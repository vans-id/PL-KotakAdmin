<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kosntrak extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'type',
        'name',
        'address',
        'maps',
        'description',
        'price',
        'image',
        'bedroom',
        'bathroom'
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
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
