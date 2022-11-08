@extends('layouts.main')

{{-- @section('content')
    @foreach($employees as $employee)
    <div class="space-y-10 mt-5">
        @include('layouts.cardemployee',['employee' => $employee])
    </div>
    @endforeach

@endsection --}}


@section('content')
    <h1 class="text-2xl font-bold mb-10">พนักงาน</h1>
    <table id="employees_id">
        <tr>
            <th>ชื่อพนักงาน</th>
            <th>Email</th>
            <th>Tel.</th>
            <th></th>
        </tr>
        @foreach($employees as $employee)
            <tr >
                <td>{{ $employee['employee_name'] }}</td>
                <td>{{$employee['email']}}</td>
                <td>{{$employee['phone_number']}}</td>
                <td>
                    <a href="/employee/{{$employee['employee_id']}}">แก้ไข</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

<style>
    #employees_id {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #employees_id td, #employees_id th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #employees_id tr:nth-child(even){background-color: #f2f2f2;}

    #employees_id tr:hover {background-color: #ddd;}

    #employees_id th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
