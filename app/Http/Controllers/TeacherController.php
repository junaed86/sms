<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private $teacher;
    private $teachers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('admin.teacher.add');
    }
    public function manage()
    {
       $this->teachers = Teacher::all();
        return view('admin.teacher.manage',['teachers' => $this->teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'email' => 'email:rfc,dns|unique:teachers,email',
            'image' => 'required|image',
        ], [
            'name.required' => 'Plz give ur name',
            'email.required' => 'plz another email set',
            'image.required' => 'plz give ur image',
        ]);

        Teacher::newTeacher($request);
        return redirect('/add-teacher')->with('message','Teacher info create succesfully');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $this->teacher = Teacher::find($id);
        return view('admin.teacher.edit',['teacher' => $this->teacher]);
    }


    public function update(Request $request, $id)
    {
        Teacher::updateTeacher($request,$id);
        return redirect('/manage-teacher')->with('message','Teacher info update succesfully');

    }
    public function delete($id)
    {
        Teacher::deleteTeacher($id);
        return redirect('manage-teacher')->with('message','Delete teacher info');
    }

    public function destroy($id)
    {
        //
    }
}
