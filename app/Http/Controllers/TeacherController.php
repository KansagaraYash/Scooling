<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\Attendance;
use App\Models\Image;
use App\Models\Subject;


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
            $data .= $department."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$department->classrooms."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$department->student."<br><br>";;
        }
        return $data;
    }

    public function getAllAttendance()
    {
        $attendances = Attendance::all();
        $data = "";
        foreach ($attendances as $attendance) {
            $data .= $attendance."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<br><br>";
        }
        return $data;
    }
    #endregion

    #region All add Data Methods in Database.

    // Add data in department table.
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

    // Add data in classroom table.
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
    
    // Add data in teacher table.
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

    // Add data in student table.
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

    // Add data in attendence table.
    public function addAttendance()
    {
        $attendance = new Attendance();
        $attendance->classroom_id = 1;
        $attendance->teacher_id = 2;
        $attendance->student_id = 2;
        $attendance->is_present = 1;
        $attendance->save();

        $attendance = new Attendance();
        $attendance->classroom_id = 2;
        $attendance->teacher_id = 3;
        $attendance->student_id = 1;
        $attendance->is_present = 1;
        $attendance->save();

        $attendance = new Attendance();
        $attendance->classroom_id = 2;
        $attendance->teacher_id = 3;
        $attendance->student_id = 3;
        $attendance->is_present = 1;
        $attendance->save();

        $attendance = new Attendance();
        $attendance->classroom_id = 2;
        $attendance->teacher_id = 4;
        $attendance->student_id = 1;
        $attendance->is_present = 1;
        $attendance->save();

        $attendance = new Attendance();
        $attendance->classroom_id = 2;
        $attendance->teacher_id = 4;
        $attendance->student_id = 3;
        $attendance->is_present = 1;
        $attendance->save();
        return "Attendance is inserted...";
    }
   
    // Add students and teachers image data in image table using polymorphic relation.
    public function addImage()
    {
       $student = Student::find(2);
        $image =new Image;
        $image->image = "student2_pic.jpg";
        $student->images()->save($image);

        $student = Student::find(3);
        $image =new Image;
        $image->image = "student3_pic.jpg";
        $student->images()->save($image);

        $teacher = Teacher::find(2);
        $image =new Image;
        $image->image = "teacher2_pic.jpg";
        $teacher->images()->save($image);

        $teacher = Teacher::find(4);
        $image =new Image;
        $image->image = "teacher4_pic.jpg";
        $teacher->images()->save($image);

        return "Attendance is inserted...";
    }

     // Add students and teachers subject data in subject and subjectable table using polymorphic relation.
    public function addSubject()
    {
        $student = Student::find(1);
        $subject = new Subject();
        $subject->name = "English";
        $student->subjects()->save($subject);

        $student = Student::find(2);
        $subject = new Subject();
        $subject->name = "Gujarati";
        $student->subjects()->save($subject);
      
        $student = Student::find(1);
        $subject = Subject::find(2);
        $student->subjects()->save($subject);

        $student = Teacher::find(3);
        $subject = Subject::find(1);
        $student->subjects()->save($subject);
      
        $student = Teacher::find(3);
        $subject = Subject::find(2);
        $student->subjects()->save($subject);
      
        $student = Teacher::find(4);
        $subject = Subject::find(1);
        $student->subjects()->save($subject);
      
        $student = Teacher::find(4);
        $subject = new Subject();
        $subject->name = "Maths";
        $student->subjects()->save($subject);
      
        return "Subject is inserted...";
    }
    #endregion
   
    #region display filter data by given id.
    // Returning student and it's classroom data by given student id.
    public function getStudent($id)
    {
        $student = Student::find($id);
        $data="";
        $data .= $student."<br>&nbsp;&nbsp;&nbsp;<hr>Class Rooms Data <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$student->classroom."<br>";
        return $data;
    }

    // Returning classroom and it's students data by given classroom id.
    public function getClassroomStudent($id)
    {
        $classroom = ClassRoom::find($id);
        $data="";
        $data .= "Class Room Name<br>&nbsp;&nbsp;&nbsp;".$classroom."<br>&nbsp;&nbsp;&nbsp;<hr>Students Data <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$classroom->student."<br>";
        return $data;
    }

     // Returning department and it's classroom data by given department id.
    public function getdipartment($id)
    {
        $department = Department::find($id);
        $data="";
        $data .="Department Name<br>&nbsp;&nbsp;&nbsp;".$department."<br>&nbsp;&nbsp;&nbsp;<hr>Class Rooms data <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$department->classrooms."<br>";
        return $data;
    }
    
    // Returning teacher and it's classroom data by given teacher id.
    public function getteacher($id)
    {
        $teacher = Teacher::find($id);
        $data="";
        $data .= "Teacher Name<br>&nbsp;&nbsp;&nbsp;".$teacher."<br>&nbsp;&nbsp;&nbsp;<hr>Class Rooms data <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$teacher->classrooms."<br>";
        return $data;
    }

    // Returning classroom and it's teachers data by given classroom id.
    public function getClassRoomTeacher($id)
    {
        try {
            $classroom = ClassRoom::find($id);
            $data="";
            $data .= $classroom."<br>&nbsp;&nbsp;&nbsp;Teachers data <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$classroom->teachers."<br>";
            return $data;
        } catch (\Throwable $th) {
           return "Oops, wrong...!!";
        }
    }

    // Returning student and it's image data by given student id.
    public function getStudentImage($id)
    {
        try {
            $student = Student::find($id);
            $data="";
            $data .= $student."<br><hr>&nbsp;&nbsp;&nbsp;Images data <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$student->images."<br>";
            return $data;
        } catch (\Throwable $th) {
           return "Oops, wrong...!!";
        }
    }

    // Returning teacher and it's image data by given teacher id.
    public function getTeacherImage($id)
    {
        try {
            $teacher = Teacher::find($id);
            $data="";
            $data .= $teacher."<br><hr>&nbsp;&nbsp;&nbsp;Images data <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$teacher->images."<br>";
            return $data;
        } catch (\Throwable $th) {
           return "Oops, wrong...!!";
        }
    }

     // Returning subject and it's teacher data by given subject id.
    public function getTeacherSubject($id)
    {
        try {
            $subject = Subject::find($id);
            $data="";
            $data .= $subject."<br><hr>&nbsp;&nbsp;&nbsp;Teachers data <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$subject->teachers."<br>";
            return $data;
        } catch (\Throwable $th) {
           return "Oops, wrong...!!";
        }
    }

    // Returning subject and it's student data by given subject id.
    public function getStudentSubject($id)
    {
        try {
            $subject = Subject::find($id);
            $data="";
            $data .= $subject."<br><hr>&nbsp;&nbsp;&nbsp;Students data <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$subject->students."<br>";
            return $data;
        } catch (\Throwable $th) {
           return "Oops, wrong...!!";
        }
    }

     // Returning student and it's subject data by given student id.
     public function getSubjectStudent($id)
     {
         try {
             $student = Student::find($id);
             $data="";
             $data .= $student."<br><hr>&nbsp;&nbsp;&nbsp;Subjects data <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$student->subjects."<br>";
             return $data;
         } catch (\Throwable $th) {
            return "Oops, wrong...!!";
         }
     }
     #endregion
}
