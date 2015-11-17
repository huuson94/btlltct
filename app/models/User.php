<?php
class User extends Eloquent {
	protected $table = 'mst_users';
    
    public function products(){
        return $this->hasMany('Product','user_id');
    }
   
    
}