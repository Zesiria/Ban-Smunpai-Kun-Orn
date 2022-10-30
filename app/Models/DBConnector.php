<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DBConnector extends Model
{
    use HasFactory;

    public function getCourse(){
        return DB::select('select * from COURSE');
    }

    public function addCourse($course_name, $course_price){
        return DB::insert('INSERT INTO COURSE VALUES
                       (' . $course_name . ',' . $course_price . ')');
    }

    public function getCourseById($id){
        $courses = DB::select('SELECT course_id FROM COURSE WHERE course_id = ' . $id);
        $courses = json_decode(json_encode($courses), true);
        return implode("",$courses[0]);
    }

    public function updateCourse($course_id, $course_name, $course_price){

        DB::update("UPDATE COURSE SET course_name = '{$course_name}',
        course_price = {$course_price} WHERE course_id = {$course_id}");
        return "Successfully saved.";
    }
}
