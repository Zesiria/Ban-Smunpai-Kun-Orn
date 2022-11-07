<div>
    <form method="POST" action="{{ route('course.store')  }}">
        @csrf
        <div class="flex">
            <h1>Course Name :</h1>
            <input type="text" name="course_name" required>
        </div>
        <div class="flex">
            <h1>Course price :</h1>
            <input type="text" name="course_price" required>
        </div>
        <div class="flex">
            <h1>Course description :</h1>
            <textarea type="text" name="course_description"></textarea>
        </div>
        <button type="submit">เพิ่มบริการ</button>
    </form>
    {{ $errors->first() }}
</div>
