<?php

namespace App\Http\Controllers;

use App\Models\DBConnector;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time = new Time();
        $time->fetchTable();
        $connector = new DBConnector();
        $course = $connector->getCourse();
        $times = Time::all()->where('date_time', '>', now()->startOfDay()->addDay())->where('date_time', '<=', now()->startOfDay()->addDays(6));
        $dates = array();
        $hours = array();
        foreach ($times as $time){
            if(!in_array($time, $dates)){
                $dates[] = $time;
            }
        }
        for ($j = 8;$j < 16;$j++) {
            if ($j == 12) {
                continue;
            }
//            $hour = str_pad("".$j,"2","0",STR_PAD_LEFT);
            $hours[] = $j;
        }

        $employee = $connector->getEmployee();
        return view('order',['courses' => $course,
            'dates' => $dates,
            'hours' => $hours,
            'employees' => $employee]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
