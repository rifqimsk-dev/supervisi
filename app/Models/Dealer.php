<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;

    protected $table = 'mst_dealer';
    protected $fillable = ['dealer_code','dealer_name'];
    public $timestamps = false;
}
