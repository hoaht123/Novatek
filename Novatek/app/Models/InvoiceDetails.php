<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $fillable = ['product_image','product_name','quantity','subtotal'];
    protected $primaryKey ='invoice_details_id';
    protected $foreignKey = ['invoice_id','product_id'];
    protected $table = 'invoice_details';
}
