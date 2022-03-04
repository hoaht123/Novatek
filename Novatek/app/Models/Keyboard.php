<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    use HasFactory;
    protected $fillable = ['keyboard_qty','keyboard_wireless','keyboard_color','keyboard_switch'];
    protected $primaryKey = 'id';
    protected $table = 'keyboard';
}
