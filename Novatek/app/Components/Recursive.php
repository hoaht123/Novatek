<?php
namespace App\Components;

use App\Models\Category;


class Recursive{
    private $htmlSelect = '';
    private $data;
    function __construct($data) {
        $this->data = $data;
    }

    public function categoryRecursive($parent_id,$id = 0,$text = ''){
        foreach ($this->data as $value) 
        {
            if($value['parent_id'] ==$id){
                if(!empty($parent_id) && $parent_id == $value['category_id']) {
                    $this->htmlSelect .= "<option selected value='".$value['category_id']."'>".$text.$value['category_name']."</option>";
                } else{
                    $this->htmlSelect .= "<option value='".$value['category_id']."'>".$text.$value['category_name']."</option>";
                }
                $this->categoryRecursive($parent_id,$value['category_id'], $text.'&nbsp;&nbsp;&nbsp;&nbsp;');
            }
        }
        return $this->htmlSelect;
    }

    public function getCategoryParent($parent_id){
        $category = Category::where('category_id',$parent_id)->first();
            if($category->parent_id==0){
                $component=$category->category_name;
                return $component;
            }else{
                $component = $this->getCategoryParent($category->parent_id);
            }
        }
}