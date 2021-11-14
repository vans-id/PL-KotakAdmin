<?php

namespace App\Models\Admin;

use App\Models\Admin\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kosntrak extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function Transactions()
    {
        return $this->hasMany(
            Transaction::class
        );
    }
}
