<?php
class BEProductHelper {
	public static function getCategory(){
        $cate = Category::all();
        return $cate;
    }

    public static function getLocation(){
        $loca = Location::all();
        return $loca;
    }

    public static function validateProduct(){
        $input = array(
                'title' => Input::get('title'),
                'category_id'=>Input::get('category_id'),
                'location_id'=>Input::get('location_id'),
                'public' => Input::get('public')
        );
        $rule = array(
                'title'              => 'min:2|required',
                'category_id'        => 'required',
                'location_id'        => 'required',
                'public'        => 'required'
        );
        $validator = \Validator::make($input,$rule);
            if($validator->fails()){
                Session::flash('messages',$validator->messages()->toArray());
                return false;
            }
            return true;
    }
}