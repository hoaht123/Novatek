<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    use HasFactory;
    protected $fillable = ['cpu_speed','cpu_core','cpu_socket','cpu_thread','cpu_cache'];
    protected $primaryKey = 'id';
    protected $table = 'cpu';
}
