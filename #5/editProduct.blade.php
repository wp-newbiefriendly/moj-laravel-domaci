<form method="POST" action="{{ url('/admin/products/' . $product->id . '/edit') }}">
    @csrf

    <label>Ime proizvoda:</label><br>
    <input type="text" name="name" value="{{ $product->name }}" placeholder="Unesite naziv"><br><br>

    <label>Opis proizvoda:</label><br>
    <textarea name="description" placeholder="Unesite opis">{{ $product->description }}</textarea><br><br>

    <label>Količina (amount):</label><br>
    <input type="number" name="amount" value="{{ $product->amount }}" placeholder="Unesite količinu"><br><br>

    <label>Cena:</label><br>
    <input type="number" name="price" value="{{ $product->price }}" placeholder="Unesite cenu"><br><br>

    <label>Slika (URL):</label><br>
    <input type="text" name="image" value="{{ $product->image }}" placeholder="Unesite URL slike"><br><br>
    <label>ili otpremi sliku sa računara:</label><br>
    <input type="file" name="image_file"><br><br>

    <div style="display: flex; gap: 10px; align-items: center; margin-top: 20px;">
        <button type="submit">Sačuvaj izmene</button>

        <a href="{{ url('/admin/products') }}">
            <button type="button">← Nazad</button>
        </a>
    </div>


</form>

