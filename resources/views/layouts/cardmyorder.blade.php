<div  class="flex justify-center">
    <div>
        @foreach($service_orders as $service_order)
        @if($service_order['status'] == 1)
        <form class="grid grid-cols-2 card m-5" method="GET" action="{{ redirect('/home') }}">
            <div class="m-5 text-xl font-semibold text-[#483838]">
                {{-- <h1>รหัส Service_order : {{ $service_order['service_order_id'] }}</h1> --}}
                <h1>Course : {{ $service_order['course_name'] }}</h1>
                <h1>ราคา : {{ number_format($service_order['price']) }} บาท</h1>
                <h1>เวลาที่นัดหมาย : {{ $service_order['date_time'] }}</h1>
                <h1>จองเมื่อ : {{ $service_order['created_at'] }}</h1>
                @if($service_order['status'] == 0)
                    <h1>สถานะ : <p class="text-[#D10000]">ยกเลิก</p></h1>
                @elseif($service_order['status'] == 1)
                    <h1 class="flex">สถานะ :<p class="text-[#5C5CFF]">รอมัดจำ</p></h1>
                @elseif($service_order['status'] == 2)
                    <h1>สถานะ : <p class="text-[#5C5CFF]">รอรับบริการ</p></h1>
                @elseif($service_order['status'] == 3)
                    <h1>สถานะ : ให้บริการ</h1>
                @endif
            </div>
            <div class="flex justify-end font-bold">
                <div class="my-auto w-5/12">
                    <a href="{{ 'paid-service-order/' . $service_order['service_order_id'] }}">
                        <div class="text-center">
                            <p class="text-white m-6 accButton">จ่ายเงินมัดจำ</p>
                        </div>
                    </a>
                
                    <a href="{{ 'cancel-service-order/' . $service_order['service_order_id'] }}">
                        <div class="text-center">
                            <p class="text-white m-6 canButton">ยกเลิกจอง</p>
                        </div>
                    </a>
                </div>
                
            </div>
        </form>
        @elseif($service_order['status'] == 2)
        <div>
            <div>
                <form class="grid grid-cols-2 card m-5" method="GET" action="{{ redirect('/cancel-service-order/'.$service_order['service_order_id']) }}">
                    <div class="m-5 text-xl font-semibold text-[#483838]">
                        {{-- <h1>รหัส Service_order : {{ $service_order['service_order_id'] }}</h1> --}}
                        <h1>Course : {{ $service_order['course_name'] }}</h1>
                        <h1>ราคา : {{ $service_order['price'] }} บาท</h1>
                        <h1>เวลาที่นัดหมาย : {{ $service_order['date_time'] }}</h1>
                        <h1>จองเมื่อ : {{ $service_order['created_at'] }}</h1>
                        @if($service_order['status'] == 0)
                            <h1>สถานะ : ยกเลิก</h1>
                        @elseif($service_order['status'] == 1)
                            <h1>สถานะ : รอมัดจำ</h1>
                        @elseif($service_order['status'] == 2)
                            <h1 class="flex">สถานะ : <p class="text-[#42855B]">รอรับบริการ</p></h1>
                        @elseif($service_order['status'] == 3)
                            <h1>สถานะ : ให้บริการ</h1>
                        @endif
                    </div>
                    <div class="flex justify-end">
                        <div class="my-auto w-5/12">
                            <a href="{{ 'cancel-service-order/' . $service_order['service_order_id'] }}">
                                <div class="text-center">
                                    <p class="text-white m-6 canButton">ยกเลิกจอง</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    
                </form> 
            </div>
        </div>
        
            
        @endif
        @endforeach
    </div>
</div>
