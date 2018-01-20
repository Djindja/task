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
use App\Models\Teacher;

class TeachersController extends Controller
{
    /**
   * Index page for teachers
   * @return View
   */
    public function index()
    {
      return View::make('admin.teacher.index')->with('teachers', Teacher::all());
    }
    /**
     * Page for creating new teacher
     * @return View
     */
    public function create()
    {
        return View::make('admin.teacher.create');
    }
    /**
     * Method for handling teachers creation
     * @return  Redirect
     */
    public function postCreate()
    {
        $validator = Validator::make(Request::all(), [
          "first_name" => "required|min:2",
          "last_name" => "required|min:2",
          "birth_date" => "required",
          // "school" => "required",
        ]);

        if ($validator->fails()) {
            return redirect("/teacher/create")->withErrors($validator->errors())
                                                     ->withInput();
        }

        $teacher = new Teacher();

        $teacher->first_name = Request::get('first_name');
        $teacher->last_name = Request::get('last_name');
        $teacher->birth_date = Request::get('birth_date');
        // $teacher->school_id = Request::get('school');

        if ($teacher->save()) {
            return redirect("/teacher/edit/$teacher->id")->with('successfulMessages',[Lang::get('errors.successfullySchool')]);
        } else {
            return redirect("/teacher/create")->withErrors([Lang::get('errors.somethingWrong')]);
        }
    }
    /**
     * [edit description]
     * @param  int $id
     * @return mixed   If teacher is null, Response is returned else View is returned
     */
    public function edit(int $id)
    {
        $teacher = Teacher::find($id);

        if (is_null($teacher)) {
            return redirect("/teacher");
        }

        return View::make('admin.teacher.edit')->with('teachers', $teacher);
    }
    /**
     * Editing teachers information
     * @param  int $id
     * @return Response edit Users name or get an error
     */
      public function postEdit(int $id)
      {
          $validator = Validator::make(Request::all(), [
              "first_name" => "required|min:2",
              "last_name" => "required|min:2",
              "birth_date" => "required",
              // "school" => "required",
        ]);

        if ($validator->fails()) {
            return redirect("/teacher/edit/$id")->withErrors($validator->errors())
                                                       ->withInput();
        }

          $teacher = Teacher::find($id);

          $teacher->first_name = Request::get('first_name');
          $teacher->last_name = Request::get('last_name');
          $teacher->birth_date = Request::get('birth_date');
          // $teacher->school_id = Request::get('school');

          if ($teacher->save()) {
              return redirect("/teacher/edit/$teacher->id")->with('successfulMessages',[Lang::get('errors.successfullySchool')]);
          } else {
              return redirect("/teacher/edit/$teacher->id")->withErrors([Lang::get('errors.somethingWrong')]);
          }
      }
    /**
     * Delete teacher
     * @param  int $id
     * @return Response Remove User or get an error
     */
    public function delete(int $id)
    {
        $teacher = Teacher::find($id);

        if ($teacher->delete()) {
            return redirect("/teacher");
        } else {
            return redirect("/teacher")->withErrors([Lang::get('errors.somethingWrong')]);
        }
    }
}
