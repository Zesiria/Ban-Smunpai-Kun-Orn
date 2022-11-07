@extends('layouts.main')

@section('content')
    <div>
        <h1 class="text-2xl font-semibold mb-10 text-[#483838]">เปลี่ยนแปลงรายละเอียดอุปกรณ์</h1>
        <div>
            <form action="post">
                <h1 class="font-bold">ชื่ออุปกรณ์</h1>
                <input type="text">
                <button type="submit" class="submitButton">
                    <p class="m-2.5 text-white">ยืนยัน</p> </button>
            </form>
        </div>
    </div>
@endsection