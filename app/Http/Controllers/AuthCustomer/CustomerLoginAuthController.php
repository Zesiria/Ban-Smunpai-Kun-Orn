<?php

namespace App\Http\Controllers\AuthCustomer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\CustomerLoginRequest;
use App\Models\DBConnector;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerLoginAuthController extends Controller
{
    public function __construct()
    {
        $this->guard = "customer";
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(CustomerLoginRequest $request)
    {
        $request->authenticate();

        return redirect('/home');
    }

    public function logout()
    {
        Session::forget('authenticated_user');

        return redirect('/home');
    }
}
