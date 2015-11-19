<?php
class BEProductsController extends BEBaseController{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $products = Product::orderBy('created_at','desc')->paginate(BaseHelper::getItemPerPage());
        return View::make('backend.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
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
        $product = Product::find($id);
        $category = BEProductHelper::getCategory();
        $location = BEProductHelper::getLocation();
        if (is_null($product)) {
            return Redirect::route('admin.product.index');
        }
        return View::make('backend.product.edit')->with('product',$product)->with('category',$category)->with('location',$location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        if(BEProductHelper::validateProduct()){
            $product = Product::find($id);

                $title       = Input::get('title');
                $description = Input::get('description');
                $category_id        = Input::get('category_id');
                $location_id        = Input::get('location_id');
                $public     = Input::get('public');

                $product->title = $title;
                $product->description = $description;
                $product->category_id = $category_id;
                $product->location_id = $location_id;
                $product->public = $public;

                $product->save();
                Session::flash('status',true);
                return Redirect::route('admin.product.index');
            }
            else{
                Session::flash('status',false);
                return Redirect::route('admin.product.edit', $id)
                ->withInput();
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
        Product::find($id)->delete();
        return Redirect::route('admin.product.index');
    }

}