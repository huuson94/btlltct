<?php

class BEBackEndController extends BaseController{
    
    public function __construct() {
        parent::__construct();
        $data['categories'] = Category::all();
        var_dump($data['categories'] );die;
        View::share('categories', $data['categories']);
    }
}