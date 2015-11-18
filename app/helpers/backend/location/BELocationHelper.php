<?php
class BELocationHelper {
	public static function validateLoca(){
		$input = array(
                'name' => Input::get('name')
        );
        $rule = array(
                'name'              => 'min:2|required'
        );
        $validator = \Validator::make($input,$rule);
            if($validator->fails()){
                Session::flash('errors_message',$validator->messages()->toArray());
                return false;
            }
            return true;

	}
}