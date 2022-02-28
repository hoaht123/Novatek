<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_code','quantity','total'];
    protected $primaryKey = 'invoice_id';
    protected $foreignKey = ['user_id','shipping_id'];
    protected $table = 'invoices';

    public function user(){
        return $this->belongsTo(Users::class,'user_id');
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
}
