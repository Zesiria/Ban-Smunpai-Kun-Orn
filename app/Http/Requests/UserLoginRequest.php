<?php

namespace App\Http\Requests;

use App\Models\Customer;
use App\Models\Manager;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate()
    {
        $customer = Customer::all()->where('email', '=',$this->get('email'))->first();
        $manager = Manager::all()->where('email','=',$this->get('email'))->first();
        if($customer != null && $customer->password == $this->get('password')){
            Session::put('authenticated_user', $customer);
            Session::put('role_user', 'Customer');
        }
        else if($manager != null && $manager->password == $this->get('password')){
            Session::put('authenticated_user', $manager);
            Session::put('role_user', 'Manager');
        }
        else{
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

    }
}
