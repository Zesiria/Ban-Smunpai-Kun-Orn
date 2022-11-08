@extends('layouts.main')

@section('content')
    <div>
        <h1 class="text-2xl font-bold">คิวการให้บริการ</h1>
        <h1>คิวการให้บริการ</h1>
        @if(Session::get('role_user') == 'Customer')
            @include('layouts.cardmyorder',['service_orders' => $service_orders])
        @elseif(Session::get('role_user') == 'Manager')
            @include('layouts.cardserviceorder',['service_orders' => $service_orders])
        @else
        {{ redirect('/home') }}
        @endif
    </div>
@endsection
