@extends('layouts.main')

{{-- @section('content')
    @foreach($employees as $employee)
    <div class="space-y-10 mt-5">
        @include('layouts.cardemployee',['employee' => $employee])
    </div>
    @endforeach

@endsection --}}


@section('content')
    <h1 class="text-2xl font-bold m-10">พนักงาน</h1>
    <table id="employees_id">
    @if(Session::get('authenticated_user') && Session::get('role_user') == 'Customer')
        <div>
            @foreach($employees as $employee)
                <div class="flex m-5 card">
                    <img class="rounded-full" src="images/employee.jpeg" alt="profile" height="" width="150" >
                    <div class="my-auto text-xl font-semibold ml-10">
                        <div class="flex">
                            <h1>Name :</h1>
                            <p>{{$employee['employee_name'] }}</p>
                        </div>
                        <div class="flex">
                            <h1>Email :</h1>
                            <p>{{$employee['email']}}</p>
                        </div>
                        <div class="flex space-x-2">
                            <h1>Tel. :</h1>
                            <p>{{$employee['phone_number']}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    @else
        <div>
            @foreach($employees as $employee)
                <div class=" m-5 card">
                    <div class="flex flex-between">
                        <img class="rounded-full" src="images/employee.jpeg" alt="profile" height="" width="150" >
                        <div class="my-auto text-xl font-semibold ml-10">
                        <div class="flex">
                            <h1>Name :</h1>
                            <p>{{$employee['employee_name'] }}</p>
                        </div>
                        <div class="flex">
                            <h1>Email :</h1>
                            <p>{{$employee['email']}}</p>
                        </div>
                        <div class="flex space-x-2">
                            <h1>Tel. :</h1>
                            <p>{{$employee['phone_number']}}</p>
                        </div>
                        <div class="my-auto text-center m-10 canButton mt-2">
                            <div class="mr-4 ml-4">
                                <a href="/editemployee/{{$employee['employee_id']}}">แก้ไข</a>
                            </div>
                        </div>
                        </div>
                    </div>    
                </div>
            </div>
                
                
            @endforeach
        </div>

    @endif
@endsection