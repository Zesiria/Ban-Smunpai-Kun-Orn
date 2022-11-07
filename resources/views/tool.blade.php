@extends('layouts.main')

@section('content')
    <div>
        <h1>อุปกรณ์</h1>
    </div>
    @foreach($tools as $tool)
        {{ $tool['tool_name'] }}
    @endforeach
@endsection
