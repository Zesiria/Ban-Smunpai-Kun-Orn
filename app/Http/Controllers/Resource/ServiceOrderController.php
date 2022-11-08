<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\DBConnector;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbConnector = new DBConnector();
        if(Session::get('role_user') == 'Customer'){
            return view('serviceorder', ['service_orders' => $dbConnector->getServiceOrderByCustomerId(Session::get('authenticated_user')->customer_id)]);
        }
        if(Session::get('role_user') == 'Manager'){
            return view('serviceorder', ['service_orders' => $dbConnector->getServiceOrder()]);
        }
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
            'employee_id' => ['required','exists:EMPLOYEE'],
            'course_id' => ['required','exists:COURSE'],
            'date_time' => ['required','exists:TIME']
        ]);

        $customer_id = Session::get('authenticated_user')->customer_id;
        $course_name = Course::all()->where('course_id', '=', $request->course_id)->first()->course_name;
        $employee_id = $request->employee_id;
        $price = Course::all()->where('course_id', '=', $request->course_id)->first()->course_price;
        $date_time = $request->date_time;

        $dbConnector = new DBConnector();
        $dbConnector->addServiceOrder($customer_id,$course_name,$employee_id,$price,$date_time);

        $dbConnector->addQueue($employee_id,$date_time);

        return redirect('/service_order');
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
        $service_orders = $dbConnector->getServiceOrder();

        return $service_orders[$id];
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
            'service_order_id' => ['required', 'exists:service_orders'],
            'customer_id' => ['required','exists:customers'],
            'employee_id' => ['required','exists:employees'],
            'course_id' => ['required','exists:courses'],
            'price' => ['min:0', 'max:9999', 'numberic', 'required'],
            'date_time' => ['required','exists:times']
        ]);

        $service_order_id = $request->service_order_id;
        $customer_id = $request->customer_id;
        $course_id = $request->course_id;
        $employee_id = $request->employee_id;
        $price = $request->price;
        $date_time = $request->date_time;

        if($service_order_id != $id){
            return response()->json([
                "success" => false
            ]);
        }

        $dbConnector = new DBConnector();
        $dbConnector->updateServiceOrder($service_order_id, $customer_id, $course_id,$employee_id,$price,$date_time);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function paidServiceOrder($id){
        $user = Session::get('authenticated_user');
        if($user != null){
            $serviceOrder = ServiceOrder::all()->where('service_order_id','=', $id)->first();
            if($serviceOrder->customer_id == $user->customer_id) {
                $connector = new DBConnector();
                $connector->updateStatusServiceOrder($serviceOrder->service_order_id, 2);
                return redirect('/service_order');
            }
        }
    }

    public function cancelServiceOrder($id){
        $user = Session::get('authenticated_user');
        if($user != null){
            $serviceOrder = ServiceOrder::all()->where('service_order_id','=', $id)->first();
            if($serviceOrder->customer_id == $user->customer_id) {
                $serviceOrder->status = 0;
                $connector = new DBConnector();
                $connector->updateStatusServiceOrder($serviceOrder->service_order_id, 0);
                $connector->updateQueue($serviceOrder->date_time, $serviceOrder->employee_id, 1);
                return redirect('/service_order');
            }
        }
    }

    public function doneServiceOrder($id){
        $serviceOrder = ServiceOrder::all()->where('service_order_id','=', $id)->first();
        if(Session::get('role_user') == 'Manager' && $serviceOrder->status != 3) {
            $connector = new DBConnector();
            $connector->updateStatusServiceOrder($serviceOrder->service_order_id, 3);
            return redirect('/service_order');
        }
    }
}
