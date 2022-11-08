@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold mb-10">วัตถุดิบ</h1>
    <table id="material_id">
        <tr>
            <th>ชื่อวัตถุดิบ</th>
            <th>จำนวน</th>
            <th>ขั้นต่ำ</th>
            <th></th>
        </tr>
        @foreach($materials as $material)
            <tr >
                <td>{{ $material['material_name'] }}</td>
                <td>{{$material['quantity']}}</td>
                <td>{{$material['minimum_value']}}</td>
                <td>
                    <a href="/marterial/{{$material['material_id']}}">แก้ไข</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

<style>
    #material_id {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #material_id td, #material_id th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #material_id tr:nth-child(even){background-color: #f2f2f2;}

    #material_id tr:hover {background-color: #ddd;}

    #material_id th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
