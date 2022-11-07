<div>
    <form method="POST" action="{{ route('material.store')  }}">
        @csrf
        <div class="flex">
            <h1>Material Name :</h1>
            <input type="text" name="material_name" required>
        </div>
        <div class="flex">
            <h1>Total :</h1>
            <input type="text" name="quantity" required>
        </div>
        <div class="flex">
            <h1>Minimum Value :</h1>
            <input type="number" name="minimum_value">
        </div>
        <button type="submit">เพิ่มอุปกรณ์</button>
        {{ $errors->first() }}
    </form>
</div>
