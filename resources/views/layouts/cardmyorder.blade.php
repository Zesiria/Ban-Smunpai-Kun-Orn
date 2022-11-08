<div>
    @foreach($service_orders as $service_order)
        @if($service_order['status'] == 1)
        <form method="GET" action="{{ redirect('/home') }}">
            <div>
                <h1>รหัส Service_order : {{ $service_order['service_order_id'] }}</h1>
                <h1>Course : {{ $service_order['course_name'] }}</h1>
                <h1>ราคา : {{ $service_order['price'] }}</h1>
                <h1>เวลาที่นัดหมาย : {{ $service_order['date_time'] }}</h1>
                <h1>ถูกสร้างขึ้นเมื่อ : {{ $service_order['created_at'] }}</h1>
                @if($service_order['status'] == 0)
                    <h1>สถานะ : ยกเลิก</h1>
                @elseif($service_order['status'] == 1)
                    <h1>สถานะ : รอมัดจำ</h1>
                @elseif($service_order['status'] == 2)
                    <h1>สถานะ : รอรับบริการ</h1>
                @elseif($service_order['status'] == 3)
                    <h1>สถานะ : ให้บริการ</h1>
                @endif
            </div>
            <div>
                <a href="{{ 'paid-service-order/' . $service_order['service_order_id'] }}">
                    จ่ายเงินมัดจำ
                </a>
                <a href="{{ 'cancel-service-order/' . $service_order['service_order_id'] }}">
                    ยกเลิกจอง
                </a>
            </div>
        </form>
        @elseif($service_order['status'] == 2)
            <form method="GET" action="{{ redirect('/cancel-service-order/'.$service_order['service_order_id']) }}">
                <div>
                    <h1>รหัส Service_order : {{ $service_order['service_order_id'] }}</h1>
                    <h1>Course : {{ $service_order['course_name'] }}</h1>
                    <h1>ราคา : {{ $service_order['price'] }}</h1>
                    <h1>เวลาที่นัดหมาย : {{ $service_order['date_time'] }}</h1>
                    <h1>ถูกสร้างขึ้นเมื่อ : {{ $service_order['created_at'] }}</h1>
                    @if($service_order['status'] == 0)
                        <h1>สถานะ : ยกเลิก</h1>
                    @elseif($service_order['status'] == 1)
                        <h1>สถานะ : รอมัดจำ</h1>
                    @elseif($service_order['status'] == 2)
                        <h1>สถานะ : รอรับบริการ</h1>
                    @elseif($service_order['status'] == 3)
                        <h1>สถานะ : ให้บริการ</h1>
                    @endif
                </div>
                    <a href="{{ 'cancel-service-order/' . $service_order['service_order_id'] }}">
                        ยกเลิกจอง
                    </a>
            </form>
        @endif
    @endforeach
</div>
