@extends('layouts.main')

@section('content')
    <div>
        <h1 class="text-2xl font-bold m-10">บริการทั้งหมด</h1>
        <div>
            @include('layouts.servicelist',['courses' => $courses])
        </div>    
    </div>


@endsection
