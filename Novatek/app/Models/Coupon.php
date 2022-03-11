<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['voucher_name','voucher_code','voucher_quantity','voucher_options','voucher_value'];
    protected $primaryKey = 'voucher_id';
    protected $table = 'vouchers';
}
