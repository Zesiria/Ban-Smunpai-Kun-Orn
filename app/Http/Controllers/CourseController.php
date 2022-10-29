<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $course = new Course();
        $courses = $course->getCourse();
        return array_column($courses,'course_id');
    }
}
