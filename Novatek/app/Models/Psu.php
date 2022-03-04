<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psu extends Model
{
    use HasFactory;
    protected $fillable = ['psu_power','psu_efficiency','psu_type'];
    protected $primaryKey = 'id';
    protected $table = 'psu';
}
