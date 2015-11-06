<?php
class Category extends Eloquent{
    protected $table = 'mst_categories';

    public function parent(){
    	return $this->belongsTo('Category','p_id');
    }
}