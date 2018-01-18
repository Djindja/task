<?php

namespace App\Http\Controllers\Admin;

use File;
use Auth;
use View;
use Lang;
use Hash;
use Request;
use Response;
use Validator;
use App\Models\PortalUsers;

class SchoolsController extends Controller
{
    /**
   * Index page for users
   * @return View
   */
    public function index()
    {
      return View::make('admin.users.index')->with('users', PortalUsers::all());
    }
    /**
     * Page for creating new user
     * @return View
     */
    public function create()
    {
        return View::make('admin.users.create');
    }
    /**
     * Method for handling users creation
     * @return  Redirect
     */
    public function postCreate()
    {
        $validator = Validator::make(Request::all(), [
          "first_name" => "required|min:2",
          "last_name" => "required|min:2",
          "email" => "required|email",
          "password" => "min:5|max:15|confirmed",
        ]);

        if ($validator->fails()) {
            return redirect("/users/create")->withErrors($validator->errors())
                                                     ->withInput();
        }

        $user = new PortalUsers();

        if (Request::has('password')) {
            $user->password = Hash::make(Request::get('password'));
        }

        $user->first_name = Request::get('first_name');
        $user->last_name = Request::get('last_name');
        $user->email = Request::get('email');
        $user->is_admin = Request::get('is_admin');

        if ($user->save()) {
            return redirect("/users");
        } else {
            return redirect("/users")->withErrors([Lang::get('errors.somethingWrong')]);
        }
    }
    /**
     * [edit description]
     * @param  int $id
     * @return mixed   If user is null, Response is returned else View is returned
     */
    public function edit(int $id)
    {
        $user = PortalUsers::find($id);

        if (is_null($user)) {
            return redirect("/users");
        }

        return View::make('admin.users.edit')->with('users', $user);
    }
    /**
     * Editing users information
     * @param  int $id
     * @return Response edit Users name or get an error
     */
      public function postEdit(int $id)
      {
          $validator = Validator::make(Request::all(), [
            "first_name" => "required|min:2",
            "last_name" => "required|min:2",
            "email" => "required|email",
        ]);

        if ($validator->fails()) {
            return redirect("/users/edit/$id")->withErrors($validator->errors())
                                                       ->withInput();
        }

          $user = PortalUsers::find($id);

          if (Request::has('password')) {
              $user->password = Hash::make(Request::get('password'));
          }

          $user->first_name = Request::get('first_name');
          $user->last_name = Request::get('last_name');
          $user->email = Request::get('email');
          $user->is_admin = Request::get('is_admin');

          if ($user->save()) {
              return redirect("/users");
          } else {
              return redirect("/users")->withErrors([Lang::get('errors.somethingWrong')]);
          }
      }
    /**
     * Delete user
     * @param  int $id
     * @return Response Remove User or get an error
     */
    public function delete(int $id)
    {
        $user = PortalUsers::find($id);

        if ($user->delete()) {
            return redirect("/users");
        } else {
            return redirect("/users")->withErrors([Lang::get('errors.somethingWrong')]);
        }
    }
}
