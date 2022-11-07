<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\DBConnector;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbConnector = new DBConnector();
        return view('employees',[ 'employees' => $dbConnector->getEmployee()]);
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
            'employee_name' => ['min:2', 'max:30', 'string', 'required'],
            'password' => ['min:2', 'max:20', 'string' , 'required'],
            'email' => ['min:5','email','max:30','required','string'],
            'phone_number' => ['string','required'],
        ]);

        $employee = $request->employee_name;
        $email = $request->email;
        $password = $request->password;
        $phone_number = $request->phone_number;

        $dbConnector = new DBConnector();
        $dbConnector->addEmployee($employee, $email, $password, $phone_number);
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
        $employees = $dbConnector->getEmployee();
        return $employees[$id];
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
            'employee_id' => ['exists:employees'],
            'employee_name' => ['min:2', 'max:30', 'string', 'required'],
            'password' => ['min:2', 'max:20', 'string' , 'required'],
            'email' => ['min:5','email','max:30','required','string'],
            'phone_number' => ['string','required'],
        ]);

        $employee_id = $request->employee_id;
        $employee_name = $request->employee_name;
        $email = $request->email;
        $password = $request->password;
        $phone_number = $request->phone_number;

        if($employee_id != $id){
            return response()->json([
                "success" => false
            ]);
        }

        $dbConnector = new DBConnector();
        $dbConnector->updateEmployee($id, $employee_name, $email, $password, $phone_number);
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
