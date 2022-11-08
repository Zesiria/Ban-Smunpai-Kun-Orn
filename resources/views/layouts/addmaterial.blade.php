<div>
    <form method="POST" action="{{ route('material.store')  }}">
        @csrf

        <div class="space-y-5 text-[#483838] font-bold">
            <div class="grid grid-cols-2 space-x-5">
                <h1 class="flex justify-end">Material Name :</h1>
                <input type="text" name="material_name" required>
            </div>
            <div class="grid grid-cols-2 space-x-5">
                <h1 class="flex justify-end">Total :</h1>
                <input type="text" name="quantity" required>
            </div>
            <div class="grid grid-cols-2 space-x-5">
                <h1 class="flex justify-end">Minimum Value :</h1>
                <input type="number" name="minimum_value">
            </div>
        </div>

        <button class="submitButton float-right m-5" type="submit">
            <p class="text-white m-2.5">เพิ่มอุปกรณ์</p>
        </button>
        {{ $errors->first() }}
    </form>
</div>
