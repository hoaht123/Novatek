<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','product_id','comment','rating'];
    protected $primaryKey = 'review_id';
    protected $table = 'review';

    public function user(){
        return $this->belongsTo(Users::class, 'user_id');
    }
}
