@php
    $in_wish_list = App\Models\Wishlist::where('product_id',$product->product_id)->where('user_id',Session::get('user_id'))->first();
    if(!empty($in_wish_list)){
        echo '<i class="fa fa-heart wish-list-'.$product->product_id.'" style="color:red" aria-hidden="true"></i>';
    }else{
        echo '<i class="fa fa-heart-o wish-list-'.$product->product_id.'" style="color:black" aria-hidden="true"></i>';
    }
@endphp