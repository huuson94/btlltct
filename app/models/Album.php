<?php

class Album extends Eloquent{
    protected $table = 'albums';
    
    public function user(){
        return $this->belongsTo('User','user_id');
    }
    
    public function images(){
        return $this->hasMany('Image', 'album_id');
    }

    public function category(){
    	return $this->belongsTo('Category','category_id');
    }
    
    public function actions(){
        return $this->hasMany('Action', 'post_id')->where('a_type','=',1);
    }
}