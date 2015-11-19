<?php
define('DEFAULT_IMAGE','public/upload/images/default/default_product.jpg');
class Image extends Eloquent{
    protected $table = 'images';

    
    public function product(){
        return $this->belongsTo('Product', 'product_id');
    }
    
    public static function getDefault(){
        $default = new Image;
        $default->path = DEFAULT_IMAGE;
        return $default;
    }
    
}