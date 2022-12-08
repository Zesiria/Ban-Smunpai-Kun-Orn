@extends('layouts.main')

@section('content')
    <div class="grid grid-cols-2 m-10">
        <div class="grid grid-col-1 space-y-2 text-xl">
            <a href="/menu_add/employee">
                <button class="addButton ">
                    <p class="text-white m-2">พนักงาน</p>
                </button>
            </a>
            <a href="/menu_add/tool">
                <button class="addButton ">
                    <p class="text-white m-2">อุปกรณ์</p>
                </button>
            </a>
            <a href="/menu_add/material">
                <button class="addButton ">
                    <p class="text-white m-2">วัตถุดิบ</p>
                </button>
            </a>
            <a href="/menu_add/course">
                <button class="addButton ">
                    <p class="text-white m-2">บริการ</p>
                </button>
            </a>
        </div>
        
        <div class="space-y-5 text-xl">
            <div>
                @if($mode == "employee")
                    @include('layouts.addemployee')
            </div>
            <div>
                @elseif($mode == "tool")
                    @include('layouts.addtool')
            </div>
            <div>
                @elseif($mode == "material")
                    @include('layouts.addmaterial')
            </div>
            <div>
                @elseif($mode == "course")
                    @include('layouts.addcourse')
            </div>
        </div>
        
        
        
        
        @endif
        
    </div>
@endsection
