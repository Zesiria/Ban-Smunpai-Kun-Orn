@extends('layouts.main')

@section('content')
    <div>
        <h1 class="text-2xl font-semibold mb-10 text-[#483838]">เปลี่ยนแปลงรายละเอียดวัตถุดิบ</h1>
        <div>
            <form action="post" class="grid grid-cols-2">
                <div>
                    <h1 class="font-bold">ชื่อพนักงาน</h1>
                    <input type="text">
                </div>
                <div>
                    <h1 class="font-bold">Tel.</h1>
                <input type="text">
                </div>
                <div class="m-5">
                    <button type="submit" class="submitButton">
                        <p class="m-2.5 text-white">ยืนยัน</p> 
                    </button>
                </div>
                
            </form>
        </div>
    </div>
@endsection