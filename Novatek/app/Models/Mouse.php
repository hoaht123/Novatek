<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    use HasFactory;
    protected $fillable = ['mouse_type','mouse_wireless','mouse_dpi'];
    protected $primaryKey = 'id';
    protected $table = 'mouse';
}
