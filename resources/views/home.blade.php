@extends('layouts.main')

@section('content')
    <div class="flex">
        <div>
            @include('layouts.service')
            @include('layouts.service')  
            @include('layouts.service')      
        </div>

        @include('layouts.location')
    </div>
    
   
@endsection