@extends('layouts.main')

@section('content')
    <div>
        <h1>วัตถุดิบ</h1>
    </div>
    @foreach($materials as $material)
        {{ $material['material_name'] }}
        {{ $material['quantity'] }}
        {{ $material['minimum_value'] }}
    @endforeach
@endsection
