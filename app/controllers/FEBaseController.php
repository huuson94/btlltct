<?php //
class FEBaseController extends BaseController{
    public function __construct() {
        parent::__construct();
        $data['categories'] = Category::all();
        View::share('categories', $data['categories']);
        $data['locations'] = Location::all();
        View::share('locations', $data['locations']);
    }
}