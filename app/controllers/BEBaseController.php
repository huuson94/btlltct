<?php

class BEBaseController extends BaseController{
    
    public function __construct() {
       	if(!BEUsersHelper::isAdmin()){
       		Redirect::to('/');
       	}
    }
}