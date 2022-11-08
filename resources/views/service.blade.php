@extends('layouts.main')

@section('content')
    <div>
        <h1 class="text-2xl font-bold mb-10">บริการทั้งหมด</h1>
        
        @include('layouts.servicelist',['courses' => $courses])
    </div>


@endsection
