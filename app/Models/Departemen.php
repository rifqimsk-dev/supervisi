<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'mst_departemen';
    protected $fillable = ['name'];

    public $timestamps = false;
}
