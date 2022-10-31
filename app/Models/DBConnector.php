<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DBConnector extends Model
{
    use HasFactory;

    public function getCourse(){
        $courses = DB::select("SELECT * FROM COURSE");
        return json_decode(json_encode($courses), true);
    }

    public function addCourse($course_name, $course_price){
        return DB::insert("INSERT INTO COURSE(course_name, course_price) VALUES(
        {$course_name},{$course_price})");
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

    public function getMaterial(){
        $materials = DB::select("SELECT * FROM Material");
        return json_decode(json_encode($materials), true);
    }

    public function addMaterial($material_name, $quantity, $minimum_value){
        return DB::insert("INSERT INTO MATERIAL(material_name, quantit, minimum_value) VALUES({$material_name},{$quantity},{$minimum_value})");
    }

    public function updateMaterial($material_id, $material_name, $quantity, $minimum_value){
        return DB::update("UPDATE MATERIAL SET material_name = '{$material_name}', quantity = {$quantity}, minimum_value = {$minimum_value} WHERE material_id = {$material_id}");
    }

    public function getMaterialById($id){
        $materials = DB::select('SELECT material_id FROM MATERIAL WHERE material_id = ' . $id);
        $materials = json_decode(json_encode($materials), true);
        return implode("",$materials[0]);
    }

    public function getTool(){
        $tools = DB::select("SELECT * FROM TOOL");
        return json_decode(json_encode($tools), true);
    }

    public function addTool($tool_name){
        return DB::insert("INSERT INTO TOOL(tool_name) VALUES({$tool_name})");
    }

    public function updateTool($tool_id, $tool_name){
        return DB::update("UPDATE TOOL SET tool_name={$tool_name} WHERE tool_id = $tool_id");
    }

    public function getToolById($id){
        $tools = DB::select('SELECT tool_id FROM TOOL WHERE tool_id = ' . $id);
        $tools = json_decode(json_encode($tools), true);
        return implode("",$tools[0]);
    }

    

}
