<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $timestamp = true;
    protected $fillable = ['product_name','product_price',
    'product_sku','product_slug','product_sort_description',
    'product_description','product_image','product_status','product_isHot','product_isNew','product_inStock',
    'component'];
    protected $foreignKey = ['category_id','brand_id','supplier_id','spec_ram','spec_cpu','spec_keyboard','spec_vga','spec_psu','spec_storage','spec_motherboard','spec_headphone','spec_mouse'];
    protected $primaryKey = 'product_id';
    protected $table = 'product';

    public function brands(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function suppliers(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    public function ram(){
        return $this->belongsTo(Ram::class,'spec_ram');
    }

    public function cpu(){
        return $this->belongsTo(Cpu::class,'spec_cpu');
    }

    public function keyboard(){
        return $this->belongsTo(Keyboard::class,'spec_keyboard');
    }

    public function vga(){
        return $this->belongsTo(Vga::class,'spec_vga');
    }
    
    public function psu(){
        return $this->belongsTo(Psu::class,'spec_psu');
    }

    public function storage(){
        return $this->belongsTo(Storage::class,'spec_storage');
    }

    public function motherboard(){
        return $this->belongsTo(Motherboard::class,'spec_motherboard');
    }

    public function headphone(){
        return $this->belongsTo(Headphone::class,'spec_headphone');
    }

    
}



