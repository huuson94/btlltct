<?php

class Location extends Eloquent {
	protected $table = 'mst_locations';
    
    public function parent(){
    	return $this->belongsTo('Location','p_id');
    }
   
    
}