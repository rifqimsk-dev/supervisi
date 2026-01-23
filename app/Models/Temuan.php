<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temuan extends Model
{
    use HasFactory;
    
    protected $table = 'temuan';
    protected $fillable = [
        'kunjungan_id',
        'user_id',
        'people',
        'premises',
        'process',
        'file_people',
        'file_premises',
        'file_process',
        'catatan_temuan'
    ];
}
