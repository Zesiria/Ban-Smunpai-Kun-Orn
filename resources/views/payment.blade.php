@extends('layouts.main')

@section('content')
    <div>
        <h1 class="text-2xl font-bold text-[#8C6B4F]">PAYMENT</h1>
        <div class="">
            <div class="mt-10 mb-10 mr-10 ml-10 paymentIn rounded-xl">
                <div class="text-white space-y-10">
                    <h1 class="text-[#8C6B4F] font-bold text-center text-xl">ข้อมู,ล</h1>
                    <p class="text-[#8C6B4F] font-bold ml-20">ชื่อ: </p>
                    <p class="text-[#8C6B4F] font-bold ml-20">วัน-เวลา: </p>
                    <p class="text-[#8C6B4F] font-bold ml-20">Course: </p>
                    <p class="text-[#8C6B4F] font-bold ml-20">พนักงาน: </p>
                    <p class="text-[#8C6B4F] font-bold ml-20">ราคารวม:</p>
                </div>
                
            </div>   
            <div class="flex justify-center space-x-10">
                <button class="cancelPayBtn text-white">
                    <p class="m-3">ยกเลิก</p>
                </button>
                <button class="submitPayBtn text-white">
                    <p class="m-3">ยืนยัน</p>
                </button>
            </div> 
        </div>
    </div>
@endsection