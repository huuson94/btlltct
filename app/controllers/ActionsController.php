<?php
define('ACTIONS_COUNT',3);
class ActionsController extends BaseController{
    public function createDefaultActions($post_id, $p_type){
        for($i = 1; $i <= ACTIONS_COUNT; $i++){
            $action = new Action;
            $action->user_id = Session::get('current_user');
            $action->a_type = $i;
            $action->post_id = $post_id;
            $action->p_type = $p_type;
            $action->save();
            
        }
    }
}