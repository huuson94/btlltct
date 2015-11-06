<?php
class CategoriesController extends BaseController{
    public function getView($id) {
        $data['category'] = Category::where('id', $id)->first();
        $temp = Product::where('category_id', $id)->where('public', '=', 1);
        $data['products'] = $temp->get();
        return View::make('frontend/categories/view')->with('data', $data);

    }
    
    public function getSearch(){
        echo Input::get('title');
    }

    public function index()
    {
        
        $categories = Category::all();
        return View::make('backend.category.list')->with('categories',$categories);
    }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
      {
        return View::make('backend.category.create');
      }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
      {
      	$input = array(
            'title' => Input::get('title')
        );
        $rule = array(
            'title'              => 'min:2|required'
        );
        if($this->validate($input,$rule)->fails()){
            return Redirect::route('admin-category.create')
            ->withInput()
            ->withErrors($this->validate($input,$rule))
            ->with('message', 'There were validation errors.');
        }
        else{
            $category = new Category;

            $title = Input::get('title');

            $category->title = $title;

            $category->save();
            return Redirect::route('admin-category.index');
        }
        
      }

      private function validate($input,$rule){
        $validator = \Validator::make($input,$rule);
        return $validator;
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
    $category = Category::find($id);
    if (is_null($category))
    {
        return Redirect::route('admin-category.index');
    }
        return View::make('backend.category.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $input = array(
            'title' => Input::get('title')
        );
        $rule = array(
            'title'              => 'min:2|required'
        );
        if($this->validate($input,$rule)->fails()){
            return Redirect::route('admin-category.edit', $id)
            ->withInput()
            ->withErrors($this->validate($input,$rule))
            ->with('message', 'There were validation errors.');
        }
        else{
            $category = Category::find($id);

            $title = Input::get('title');

            $category->title = $title;

            $category->save();
            return Redirect::route('admin-category.index');
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
        Category::find($id)->delete();
        return Redirect::route('admin-category.index');
  }
}