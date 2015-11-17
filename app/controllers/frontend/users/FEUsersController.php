<?php

class FEUsersController extends FEBaseController{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
       if (FEUsersHelper::isLogged()) {
            return View::make('frontend/products/index');
        }
        return View::make('frontend/sessions/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        if (FEUsersHelper::isLogged()) {
            return Redirect::to('/');
        }
        return View::make('frontend/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        if (!FEUsersHelper::validateSignUpInfo()) {
            Session::flash('signup_status', false);
            return Redirect::to('signup');
        } else {
            if (!FEUsersHelper::isExistedUser()) {
                $new = FEUsersHelper::saveNewUser();
                if ($new) {
                    Session::flash('signup_status', true);
                    Session::set("current_user", $new->id);
                    return Redirect::to('/');
                } else {
                    return Redirect::to('signup');
                }
            } else {
                return Redirect::to('signup');
            }
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