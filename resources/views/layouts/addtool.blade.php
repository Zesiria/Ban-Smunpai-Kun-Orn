<div>
    <form method="POST" action="{{ route('tool.store')  }}">
        @csrf

        <div class="space-y-5 text-[#483838] font-bold">
            <div class="grid grid-cols-2 space-x-5">
                <h1 class="flex justify-end">Name :</h1>
                <input type="text" id="tool_name" name="tool_name">
            </div>
        </div>

        <button class="submitButton float-right m-5" type="submit">
            <p class="text-white m-2.5">เพิ่มวัตถุดิบ</p>
        </button>
        
    </form>
    {{ $errors->first() }}
</div>
