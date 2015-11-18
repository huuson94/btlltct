<?php

class FEExchangesController extends FEBaseController{
    /**
     * Display a listing of exchanges request to current user
     *
     * @return Response
     */
    public function index() {
        $datas = Input::all();
        if(isset($datas['u'])){
            $r_user_id = $datas['u'];
            $errors_message = array();
            if (FEUsersHelper::isCurrentUser($r_user_id)) {
                $r_user = User::find($r_user_id);
                $exchanges = Exchange::where('r_user_id', '=', $r_user_id)->where('created_at', '>=', $r_user->last_check_noti)->get();
                return View::make('frontend/exchanges/index')->with('exchanges', $exchanges);
            } else {
                $errors_message[] = 'Không được phép truy cập';
                Session::flash('errors_message',$errors_message);
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
        $errors_message = array();
        if(FEUsersHelper::isLogged()){
            if(FEExchangesHelper::isProductSelected()){
                $s_user_id = Session::get('current_user');
                $products = Product::where('user_id','=',$s_user_id)->where('public','=','1')->where('status','=',0)->get();
                return View::make('frontend/exchanges/create')->with('products',$products);
            }else{
                $errors_message[] = 'Bạn cần chọn sản phẩm trước';
                Session::flash('errors_message',$errors_message);
                return Redirect::to('/');
            }
        }else{
            $errors_message[] = 'Bạn cần đăng nhập';
            Session::flash('errors_message',$errors_message);
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
            Session::flash('messages','Đã gửi');
        }else{
            Session::flash('status', false);
            Session::flash('messages','Đã xảy ra lỗi khi gửi yêu cầu trao đổi');
        }
        return Redirect::to('exchange?u='.$s_user_id);

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
        //
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