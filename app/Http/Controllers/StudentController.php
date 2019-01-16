<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use App\Http\Resources\Student as StudentResource;
class StudentController extends Controller
{
    
    public function getData(Request $request)
    {
        $students = student::all();
        return StudentResource::collection($students);
    }

    public function store(Request $request)
    {
        $student = new student;
        $student->name = $request->name;
        $student->roll = $request->roll;
        $student->section = $request->section;
        $student->save();

        return new StudentResource($student);
    }


    public function show($id)
    {
        $student = student::find($id);
        if ($student) {
            return new StudentResource($student);
        }
        return response()->json(['Error'=>'No Data Found!'],404);
    }


    public function update(Request $request, $id)
    {
        $student = student::find($id);
        if($student){
            $student->name = $request->name;
            $student->roll = $request->roll;
            $student->section = $request->section;
            $student->save();

            return new StudentResource($student);
        }
        return response()->json(['Error'=>'Failed to Update'],404);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return new StudentResource($student);
        }
        return response()->json(['Error'=>'Failed to Delete'],404);
    }
}
