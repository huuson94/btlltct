<?php
	class HomeController extends BaseController{
		public function getIndex(){
            $data['products'] = Product::where('public','=',1)->get();
            return View::make('frontend/index')->with('data',$data);
		}
        
		public function getUpload(){
			return View::make('frontend/upload');
		}
		public function getDetail($id){
			//$id=Input::get('v');
			return View::make('frontend/detail');
		}
		public function postDoLogin(){
            echo App::make('UsersController')->postDoLogin();		
		
		}
		
		
        public function getSearch(){
            $type = Input::get('type');
        	$title = Input::get('title');
        	$data['products'] = Product::select('*')->where($type,'like','%'.$title.'%')->where('public','=','1')->get();
            return View::make('frontend/index')->with('data',$data);
        }
        
        public function postDoSignup(){
			App::make('UsersController')->postDoSignUp();
		}
    }
?>