<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungan';
    protected $fillable = [
        'user_id',
        'tanggal',
        'departemen_id',
        'dealer_id',
        'tujuan',
        'alamat',
        'latitude',
        'longitude',
        'inventaris_id',
        'status',
        'catatan_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dealer()
    {
        return $this->belongsTo(Dealer::class);
    }

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class);
    }
}
