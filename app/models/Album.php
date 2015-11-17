<?php

class Album extends Eloquent{
    protected $table = 'albums';
    
    
    public function product(){
    	return $this->belongsTo('Product','product_id');
    }
    
    public function actions(){
        return $this->hasMany('Action', 'post_id')->where('a_type','=',1);
    }
}