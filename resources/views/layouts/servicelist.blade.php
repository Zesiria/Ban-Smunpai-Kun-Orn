<div>
    @foreach($courses as $course)
    <div class="flex">
        <div class="flex justify-end m-5">
            <img class="serviceImage" src="/images/service-1.jpeg" alt="service image" height="" width="250">
        </div>
        <div class="m-5">
            <h1>{{ $course['course_name'] }}</h1>
            <p> {{ $course['course_description'] }} </p>
            <h1>{{ $course['course_price'] }} บาท</h1>
        </div>
    </div>
    @endforeach
</div>
