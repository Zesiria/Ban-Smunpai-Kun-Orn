@extends('layouts.main')

@section('content')
    <div>
        <h1 class="text-center text-4xl mt-10 text-[#8C6B4F] font-bold">ORDER</h1>
        <div class="grid grid-cols-2 mt-10 order">
            <div class="space-y-10 m-10">
                <form method="POST" action="{{ route('service_order.store') }}">
                    @csrf
                    <div>
                        <h1 class="text-white">Course</h1>
                        <select name="course_id" id="cars">
                            @foreach($courses as $course)
                                <option value="{{ $course['course_id'] }}">{{ $course['course_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <h1 class="text-white">Time</h1>
                        <select name="date" id="cars">
                            @foreach($dates as $date)
                                <option value="{{ date("Y-m-d", strtotime($date->date_time)) }}">{{ date("d-m-Y", strtotime($date->date_time)) }}</option>
                            @endforeach
                        </select>
                        <select name="time" id="cars">
                            @foreach($hours as $hour)
                                <option value="{{ $hour . ":00:00" }}">{{ $hour }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <h1 class="text-white">Employee</h1>
                        <select name="employee_id" id="cars">
                            @foreach($employees as $employee)
                                <option value="{{ $employee['employee_id'] }}">{{ $employee['employee_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="text-white submitBtn">
                        <p class="mt-1 mb-1 mr-2 ml-2">ยืนยัน</p>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
