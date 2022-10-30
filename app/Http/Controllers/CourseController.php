<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\DBConnector;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CourseController extends Controller
{
    public function index(){
        $course = new DBConnector();
        return $course->getCourse();
    }

    public function store(Request $request){
        $request->validate([
            'course_name' => ['min:2', 'max:30', 'string', 'required'],
            'course_price' => ['min:0', 'max:9999', 'numberic' , 'required']
        ]);

        $course_name = $request->course_name;
        $course_price = $request->course_price;

        $course = new DBConnector();
        $course->addCourse($course_name, $course_price);
    }

    public function update(Request $request){
        $request->validate([
            'course_id' => ['required'],
            'course_name' => ['min:2', 'max:30', 'string', 'required'],
            'course_price' => ['min:0', 'max:9999', 'numberic', 'required']
        ]);

        $dbConnector = new DBConnector();
        if(!$request->has('course_id'))
            throw new \Exception("No course_id provided.");
        try {
            $course_id = $dbConnector->getCourseById($request->course_id);
        } catch (\Exception) {
            throw new \Exception("This course is not exist.");
        }
        $new_course_name = $request->course_name;
        $new_course_price = $request->course_price;

        $dbConnector->updateCourse($course_id, $new_course_name, $new_course_price);
    }
}
