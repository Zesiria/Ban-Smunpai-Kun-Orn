<div>
    <form method="POST" action="{{ route('tool.store')  }}">
        @csrf
        <div class="flex">
            <h1>Name :</h1>
            <input type="text" id="tool_name" name="tool_name">
        </div>

        <button type="submit">เพิ่มวัตถุดิบ</button>
    </form>
    {{ $errors->first() }}
</div>
