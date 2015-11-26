<?php

class FEProductsController extends FEBaseController{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $params = Input::get();
        $products_d = Product::where('updated_at','<',date('Y-m-d H:i:s'));
        foreach($params as $key => $value){
            $field = ucfirst($key);
            $field = str_replace('_', '', $field); 
            $searchClass = "Search".$field."Product";
            $products_d = $searchClass::searchField($key,$value );
            
        }
        $products = $products_d->orderBy('created_at','desc')->paginate(BaseHelper::getItemPerPage());
        if(array_key_exists('user', $params)){
            $view = View::make('frontend/products/user-products')->with('products', $products)->with('u_name',User::find($products['user_id'])->name);
        }else{
            $view =  View::make('frontend/products/index')->with('products', $products);
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