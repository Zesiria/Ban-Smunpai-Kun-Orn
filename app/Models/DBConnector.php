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

    public function addCourse($course_name, $course_description, $course_price){
        return DB::insert("INSERT INTO COURSE(course_name, course_description, course_price) VALUES(
        '{$course_name}','{$course_description}',{$course_price})");
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
        $materials = DB::select("SELECT * FROM MATERIAL");
        return json_decode(json_encode($materials), true);
    }

    public function addMaterial($material_name, $quantity, $minimum_value){
        return DB::insert("INSERT INTO MATERIAL(material_name, quantity, minimum_value) VALUES('{$material_name}',{$quantity},{$minimum_value})");
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
        return DB::insert("INSERT INTO TOOL(tool_name) VALUES('{$tool_name}')");
    }

    public function updateTool($tool_id, $tool_name){
        return DB::update("UPDATE TOOL SET tool_name='{$tool_name}' WHERE tool_id = {$tool_id}");
    }

    public function getToolById($id){
        $tools = DB::select('SELECT tool_id FROM TOOL WHERE tool_id = ' . $id);
        $tools = json_decode(json_encode($tools), true);
        return implode("",$tools[0]);
    }

    public function getCustomer(){
        $customers = DB::select("SELECT * FROM CUSTOMER");
        return json_decode(json_encode($customers),true);
    }

    public function addCustomer($customer_name, $email, $password, $phone_number){
        if(DB::insert("INSERT INTO CUSTOMER(customer_name, email, password, phone_number) VALUES('{$customer_name}','{$email}','{$password}','{$phone_number}')")){
            return Customer::all()->where('email', $email)->first();
        }
        return false;
    }

    public function updateCustomer($customer_id, $customer_name, $email, $password, $phone_number){
        return DB::update("UPDATE CUSTOMER SET customer_name='{$customer_name}',
                email='{$email}', password='{$password}', phone_number='{$phone_number}'
                WHERE customer_id = {$customer_id}");
    }

    public function getEmployee(){
        $employees = DB::select("SELECT * FROM EMPLOYEE");
        return json_decode(json_encode($employees), true);
    }

    public function addEmployee($employee_name, $email, $phone_number){
        return DB::insert("INSERT INTO EMPLOYEE(employee_name, email, phone_number) VALUES('{$employee_name}','{$email}','{$phone_number}')");
    }

    public function updateEmployee($employee_id, $employee_name, $email, $phone_number){
        return DB::update("UPDATE EMPLOYEE SET employee_name='{$employee_name}',
                email='{$email}', phone_number='{$phone_number}'
                WHERE employee_id = {$employee_id}");
    }

    public function getTime(){
        $time = new Time();
        $time->fetchTable();
        $times = DB::select("SELECT * FROM TIME WHERE date_time > CURDATE()+1");
        return json_decode(json_encode($times),1);
    }

    public function addTime($date_time){
        return DB::insert("INSERT INTO TIME(date_time) VALUE('{$date_time}')");
    }

    public function findTime($date_time){
        return DB::select("SELECT * FROM TIME WHERE date_time LIKE '{$date_time}' LIMIT 1");
    }

    public function getServiceOrder(){
        $serviceOrders = DB::select("SELECT * FROM SERVICE_ORDER");
        return json_decode(json_encode($serviceOrders),1);
    }

    public function addServiceOrder($customer_id, $course_id, $employee_id, $price, $date_time){
        return DB::insert("INSERT INTO SERVICE_ORDER(customer_id, course_id, employee_id, price, date_time)
        VALUES({$customer_id},{$course_id},{$employee_id},{$price},'{$date_time}')");
    }

    public function updateServiceOrder($service_order_id, $customer_id, $course_id, $employee_id, $price, $date_time){
        return DB::update("UPDATE SERVICE_ORDER SET customer_id = {$customer_id}, course_id = {$course_id},
                                employee_id = {$employee_id}, price ={$price}, date_time = '{$date_time}'
                                WHERE service_order_id = {$service_order_id}");
    }

    public function updateStatusServiceOrder($service_order_id, $status){
        return DB::update("UPDATE SERVICE_ORDER SET status = {$status} WHERE service_order_id = {$service_order_id}");
    }

    // Pivot Table
    public function getQueue(){
        $queues = DB::select("SELECT * FROM QUEUE");
        return json_decode(json_encode($queues),1);
    }

    public function addQueue($employee_id, $date_time){
        return DB::insert("INSERT INTO QUEUE(employee_id, date_time) VALUES
                                ({$employee_id},'{$date_time}')");
    }

    public function updateQueue($date_time, $employee_id, $status){
        return DB::update("UPDATE QUEUE SET is_cancel = {$status} WHERE date_time = '{$date_time}' AND employee_id = {$employee_id}");
    }

    public function getEmployeeUsed(){
        $employeeUses = DB::select("SELECT * FROM EMPLOYEE_USED");
        return json_decode(json_encode($employeeUses),1);
    }

    public function addEmployeeUsed($employee_id, $material_id, $quantity){
        return DB::insert("INSERT INTO EMPLOYEE_USED(employee_id, material_id, quantity) VALUES
                                ({$employee_id},{$material_id},{$quantity})");
    }

    public function updateEmployeeUsed($employee_id, $material_id, $quantity){
        return DB::update("UPDATE EMPLOYEE_USED SET
                                        quantity = {$quantity} WHERE
                                                     employee_id = {$employee_id} AND material_id = {$material_id}");
    }

    public function getEmployeeRequired(){
        $employeeRequires = DB::select("SELECT * FROM EMPLOYEE_REQUIRED");
        return json_decode(json_encode($employeeRequires),1);
    }
    public function addEmployeeRequired($employee_id, $tool_id){
        return DB::insert("INSERT INTO EMPLOYEE_REQUIRED(employee_id, tool_id) VALUES
                                ({$employee_id},{$tool_id})");
    }

    public function getCourseUsed(){
        $courseUses = DB::select("SELECT * FROM COURSE_USED");
        return json_decode(json_encode($courseUses),1);
    }
    public function addCourseUsed($course_id, $material_id, $quantity){
        return DB::insert("INSERT INTO COURSE_USED(course_id, material_id, quantity) VALUES
                                ({$course_id},{$material_id},{$quantity})");
    }
    public function updateCourseUsed($course_id, $material_id, $quantity){
        return DB::update("UPDATE COURSE_USED SET
                                        quantity = {$quantity} WHERE
                                                     course_id = {$course_id} AND material_id = {$material_id}");
    }
    public function getCourseRequired(){
        $courseRequires = DB::select("SELECT * FROM COURSE_REQUIRED");
        return json_decode(json_encode($courseRequires),1);
    }
    public function addCourseRequired($course_id, $tool_id){
        return DB::insert("INSERT INTO COURSE_REQUIRED(course_id, tool_id) VALUES
                                ({$course_id},{$tool_id})");
    }

    public function getFreeEmployee($date_time){
        $employees = DB::select("Select * FROM EMPLOYEE where employee_id not in
        (SELECT employee_id from QUEUE where QUEUE.date_time in '{$date_time}') OR
        employee_id in (SELECT employee_id FROM QUEUE WHERE QUEUE.date_time = '{$date_time}' AND QUEUE.is_cancel = 1)
        ");
        return json_decode(json_encode($employees),1);
    }
}
