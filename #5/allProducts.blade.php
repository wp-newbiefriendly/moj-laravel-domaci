@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1">
    <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th>Opis</th>
        <th>Cena</th>
        <th>Slika</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }} EUR</td>
            <td>
                @if($product->image)
                    <img src="{{ $product->image }}" width="100"><br>
                @endif
                <a href="{{ url('/admin/products/' . $product->id . '/edit') }}">Izmeni</a>
            </td>

            <td>
                @if($product->image)
                    <img src="{{ $product->image }}" alt="slika" width="100">
                @else
                    <em>Nema slike</em>
                @endif
            </td>
        </tr>
    @endforeach
</table>
<div style="margin-top: 20px;">
    <a href="{{ url('/admin/add-products') }}">
        <button style="padding: 10px 20px;">+ Dodaj novi proizvod</button>
    </a>
</div>
