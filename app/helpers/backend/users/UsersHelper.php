<?php
use Helpers\Frontend;
class UsersHelper extends Frontend\UsersFrontEndHelper{

    public static function isExistedUser() {
        $data = Input::all();
        $user1 = User::where('account', $data['account'])->first();
        $user2 = User::where('email', $data['email'])->first();
        $errors_message = array();
        $status = false;
        if ($user1) {
            Session::flash('signup_status', false);
            $errors_message[] = "UserName is existed";
            $status = true;
        }
        if ($user2) {
            Session::flash('signup_status', false);
            $errors_message[] = 'Email existed';
            $status = true;
        }
        Session::flash('errors_message', $errors_message);
        return $status;
    }

    public static function saveNewUser() {
        $data = Input::all();
        $upload_folder = AVATAR_PATH . '/' . uniqid(date('ymdHisu'));
        $new = new User;
        $new->name = $data['name'];
        $new->account = $data['account'];
        $new->password = $data['password'];
        $new->email = $data['email'];
        $new->phone = $data['phone'];
        $new->address = $data['address'];
        if ($data['avatar']) {
            $name = $data['avatar']->getFilename() . uniqid() . "." . $data['avatar']->getClientOriginalExtension();
            $new->avatar = 'public/' . $upload_folder . "/" . $name;
            $data['avatar']->move(public_path() . "/" . $upload_folder, $name);
        } else {
            $new->avatar = DEFAULT_AVATAR_PATH;
        }
        if ($new->save()) {
            return $new;
        } else {
            return false;
        }
    }

    public static function isLogged() {
        if (Session::has('current_user')) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAdmin() {
        $currrent_user_id = Session::get('current_user');
        $current_user = User::find($currrent_user_id);
        if ($current_user->is_admin == 1) {
            return true;
        } else {
            return false;
        }
    }
    
   
}
