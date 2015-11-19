<?php
class BECategoryHelper {
	public static function validateCate(){
		$input = array(
                'title' => Input::get('title')
        );
        $rule = array(
                'title'              => 'min:2|required'
        );
        $validator = \Validator::make($input,$rule);
            if($validator->fails()){
                Session::flash('messages',$validator->messages()->toArray());
                return false;
            }
            return true;
	}
}