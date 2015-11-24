<?php //
class FEBaseController extends BaseController{
    public function __construct() {
        parent::__construct();
        $this->getMasterDatas();
        $this->getExchangeRequests();
    
    }
    private function getMasterDatas(){
        $data['categories'] = Category::orderBy('title')->get();
        View::share('categories', $data['categories']);
        $data['locations'] = Location::all();
        View::share('locations', $data['locations']);
        
    }
    
    private function getExchangeRequests(){
        
    }
}