<div class="order-inherit m-5">
    @foreach($service_orders as $service_order)
    <div class="card flex m-5">
        <div>
            <img class="rounded-full" src="images/wait.jpeg" alt="profile" height="" width="150" >
        </div>
        <div>
            <form class="" method="GET" action="">
                <div class="m-5">
                    <div>
                        <h1>รหัส Service_order : {{ $service_order['service_order_id'] }}</h1>
                        <h1>Course : {{ $service_order['course_name'] }}</h1>
                        <h1>ราคา : {{ number_format($service_order['price']) }}</h1>
                        <h1>เวลาที่นัดหมาย : {{ date("d-m-Y", strtotime($service_order['date_time'])) }}</h1>
                        <h1>จองเมื่อ : {{ date("d-m-Y", strtotime($service_order['created_at'])) }}</h1>
                        @if($service_order['status'] == 0)
                        <h1 class="flex">สถานะ : <p class="text-[#D10000]">ยกเลิก</p></h1>
                        @elseif($service_order['status'] == 1)
                        <h1 class="flex">สถานะ :<p class="text-[#5C5CFF]">รอมัดจำ</p></h1>
                        @elseif($service_order['status'] == 2)
                        <h1 class="flex">สถานะ : <p class="text-[#5C5CFF]">รอรับบริการ</p></h1>
                        @elseif($service_order['status'] == 3)
                        <h1 class="flex">สถานะ : <p class="text-[#5C5CFF]">ให้บริการ</p></h1>
                        @endif
                    </div>
                    <div>
                        @if($service_order['status'] == 2)
                        <div>
                            <a href="{{ '/done-service-order/'.$service_order['service_order_id'] }}"
                               type="submit" class="submitButton text-white">ให้บริการ
                            </a>
                        </div>
                        @endif   
                    </div>
                    
                </div>    
             </form>
        </div>
        
    </div>
        
    @endforeach
</div>
