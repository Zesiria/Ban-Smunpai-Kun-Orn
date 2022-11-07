@extends('layouts.main')

@section('content')
    <div>
        <select name="cars" id="type">
            <option value="null">เลือกประเภท</option>
            <option value="employee">พนักงาน</option>
            <option value="tool">อุปกรณ์</option>
            <option value="material">วัตถุดิบ</option>
            <option value="course">บริการ</option>
          </select>
    </div>
@endsection 