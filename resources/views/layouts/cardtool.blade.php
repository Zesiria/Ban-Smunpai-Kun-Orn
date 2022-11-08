<div class="flex justify-start">
    {{-- <img class="serviceImage" src="/images/service-1.jpeg" alt="service image" height="" width="150"> --}}
    <div class="m-10">
        @foreach($tools as $tool)
            <h1>{{$tool['tool_name']}}</h1>
        @endforeach
    </div>
</div>