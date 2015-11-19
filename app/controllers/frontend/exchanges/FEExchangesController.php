<?php

class FEExchangesController extends FEBaseController{
    /**
     * Display a listing of exchanges request to current user
     *
     * @return Response
     */
    public function index() {
        $datas = Input::all();
        if(!empty($datas['u']) && !empty($datas['action'])){
            $user_id = $datas['u'];
            $messages = array();
            if (FEUsersHelper::isCurrentUser($user_id)) {
                $user = User::find($user_id);
                if($datas['action'] == 'receive'){
                    $exchanges = Exchange::where('r_user_id', '=', $user_id)->where('status','=',0)->where('created_at', '>=', $user->last_check_noti)->get();
                    return View::make('frontend/exchanges/receive')->with('exchanges', $exchanges);
                }elseif($datas['action'] == 'send'){
                    $exchanges = Exchange::where('s_user_id', '=', $user_id)->where('status','=',0)->where('created_at', '>=', $user->last_check_noti)->get();
                    return View::make('frontend/exchanges/send')->with('exchanges', $exchanges);
                }
                
            } else {
                Session::flash('status',false);
                $messages[] = 'Không được phép truy cập';
                Session::flash('messages',$messages);
                return Redirect::to('/');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $product_id = Input::get('id');
        FEExchangesHelper::selectProduct($product_id);
        $messages = array();
        if(FEUsersHelper::isLogged()){
            if(FEExchangesHelper::isProductSelected()){
                $s_user_id = Session::get('current_user');
                $products = Product::where('user_id','=',$s_user_id)->where('public','=','1')->where('status','=',0)->get();
                return View::make('frontend/exchanges/create')->with('products',$products);
            }else{
                Session::flash('status',false);
                $messages[] = 'Bạn cần chọn sản phẩm trước';
                Session::flash('messages',$messages);
                return Redirect::to('/');
            }
        }else{
            Session::flash('status',false);
            $messages[] = 'Bạn cần đăng nhập';
            Session::flash('messages',$messages);
            return Redirect::to('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        
        $s_product_id = Input::get('s_product_id');
        $s_user_id = Session::get('current_user');
        $r_product_id = Session::get('r_product_id');
        $r_users_id = Product::find($r_product_id)->user->id;
        $exchange = new Exchange;
        $exchange->s_product_id = $s_product_id;
        $exchange->r_product_id = $r_product_id;
        $exchange->s_user_id = $s_user_id;
        $exchange->r_user_id = $r_users_id;
        $exchange->status = 0;
        if($exchange->save()){
            Session::flash('status', true);
            Session::flash('messages',array('Đã gửi'));
        }else{
            Session::flash('status', false);
            Session::flash('messages',array('Đã xảy ra lỗi khi gửi yêu cầu trao đổi'));
        }
        return Redirect::to('/');

    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $exchange = Exchange::find($id);
        $action = Input::get('action');
        if(FEUsersHelper::isCurrentUser($exchange->r_user_id && $action)){
            if($action == 'Đồng ý'){
                Session::flash('messages',array('Đã xác nhận trao đổi'));
                $exchange->status = 1;
            }elseif($action == 'Xóa'){
                Session::flash('messages',array('Đã hủy yêu cầu trao đổi'));
                $exchange->status = -1;
            }
            $exchange->save();
            Session::flash('status',true);
            
            return Redirect::to('exchange?u='.$exchange->r_user_id);
        }else{
            return Redirect::to('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}