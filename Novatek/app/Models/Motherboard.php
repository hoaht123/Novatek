<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    use HasFactory;
    protected $fillable = ['Size','Socket','Memory'];
    protected $primaryKey = 'id';
    protected $table = 'motherboard';
}
