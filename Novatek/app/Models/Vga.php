<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vga extends Model
{
    use HasFactory;
    protected $fillable = ['gpu_memory','Output_Ports','gpu_type','gpu_speed'];
    protected $primaryKey = 'id';
    protected $table = 'gpu';
}
