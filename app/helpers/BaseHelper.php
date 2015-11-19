<?php
define("ITEM_PER_PAGE", 6) ;
define("DEFAULT_PRODUCT_IMAGE",'public/default_product.jpeg');
class BaseHelper{
    public static function getItemPerPage(){
        return ITEM_PER_PAGE;
    }
    
    public static function getDefaultProductImage(){
        return DEFAULT_PRODUCT_IMAGE;
    }
}