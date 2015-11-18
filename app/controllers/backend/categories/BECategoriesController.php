<?php

class BECategoriesController extends BEBaseController{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $categories = Category::all();
        return View::make('backend.category.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $p_id = Category::select('*')->where('p_id','=',0)->get();
        return View::make('backend.category.create')->with('p_id',$p_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //

        if(BECategoryHelper::validateCate()){
            $category = new Category;

            $title = Input::get('title');
            $description = Input::get('description');
            $p_id = Input::get('p_id');

            $category->title = $title;
            $category->description = $description;
            $category->p_id = $p_id;

            $category->save();
            Session::flash('status',true);
            return Redirect::route('admin.category.index');
        }
        else{
            Session::flash('status',false);
            return Redirect::route('admin.category.create');
            
        }
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
        $p_id = Category::select('*')->where('p_id','=',0)->get();
            $category = Category::find($id);
            if (is_null($category))
            {
                return Redirect::route('admin.category.index');
            }
                return View::make('backend.category.edit', compact('category','p_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        if(BECategoryHelper::validateCate()){
            $category = Category::find($id);

                $title       = Input::get('title');
                $description = Input::get('description');
                $p_id        = Input::get('p_id');

                $category->title = $title;
                $category->description = $description;
                $category->p_id = $p_id;

                $category->save();
                Session::flash('status',true);
                return Redirect::route('admin.category.index');
            }
            else{
                Session::flash('status',false);
                return Redirect::route('admin.category.edit', $id)
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
        Category::find($id)->delete();
        return Redirect::route('admin.category.index');
    }

}