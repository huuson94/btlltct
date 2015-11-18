<?php
define('AVATAR_PATH', 'upload/avatars');
define('DEFAULT_AVATAR_PATH',"public/upload/avatars/default/avatar.jpg");
class FEUsersHelper{
    
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
    
    public static function isExistedEmail(){
        $data = Input::all();
        $user = User::where('id','!=',Session::get('current_user'))->where('email', $data['email'])->first();
        $errors_message = array();
        $status = false;
        if ($user) {
            Session::flash('update_status', false);
            $errors_message[] = "Email is existed";
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
        $new->is_admin = 0;
        $new->last_check_noti = date('Y-m-d H:i:s');
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
    
    public static function updateUser($id){
        $data = Input::all();
        $user = User::find($id);
        $user->name = $data['name'];
        $user->password = $data['password']?$data['password']:$user->password;
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        if ($user->save()) {
            return $user;
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
    
    public static function validateSignUpInfo(){
        $data = Input::all();
        $validator = Validator::make(
                        array(
                    'password' => $data['password'],
                    'password_confirm' => $data['password_confirm'],
                    'account' => $data['account'],
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'is_admin' => 0
                        ), array(
                    'name' => 'required|min:6',
                    'account' => 'required|min:6',
                    'password' => 'required|min:6',
                    'password_confirm' => 'same:password',
                    'email' => 'email|required',
                    'phone' => 'numeric',
                        )
        );
        if ($validator->fails()) {
            Session::flash('signup_status', false);
            Session::flash('errors_message', $validator->messages());
            return false;
        }
        return true;
    }
    
    public static function validateUpdateInfo(){
        $data = Input::all();
        $validator = Validator::make(
                        array(
                    'password' => $data['password'],
                    'password_confirm' => $data['password_confirm'],
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'is_admin' => 0
                        ), array(
                    'name' => 'required|min:6',
                    'password_confirm' => 'same:password',
                    'email' => 'email|required',
                    'phone' => 'numeric',
                        )
        );
        if ($validator->fails()) {
            Session::flash('signup_status', false);
            Session::flash('errors_message', $validator->messages());
            return false;
        }
        return true;
    }
    
    public static function isCurrentUser($id){
        if(FEUsersHelper::isLogged()){
            if($id == Session::get('current_user')){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}
