<?php

class BaseController extends Controller implements ActionInterface {
    
    
    

    /**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
    
    public function __construct() {
        
        if(Session::has('current_user') && !is_null(User::find(Session::get('current_user')))){
            $data['user_name'] = User::find(Session::get('current_user'))->name;
            View::share('user_name', $data['user_name']);
        }else{
            if(Session::has('current_user')){
                Session::forget('current_user');
            }
        }
        
    }

    public function index(){

    }

	public function create(){

	}
	public function store(){

	}
	public function show($id){

	}
	public function update($id){

	}
	public function destroy($id){

	}
	public function edit($id){

	}

    
//    private function getNotifications(){
//            $current_user_id = Session::get('current_user');
//            $last_time = Notification::where('user_id','=', $current_user_id)->get()->first()
//                    ?Notification::where('user_id','=', $current_user_id)->get()->first()->updated_at
//                    :"0000-00-00 00:00:00";
//            $data['new_images'] = $this->getNewImagesNotification($current_user_id, $last_time);
//            $data['new_albums'] = $this->getNewAlbumsNotification($current_user_id, $last_time);
//            $data['new_actions'] = $this->getNewActionsNotification($current_user_id, $last_time);
//            $data['count_notifications'] = count($data['new_images']) + count($data['new_albums']) + count($data['new_actions']);
//            return $data;
//        }
//        
//        private function getNewImagesNotification($current_user_id, $last_time){
//            $followed_users = Relation::where('user1_id','=',$current_user_id)->select('user2_id')->get();
//            $new_images = Album::whereIn('user_id',$followed_users->fetch('user2_id')->toArray())
//                    ->where('is_single', '=', 1)
//                    ->where('created_at','>=', $last_time)
//                    ->get();
//            return $new_images?$new_images:array();
//        }
//        
//        private function getNewAlbumsNotification($current_user_id, $last_time){
//            $followed_users = Relation::where('user1_id','=',$current_user_id)->select('user2_id')->get();
//            $new_albums = Album::whereIn('user_id',$followed_users->fetch('user2_id')->toArray())
//                    ->where('is_single', '=', 0)
//                    ->where('created_at','>=', $last_time)
//                    ->get();
//            return $new_albums?$new_albums:array();
//        }
//        
//        private function getNewActionsNotification($current_user_id, $last_time){
////            $followed_users = Relation::where('user1_id','=',$current_user_id)->select('user2_id')->get();
////            $new_actions = Actions::whereIn('user_id',$followed_users->fetch('user2_id')->toArray())
////                    ->where('is_single', '=', 0)
////                    ->where('created_at','>=', $last_time)
////                    ->get();
////            return $new_albums?$new_albums:array();
//        }
        

}
