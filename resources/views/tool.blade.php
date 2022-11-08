@extends('layouts.main')

@section('content')
    <div>
        <h1 class="text-2xl font-bold mb-10">อุปกรณ์ทั้งหมด</h1>
        {{-- @include('layouts.cardtool',['tools' => $tools]) --}}
    </div>
    <table id="tools">
        <tr>
            <th>ชื่ออุปกรณ์</th>
            <th></th>
        </tr>
        @foreach($tools as $tool)
            <tr>
                <td>{{ $tool['tool_name'] }}</td>
                <td>
                    <a href="/tool/{{$tool['tool_id']}}">แก้ไข</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

<style>
    #tools {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #tools td, #tools th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #tools tr:nth-child(even){background-color: #f2f2f2;}

    #tools tr:hover {background-color: #ddd;}

    #tools th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
