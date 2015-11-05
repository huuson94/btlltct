<?php
class Comment extends Eloquent {
	protected $table = 'comments';
    
    
    public function album(){
        return $this->belongsTo('Album','post_id');
    }
    
    public function image(){
        return $this->belongsTo('Image','post_id');
    }
    
    public function user(){
        return $this->belongsTo('User','user_id');
    }
}