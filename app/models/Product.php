<?php

class Product extends Eloquent{
    protected $table = 'products';
    
    public function user(){
        return $this->belongsTo('User','user_id');
    }
    
    public function category(){
    	return $this->belongsTo('Category','category_id');
    }
    
    public function images(){
    	return $this->hasMany('Image','product_id');
    }
    
}