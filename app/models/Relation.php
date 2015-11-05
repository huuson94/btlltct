<?php

class Relation extends Eloquent {
    protected $table = 'relations';
    
    public function user1(){
        return $this->belongsTo('User','user1_id');
    }
    
    public function user2(){
        return $this->belongsTo('User','user2_id');
    }
}
?>