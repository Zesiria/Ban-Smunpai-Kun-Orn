<div>
    <form method="POST" action="{{ route('course.store')  }}">
        @csrf
        <div class="space-y-5 text-[#483838] font-bold">
            <div class="grid grid-cols-2 space-x-5">
                <h1 class="flex justify-end">Course Name :</h1>
                <input type="text" name="course_name" required>
            </div>
            <div class="grid grid-cols-2 space-x-5">
                <h1 class="flex justify-end">Course price :</h1>
                <input type="text" name="course_price" required>
            </div>
            <div class="grid grid-cols-2 space-x-5">
                <h1 class="flex justify-end">Course description :</h1>
                <textarea type="text" name="course_description"></textarea>
            </div>
        </div>
    


        <button class="submitButton float-right m-5" type="submit">
            <p class="text-white m-2.5">เพิ่มบริการ</p>
        </button>

    </form>
    {{ $errors->first() }}
</div>
