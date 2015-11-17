<?php

class FEProductsHelper{
    public static function save(){
        $data = Input::all();
        $product = new Product;
        $product->user_id = Session::get('current_user');
        $product->category_id = $data['category'];
        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->location_id = $data['location'];
        $product->public = $data['public']?1:0;
        $product->save();
        return $product;
    }
}