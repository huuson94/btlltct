<?php
class Exchange extends Eloquent{
    protected $table = 'exchanges';
    
    public function rProduct(){
    	return $this->belongsTo('Product','r_product_id');
    }
    
    public function sProduct(){
        return $this->belongsTo('Product','s_product_id');
    }
    
}