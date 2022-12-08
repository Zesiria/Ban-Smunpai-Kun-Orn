<div>
    <form method="POST" action="{{ route('employee.store')  }}">
    @csrf
        <div class="space-y-5 text-[#483838] font-bold">
            <div class="grid grid-cols-2 space-x-5">
                <h1 class="flex justify-end">Name :</h1>
                <input type="text" id="employee_name" name="employee_name">
            </div>
            <div class="grid grid-cols-2 space-x-5">
                <h1 class="flex justify-end">Email :</h1>
                <input type="text" id="email" name="email">
            </div>
            <div class="grid grid-cols-2 space-x-5">
                <h1 class="flex justify-end">Tel :</h1>
                <input type="text" id="phone_number" name="phone_number">
            </div>
        </div>

        <button class="submitButton float-right m-5" type="submit">
            <p class="text-white m-2.5">เพิ่มพนักงาน</p>
        </button>
    </form>
    {{ $errors->first() }}
</div>
