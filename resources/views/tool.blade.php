@extends('layouts.main')

@section('content')
    <div>
        <h1>อุปกรณ์ทั้งหมด</h1>
        @include('layouts.cardtool',['tools' => $tools])
    </div>
@endsection