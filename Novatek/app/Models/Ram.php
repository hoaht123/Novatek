<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ram extends Model
{
    use HasFactory;
    protected $fillable = ['memory_size','ram_type','ram_bandwidth','ram_speed'];
    protected $primaryKey = 'id';
    protected $table = 'ram';
}
