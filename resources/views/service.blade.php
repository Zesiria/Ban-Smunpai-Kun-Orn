@extends('layouts.main')

@section('content')
    <div>
        <h1 class="text-center text-2xl font-bold">Course</h1>
        @include('layouts.servicelist',['courses' => $courses])
    </div>


@endsection
