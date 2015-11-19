<?php

class FEExchangesHelper{
    public static function isProductSelected(){
        if(Session::has('r_product_id')){
            if(Product::find(Session::get('r_product_id'))){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public static function selectProduct($product_id){
        Session::put('r_product_id',$product_id);
    }
}