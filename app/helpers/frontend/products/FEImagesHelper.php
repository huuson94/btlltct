<?php

class FEImagesHelper {
    public static function save($product_id, $index){
        $data = Input::all();
        $files = Input::file('img');
        $status = 'success';
        if($files == null){
            Session::flash('status','false');
            $errors_message[] = "Over max upload size!";
            Session::flash('errors_message',$errors_message);
            return false;
        }else{
            $image = new Image;
            $file = $files[$index];
            $upload_folder = "upload/products/" . uniqid(date('ymdHisu'));
            $name = $file->getFilename() . uniqid() . "." . $file->getClientOriginalExtension();
            $file->move(public_path() . "/" . $upload_folder, $name);
            $image->path = '/public/'.$upload_folder . "/" . $name;
            $image->product_id = $product_id;
            $status = $image->save();
            if ($status == FALSE) {
                $status = 'fail';
                $errors_message[] = "Can't add product";
                Session::flash('errors_message',$errors_message);
                return false;
            }
        }
        return true;
    }
}
