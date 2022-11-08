@extends('layouts.main')

@section('content')
    <div>
        <h1>คิวการให้บริการ</h1>
        @include('layouts.cardserviceorder',['service_orders' => $service_orders])
    </div>
@endsection
