<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        return Student::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|integer|digits:11',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'grade' => 'required|integer|max:12',
            // Should take parent id from token validation
            'parent_id' => 'required|integer|exists:users,id',
            'school_code' => 'required|integer|exists:schools,code',
        ]);
        return Student::create($request->all());
    }

    public function show($code, Request $request)
    {
        return Student::find($code);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|integer|digits:11',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'grade' => 'required|max:12',
            'school_code' => 'digits:9',
        ]);
        $Pupil = Student::find($id);
        $Pupil->update($request->all());
        return $Pupil;
    }

    public function destroy($id)
    {
        return Student::destroy($id) === 0
            ? response(["status" => "failure"], 404)
            : response(["status" => "success"], 200);
    }
}
