<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Sewa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kosntrak extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis',
        'nama_tempat',
        'alamat',
        'maps',
        'keterangan',
        'harga_sewa',
        'gambar',
        'status_kamar',
        'status_kamarmandi',
        'wifi',
        'laundry',
        'warung_makan',
        'peraturan',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    public function sewa()
    {
        return $this->hasMany(
            Sewa::class,
            'kosntrak_id',
            'id'
        );
    }
}
