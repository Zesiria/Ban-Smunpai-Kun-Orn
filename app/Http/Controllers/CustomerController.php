<?php

namespace App\Http\Controllers;

use App\Models\DBConnector;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $dbConnector = new DBConnector();
        return $dbConnector->getCustomer();
    }

    public function store(Request $request){
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

    public function update(Request $request,){
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
}
