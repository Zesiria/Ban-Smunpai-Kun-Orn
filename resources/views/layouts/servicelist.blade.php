<div>
    @foreach($courses as $course)
    <div class="flex card m-5">
        <div class="flex justify-end m-5">
            <img class="serviceImage" src="/images/service-1.jpeg" alt="service image" height="" width="250">
        </div>
        <div class="m-5">
            <h1 class="font-bold">Course : {{ $course['course_name'] }}</h1>
            <h1 class="font-bold">รายละเอียด</h1>
            <p>{{ $course['course_description'] }}</p>
            <h1 class="font-bold mt-10">ค่าบริการ {{ $course['course_price'] }} บาท</h1>
        </div>
    </div>
    
    @endforeach
</div>
