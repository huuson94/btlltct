<?php
class BELocationsController extends BEBaseController{
	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $locations = Location::all();
        return View::make('backend.location.index')->with('locations',$locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $p_id = Location::select('*')->where('p_id','=',0)->get();
        return View::make('backend.location.create')->with('p_id',$p_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
        if(BELocationHelper::validateLoca()){
            $location = new Location;

            $name = Input::get('name');
            $p_id = Input::get('p_id');

            $location->name = $name;
            $location->p_id = $p_id;

            $location->save();
            Session::flash('status',true);
            return Redirect::route('admin.location.index');
        }
        else{
            Session::flash('status',false);
            return Redirect::route('admin.location.create')
            ->withInput();
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
        $p_id = Location::select('*')->where('p_id','=',0)->get();
            $location = Location::find($id);
            if (is_null($location))
            {
                return Redirect::route('admin.location.index');
            }
                return View::make('backend.location.edit', compact('location','p_id'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        if(BELocationHelper::validateLoca()){
            $location = Location::find($id);

                $name       = Input::get('name');
                $p_id        = Input::get('p_id');

                $location->name = $name;
                $location->p_id = $p_id;

                $location->save();
                Session::flash('status',true);
                return Redirect::route('admin.location.index');
            }
            else{
                Session::flash('status',false);
                return Redirect::route('admin.location.edit', $id)
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
        Location::find($id)->delete();
        return Redirect::route('admin.location.index');
    }

}