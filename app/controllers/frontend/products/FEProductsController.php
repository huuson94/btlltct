<?php

class FEProductsController extends FEBaseController{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $datas = Input::all();
        $params = array();
        $isCheckPublic = true;
        if (isset($datas['u'])) {
            if(!FEUsersHelper::isCurrentUser($datas['u'])){
//                Session::flash('status',false);
//                Session::flash('messages',array('Bạn không thể vào kho đồ của người khác'));
//                return Redirect::to('/');
            
                $isCheckPublic = true;
            }else{
                $isCheckPublic = false;
            }
            $params['user_id'] = $datas['u'];
        }
        if (isset($datas['title'])) {
            $params['title'] = $datas['title'];
            
        }
        if (isset($datas['category'])) {
            $params['category_id'] = $datas['category'];
            
        }
        
        if(!$isCheckPublic){
            $products_d = Product::where(function($query){
                $query->where('public','=',0)->orWhere('public','=',1);
            });
        }else{
            $products_d = Product::where('public','=',1);
        }
        foreach ($params as $key => $param) {
            if ($key == 'title') {
                $op = 'LIKE';
                $param = "%" . $param . "%";
            }
            if ($key == 'user_id' || $key == 'category_id') {
                $op = '=';
            }
            $products_d = $products_d->where($key, $op, $param);
        }
        $products = $products_d->orderBy('created_at','desc')->paginate(BaseHelper::getItemPerPage());
//        $products = $products_d->get();
        if (!empty($params['user_id'])) {
            $view = View::make('frontend/products/user-products')->with('products', $products)->with('u_name',User::find($datas['u'])->name);
        } else {
            $view = View::make('frontend/products/index')->with('products', $products);
        }
        if (!empty($params['category_id'])) {
            $view->with('category_title', Category::find($params['category_id'])->title);
        }
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        if (!FEUsersHelper::isLogged()) {
            return Redirect::to('/');
        }else{
            return View::make('frontend/products/create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $data = Input::all();
        $product = FEProductsHelper::save($data);
        $files = Input::file('img');
        $status = true;
        foreach ($files as $index => $file) {
            if ($file && $file->isValid()) {
                if(!FEImagesHelper::save($product->id,$index)){
                    $status = false;
                    break;
                }
            }
        }
        $messages[] = "Đã đăng sản phẩm";
        Session::flash('status', $status);
        Session::flash('messages',$messages);
        return Redirect::to('product/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $product = Product::where('id', $id)->first();
        if ($product->user_id == Session::get('current_user')) {
            return Redirect::to('product/' . $product->id . '/edit')->with('product', $product);
        } else {
            return View::make('frontend/products/show')->with('product', $product);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $product = Product::find($id);
        if(FEUsersHelper::isCurrentUser($product->user_id)){
            return View::make('frontend/products/edit')->with('product', $product);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $product = Product::find($id);
        if(FEUsersHelper::isCurrentUser($product->user->id)){
            $data=Input::all();
            $product->title=$data['title'];
            $product->description=$data['description'];
            $product->public = !empty($data['public'])?1:0;
            $product->save();
            Session::flash('status',true);
            Session::flash('messages',array('Đã cập nhật'));
        }
        return Redirect::to('product/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        if(FEUsersHelper::isCurrentUser($product->user->id)){
            $product->delete();
            Session::flash('status',true);
            Session::flash('messages',array('Đã xóa'));
        }
        return Redirect::to('/');
    }

}