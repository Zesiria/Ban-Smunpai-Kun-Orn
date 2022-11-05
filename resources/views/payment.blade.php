@extends('layouts.main')

@section('content')
    <div>
        <h1 class="text-2xl font-bold text-[#8C6B4F]">PAYMENT</h1>
        <div class="payment">
            <div class="mt-10 mb-10 mr-10 ml-10 paymentIn">
                <div class="text-white bg-white rounded-xl">
                    <h1 class="text-[#8C6B4F] font-bold text-center text-xl">Detail</h1>
                    <p class="text-[#8C6B4F] font-bold ml-20">Name: </p>
                    <p class="text-[#8C6B4F] font-bold ml-20">Date Time: </p>
                    <p class="text-[#8C6B4F] font-bold ml-20">Course: </p>
                    <p class="text-[#8C6B4F] font-bold ml-20">Employee: </p>
                    <p class="text-[#8C6B4F] font-bold ml-20">Total Price:</p>
                </div>
                <div class="flex justify-center space-x-10 bg-[#617320]">
                    <button class="cancelPayBtn text-[#617320]">Cancel</button>
                    <button class="submitPayBtn text-white">Summit</button>
                </div>
            </div>    
        </div>
    </div>
@endsection