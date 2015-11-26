<?php

class SearchUseridProduct implements SearchInterface{
    public static function searchField($field, $value, $products_d = null ){
        if($products_d){
            return $products_d->where($field,'=',"$value");
        }else{
            $products_d =  Product::where($field,'LIKE',"$value");
            return $products_d;
        }
    }
}