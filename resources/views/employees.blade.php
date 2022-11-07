@extends('layouts.main')

@section('content')
    @foreach($employees as $employee)
    <div class="space-y-10 mt-5">
        @include('layouts.cardemployee',['employee' => $employee])
    </div>
    @endforeach

@endsection
