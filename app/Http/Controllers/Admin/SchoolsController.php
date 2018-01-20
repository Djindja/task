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
use App\Models\School;

class SchoolsController extends Controller
{
    /**
   * Index page for schools
   * @return View
   */
    public function index()
    {
      return View::make('admin.school.index')->with('schools', School::all());
    }
    /**
     * Page for creating new school
     * @return View
     */
    public function create()
    {
        return View::make('admin.school.create');
    }
    /**
     * Method for handling schools creation
     * @return  Redirect
     */
    public function postCreate()
    {
        $validator = Validator::make(Request::all(), [
          "school_name" => "required|min:2",
          "year_founded" => "required",
        ]);

        if ($validator->fails()) {
            return redirect("/school/create")->withErrors($validator->errors())
                                                     ->withInput();
        }

        $school = new School();

        $school->school_name = Request::get('school_name');
        $school->year_founded = Request::get('year_founded');
        $school->city = Request::get('city');

        if ($school->save()) {
            return redirect("/school/edit/$school->id")->with('successfulMessages',[Lang::get('errors.successfullySchool')]);
        } else {
            return redirect("/school/create")->withErrors([Lang::get('errors.somethingWrong')]);
        }
    }
    /**
     * [edit description]
     * @param  int $id
     * @return mixed   If school is null, Response is returned else View is returned
     */
    public function edit(int $id)
    {
        $school = School::find($id);

        if (is_null($school)) {
            return redirect("/school");
        }

        return View::make('admin.school.edit')->with('schools', $school);
    }
    /**
     * Editing schools information
     * @param  int $id
     * @return Response edit Users name or get an error
     */
      public function postEdit(int $id)
      {
          $validator = Validator::make(Request::all(), [
              "school_name" => "required|min:2",
              "year_founded" => "required",
        ]);

        if ($validator->fails()) {
            return redirect("/school/edit/$id")->withErrors($validator->errors())
                                                       ->withInput();
        }

          $school = School::find($id);

          $school->school_name = Request::get('school_name');
          $school->year_founded = Request::get('year_founded');
          $school->city = Request::get('city');

          if ($school->save()) {
              return redirect("/school/edit/$school->id")->with('successfulMessages',[Lang::get('errors.successfullySchool')]);
          } else {
              return redirect("/school/edit/$school->id")->withErrors([Lang::get('errors.somethingWrong')]);
          }
      }
    /**
     * Delete school
     * @param  int $id
     * @return Response Remove User or get an error
     */
    public function delete(int $id)
    {
        $school = School::find($id);

        if ($school->delete()) {
            return redirect("/school");
        } else {
            return redirect("/school")->withErrors([Lang::get('errors.somethingWrong')]);
        }
    }
}
