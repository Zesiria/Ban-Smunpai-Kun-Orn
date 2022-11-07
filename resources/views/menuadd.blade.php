@extends('layouts.main')

@section('content')
    <div>
        <select name="type" id="type">
            <option $value="null">เลือกประเภท</option>
            <option $value="employee">พนักงาน</option>
            <option $value="tool">อุปกรณ์</option>
            <option $value="material">วัตถุดิบ</option>
            <option $value="course">บริการ</option>
          </select>
        @if($value == "employee")
            @include('layouts.addemployee')
        @elseif($value == "tool")
            @include('layouts.addtool')
        @elseif($value == "material")
            @include('layouts.addmaterial')
        @else
            @include('layouts.addcourse')
        @endif
    </div>
@endsection 