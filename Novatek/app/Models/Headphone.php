<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headphone extends Model
{
    use HasFactory;
    protected $fillable = ['headphone_type','headphone_wireless','headphone_micro'];
    protected $primaryKey = 'id';
    protected $table = 'headphone';
}
