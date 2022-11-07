<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\DBConnector;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $connector = new DBConnector();
        return view('service', ['courses' => $connector->getCourse()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => ['min:2', 'max:30', 'string', 'required'],
            'course_price' => ['min:0', 'max:9999', 'numberic' , 'required']
        ]);

        $course_name = $request->course_name;
        $course_price = $request->course_price;

        $course = new DBConnector();
        $course->addCourse($course_name, $course_price);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dbConnector = new DBConnector();
        $courses = $dbConnector->getCourse();

        return $courses[$id];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => ['required', 'exists:courses'],
            'course_name' => ['min:2', 'max:30', 'string', 'required'],
            'course_price' => ['min:0', 'max:9999', 'numberic', 'required']
        ]);

        $dbConnector = new DBConnector();
        if(!$request->has('course_id') || $request->course_id != $id)
            throw new \Exception("No course_id provided.");

        $course_id = $request->course_id;
        $new_course_name = $request->course_name;
        $new_course_price = $request->course_price;

        if($course_id != $id){
            return response()->json([
                "success" => false
            ]);
        }


        $dbConnector->updateCourse($course_id, $new_course_name, $new_course_price);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
