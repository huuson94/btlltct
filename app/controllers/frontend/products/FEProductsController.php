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
        if (isset($datas['u'])) {
            $params['user_id'] = $datas['u'];
        }
        if (isset($datas['title'])) {
            $params['title'] = $datas['title'];
        }
        if (isset($datas['category'])) {
            $params['category_id'] = $datas['category'];
        }
        $products_d = Product::where('public', '=', '1')->where('status','=',0);
        foreach ($params as $key => $param) {
            if ($key == 'title') {
                $op = 'LIKE';
                $param = "%" . $param . "%";
            }
            if ($key == 'user_id' || $key == 'category_id') {
                $op = '=';
            }
            $products_d = Product::where($key, $op, $param);
        }
        $products = $products_d->get();
        if (!empty($params['user_id'])) {
            $view = View::make('frontend/products/my-products')->with('products', $products);
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
        Session::flash('status', $status);
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