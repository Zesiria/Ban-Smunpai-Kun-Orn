@extends('layouts.main')

@section('content')
    <div>
        <a href="/menu_add/employee">พนักงาน</a>
        <a href="/menu_add/tool">อุปกรณ์</a>
        <a href="/menu_add/material">วัตถุดิบ</a>
        <a href="/menu_add/course">บริการ</a>
        @if($mode == "employee")
            @include('layouts.addemployee')
        @elseif($mode == "tool")
            @include('layouts.addtool')
        @elseif($mode == "material")
            @include('layouts.addmaterial')
        @elseif($mode == "course")
            @include('layouts.addcourse')
        @endif
    </div>
@endsection
