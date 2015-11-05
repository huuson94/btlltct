<?php
class ProductsController extends BaseController{
    public function getIndex() {
        $data['album_img'] = Album::all();
        return View::make('frontend/index', $data);
    }
    
    public function postSave(){
        $product = new Product;
        $product->category_id = Input::get('category');
        $product->description = Input::get('description');
        $product->user_id = Session::get('current_user');
        $product->title = Input::get('title');
        $product->public = Input::get('public');
        $status = $product->save();
        $files = Input::file('path');
        $upload_folder = "upload/albums/". uniqid(date('ymdHisu'));

        foreach($files as $index => $file){
            if($file->isValid()) {
                $image = new Image;
                $name= $file->getFilename().uniqid().".".$file->getClientOriginalExtension();
                $file->move(public_path() ."/". $upload_folder,$name);
                $image->path= $upload_folder."/".$name;
                $image->product_id = $product->id;
                $status = $image->save();
                if($status == FALSE){
                    $status = 'fail';
                    break;
                }
            }
        }

        Session::flash('status',$status);
        return Redirect::to('user/upload');
    }
    
    public function getView($id){
        $product = Product::where('id', $id)->first();
        return View::make('frontend/products/view')->with('product',$product);
    }
}