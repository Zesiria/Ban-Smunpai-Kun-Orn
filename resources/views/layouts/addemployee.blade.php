<div>
    <form method="POST" action="{{ route('employee.store')  }}">
    @csrf
        <div class="flex">
            <h1>Name :</h1>
            <input type="text" id="employee_name" name="employee_name">
        </div>

        <div class="flex">
            <h1>Email :</h1>
            <input type="text" id="email" name="email">
        </div>

        <div class="flex">
            <h1>Tel :</h1>
            <input type="text" id="phone_number" name="phone_number">
        </div>

        <button type="submit">เพิ่มพนักงาน</button>
    </form>
    {{ $errors->first() }}
</div>
