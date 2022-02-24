<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\Department;
use App\Models\Teacher;


class TeacherController extends Controller
{
    //

    #region All Get Methods for diaplay all data
    public function getAllStudent()
    {
        $students = Student::all();

        $data = "";
        foreach ($students as $student) {
            $data .= $student."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$student->classroom."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$student->classroom->department."<br><br>";
        }
        return $data;
    }

    public function getAllClassRoom()
    {
        $classrooms = ClassRoom::all();
        $data = "";
        foreach ($classrooms as $classroom) {
            $data .= $classroom."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$classroom->department."<br><br>";
        }
        return $data;
    }

    public function getAllTeacher()
    {
        $teachers = Teacher::select('id','name')->get();
        $data = "";
        foreach ($teachers as $teacher) {
            $data .= $teacher."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$teacher->classrooms."<br><br>";
        }
        return $data;
    }

    public function getAllDepartment()
    {
        $departments = Department::all();
        $data = "";
        foreach ($departments as $department) {
            $data .= $department."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$department->classroom."<br><br>";
        }
        return $data;
    }
    #endregion

    #region All add Data Methods in Database.
  
    public function addDepartment()
    {
        $department = new Department();
        $department->name = "IT";
        $department->save();

        $department = new Department();
        $department->name = "Science";
        $department->save();
        return "Department is inserted...";
    }

    public function addTeacher()
    {
        $teacher = new Teacher();
        $teacher->name = "Sitaben";
        $teacher->save();
        $classrooms = [1];
        $teacher->classrooms()->attach($classrooms);
       

        $teacher = new Teacher();
        $teacher->name = "Gitaben";
        $teacher->save();
        $classrooms = [1,2];
        $teacher->classrooms()->attach($classrooms);

        $teacher = new Teacher();
        $teacher->name = "Ramilaben";
        $teacher->save();
        $classrooms = [1,2,3];
        $teacher->classrooms()->attach($classrooms);

        return "Teacher is inserted...";
    }

    public function addClassRoom()
    {
        $classroom = new ClassRoom();
        $classroom->name = "BCA";
        $classroom->dept_id = 1;
        $classroom->save();

        $classroom = new ClassRoom();
        $classroom->name = "12th";
        $classroom->dept_id = 2;
        $classroom->save();

        $classroom = new ClassRoom();
        $classroom->name = "11th";
        $classroom->dept_id = 2;
        $classroom->save();

        return "Class Room is inserted...";
    }

    public function addStudent()
    {
        $student = new Student();
        $student->name = "Vivek";
        $student->classroom_id = 2;
        $student->save();

        $student = new Student();
        $student->name = "Deep";
        $student->classroom_id = 1;
        $student->save();

        $student = new Student();
        $student->name = "Mayur";
        $student->classroom_id = 2;
        $student->save();

        return "Student is inserted...";
    }
    #endregion
   
    
    public function getstudent($id)
    {
        $student = Student::find($id);
        $data="";
        $data .= $student."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$student->classroom."<br>";
        return $data;
    }

    public function getclassroom($id)
    {
        $classroom = ClassRoom::find($id);
        $data="";
        $data .= $classroom."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$classroom->student."<br>";
        return $data;
    }

    public function getdipartment($id)
    {
        $department = Department::find($id);
        $data="";
        $data .= $department."<br>&nbsp;&nbsp;&nbsp;Class Rooms <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$department->classrooms."<br>";
        return $data;
    }
    
    public function getteacher($id)
    {
        $teacher = Teacher::find($id);
        $data="";
        $data .= $teacher."<br>&nbsp;&nbsp;&nbsp;Class Rooms <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$teacher->classrooms."<br>";
        return $data;
    }
    
    public function getClassRoomTeacher($id)
    {
        try {
            $classroom = ClassRoom::find($id);
            $data="";
            $data .= $classroom."<br>&nbsp;&nbsp;&nbsp;Teachers <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$classroom->teachers."<br>";
            return $data;
        } catch (\Throwable $th) {
           return "Oops, wrong...!!";
        }
    }


}
