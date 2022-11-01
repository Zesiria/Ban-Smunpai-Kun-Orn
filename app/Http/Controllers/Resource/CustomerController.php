<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\DBConnector;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbConnector = new DBConnector();
        return $dbConnector->getCustomer();
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
            'customer_name' => ['min:2', 'max:30', 'string', 'required'],
            'password' => ['min:2', 'max:20', 'string' , 'required'],
            'email' => ['min:5','email','max:30','required','string'],
            'phone_number' => ['string','required'],
        ]);

        $customer_name = $request->customer_name;
        $email = $request->email;
        $password = $request->password;
        $phone_number = $request->phone_number;

        $dbConnector = new DBConnector();
        $dbConnector->addCustomer($customer_name, $email, $password, $phone_number);
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
        $customers = $dbConnector->getCustomer();

        return $customers[$id];
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
            'customer_id' => ['exists:customers'],
            'customer_name' => ['min:2', 'max:30', 'string', 'required'],
            'password' => ['min:2', 'max:20', 'string' , 'required'],
            'email' => ['min:5','email','max:30','required','string'],
            'phone_number' => ['string','required'],
        ]);

        $customer_id = $request->customer_id;
        $customer_name = $request->customer_name;
        $email = $request->email;
        $password = $request->password;
        $phone_number = $request->phone_number;

        $dbConnector = new DBConnector();
        $dbConnector->updateCustomer($customer_id, $customer_name, $email, $password, $phone_number);

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
