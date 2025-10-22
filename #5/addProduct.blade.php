@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p style="color:red;">{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="/admin/add-products">
    @csrf
    <input type="text" name="name" placeholder="Naziv"><br>
    <textarea name="description" placeholder="Opis"></textarea><br>
    <input type="number" name="amount" placeholder="Kolicina"><br>
    <input type="number" name="price" placeholder="Cena" step="0.01"><br>
    <input type="text" name="image" placeholder="Link do slike (URL)"><br>
    <label>ili otpremi sliku sa računara:</label><br>
    <input type="file" name="image_file"><br><br>
    <button type="submit">Dodaj proizvod</button>
</form>

<div style="margin-top: 20px;">
    <a href="{{ url('/admin/products') }}">
        <button style="padding: 10px 20px;"> Svi proizvodi</button>
    </a>
</div>

