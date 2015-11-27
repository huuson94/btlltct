<?php

class BEBaseController extends BaseController{
    
    public function __construct() {
        parent::__construct();
        if(!BEUsersHelper::isAdmin()){
       		Redirect::to('/');
       	}
    }
}