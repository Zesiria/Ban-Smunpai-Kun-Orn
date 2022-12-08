<div>
    <div class="flex justify-start">
        <img class="serviceImage" src="/images/service-1.jpeg" alt="service image" height="" width="150">
        <div class="m-10">
            <h1>ชื่อ: {{ $employee['employee_name'] }}</h1>
            <h1>Email: {{ $employee['email'] }}</h1>
            <h1>Tel: {{ $employee['phone_number'] }}</h1>
        </div>
    </div>
</div>

{{-- @foreach($emplyees['data'] as $employee)
<div class="grid grid-cols-2">
    <div class="flex justify-center">
        <img class="serviceImage" src="/images/service-1.jpeg" alt="service image" height="" width="150">
    </div>
    <div>
        <h1>: {{$employee['name']}}</h1>
        <h1>Email: </h1>
        <h1>Tel: </h1>
    </div>
</div>
@endforeach --}}
