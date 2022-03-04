<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;
    protected $fillable = ['storage_type','storage_capacity','storage_speed','storage_size'];
    protected $primaryKey = 'id';
    protected $table = 'storage';
}
