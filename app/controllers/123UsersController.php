<?php
class UsersController123 extends BaseController{
    
    private function checkLogged(){
        if(Session::has('current_user')){
            return true;
        }else{
            return false;
        }
    }

    public function getViewDetails(){
        if($this->checkLogged()){
            $data['albums']=Album::where('user_id',Session::get('current_user'))->get();
            return View::make('frontend/users/details')->with('data',$data);
        }else{
            return Redirect::to('home/index');
        }
    }

    public function postAjaxComment(){
        if(Input::get('commentContent')){
            $data=Input::all();
            $new = new Comment;
            $new->post_id=$data['post_id'];
            $new->user_id=Session::get('current_user');
            $new->type = $data['type'];
            $new->content=$data['commentContent'];
            $new->save();
            $new = $new->toArray();
            $new['user_name'] = User::where('id','=',$new['user_id'])->get()->first()->name;
            echo json_encode($new);
        }else{
            echo json_encode('false');
        }
    }
    
    public function getLogin(){
        
        if(Session::get('current_user')){
            return View::make('frontend/index');
        }
        return View::make('frontend/users/login');
    }
    
    public function getLogout() {
        if(Session::has('current_user')){
            Session::flush();
            return Redirect::to('/home');
        }
    }
    
    public function getUpload(){
        if($this->checkLogged()){
            return View::make('frontend/users/upload');
        }else{
            return Redirect::to('home/index');
        }
        
    }
    
    public function getViewProducts(){
        if($this->checkLogged()){
            $data['products']=Product::where('user_id',Session::get('current_user'))->get();
            return View::make('frontend/users/view-products')->with('data',$data);
        }else{
            return Redirect::to('home/index');
        }
    }
    
    public function postDoLogin(){
        if(Input::get('account') && Input::get('password')){
            $data=Input::all();
            $user=User::where('account',$data['account'])->where('password',$data['password'])->first();
            if($user){
                Session::put('current_user',$user->id);
                if($user->is_admin == 1){
                    return Redirect::to('admin')->with('user', $user);
                }else{
                    return Redirect::to('home/index')->with('user', $user);
                }
                
            } else{
                return Redirect::to('home');
            }			
        }
    }
       
    public function getSignup(){
        
        if(Session::get('current_user')){
            return View::make('frontend/index');
        }
        return View::make('frontend/users/signup');
    }
    
    public function postSignup(){
			$data=Input::all();
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
					),
				array(
					'name' => 'required|min:6',
					'account' => 'required|min:6',
					'password' => 'required|min:6',
                    'password_confirm' => 'same:password',
					'email' => 'email|required',
					'phone' => 'numeric|required',
					'address' => 'required',
					)
				);
			if($validator->fails()){
				$messages = $validator->messages();
				// $messages
				Session::flash('signup_status', false);
                return Redirect::to('user/signup');
			}else{
				$user=User::where('account',$data['account'])->first();
				if($user){
                    Session::flash('signup_status', false);
					return Redirect::to('home/index');
				} else{
					$new= new User;
					$new->name=$data['name'];
					$new->account=$data['account'];
					$new->password=$data['password'];
					$new->email=$data['email'];
					$new->phone=$data['phone'];
					$new->address=$data['address'];
                    $status = $new->save();
                    Session::flash('signup_status', $status);
                    if($status == true){
                        Session::set("current_user", $new->id);
                        
                    }
					return Redirect::to('home/index')->with('user',$new);
				}
			}
		}
    public function postAjaxLogin(){
        if(Input::get('account') && Input::get('password')){
            $data=Input::all();
            $user=User::where('account','=', $data['account'])->where('password','=',$data['password'])->first();

            if($user){
                Session::put('current_user',$user->id);
                echo 'success';
            } else{
                echo 'fail';
            }			
        }
    }
    public function postAjaxSignup(){
        $data=Input::all();
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
					),
				array(
					'name' => 'required|min:5',
					'account' => 'required|min:5',
					'password' => 'required|min:5',
                    'password_confirm' => 'same:password',
					'email' => 'email|required|min:5',
					'phone' => 'numeric|required',
					'address' => 'required',
					)
				// array(
				// 	'required' => 'Yêu cầu bắt buộc.',
				// 	//'min:5' => 'Tối thiểu 5 ký tự',
				// 	)
				);
			if($validator->fails()){
				$messages = $validator->messages();
				// $messages
				echo 'not valid info';
			}else{
				$user=User::where('account',$data['account'])->first();
				if($user){
					echo 'fail';
				} else{
					$new= new User;
					$new->name=$data['name'];
					$new->account=$data['account'];
					$new->password=$data['password'];
					$new->email=$data['email'];
					$new->phone=$data['phone'];
					$new->address=$data['address'];
                    $new->save();
                    Session::put('current_user',$new->toArray());
					echo 'success';
				}
			}
    }

    private function checkIsAdmin(){
        $currrent_user_id = Session::get('current_user');
        $current_user = User::find($currrent_user_id);
        if($current_user->is_admin == 1){
            return true;
        }else{
            return false;
        }
    }

    public function exchange($id){
        Session::put('product_id',$id);
        return Redirect::to('product/view')->with('add_to_cart',true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if($this->checkIsAdmin()) {
            $users = User::all();
            return View::make('backend.users.list')->with('users',$users);
        }else{
            return Redirect::to('home/index');
        }
    }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
      {
        //
      }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
      {
        //
      }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
      {
        //
      }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // $user = User::select('*')->where('id','=',$id)->first();
    // return View::make('backend.users.edit')->with('user',$user);
    $user = User::find($id);
    if (is_null($user))
    {
        return Redirect::route('admin.index');
    }
        return View::make('backend.users.edit', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // $input = Input::all();
    //     $validation = Validator::make($input, User::$rules);
    //     if ($validation->passes())
    //     {
    //         $user = User::find($id);
    //         $user->update($input);
    //         return Redirect::route('users.index');
    //     }
    // return Redirect::route('users.edit', $id)
    //         ->withInput()
    //         ->withErrors($validation)
    //         ->with('message', 'There were validation errors.');

    $input = array(
            'password' => Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation'),
            'name' => Input::get('name'),
            'address' => Input::get('address'),
            'phone' => Input::get('phone'),
            'is_admin' => Input::get('is_admin'),
        );
        $rule = array(
            'password'              => 'min:4|confirmed',
            'password_confirmation' => 'min:4',
            'name' => 'required',
            'address' => 'required'
        );
        $validator = \Validator::make($input,$rule);
        if($validator->fails()){
            return Redirect::route('admin.edit', $id)
            ->withInput()
            ->withErrors($validator)
            ->with('message', 'There were validation errors.');
        }
        else{
            $user = User::find($id);
            
            $name = Input::get('name');
            $address = Input::get('address');
            $phone = Input::get('phone');
            $is_admin = Input::get('is_admin');

            $user->name = $name;
            $user->address = $address;
            $user->phone = $phone;
            $user->is_admin = $is_admin;

            $user->save();
            return Redirect::route('admin.index');
        }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
        User::find($id)->delete();
        return Redirect::route('admin.index');
  }
}