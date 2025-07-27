@extends('layouts.adminlayout')

@section('title', 'Izmeni Proizvod')

@section('content')
    <h2 class="mb-4">✏️ Izmeni Proizvod</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Forma za editovanje, koristimo metodu PUT -->
    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Naziv</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" placeholder="Naziv" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Opis</label>
            <textarea name="description" class="form-control" placeholder="Opis">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Količina</label>
            <input type="number" name="amount" class="form-control" value="{{ old('amount', $product->amount) }}" placeholder="Količina">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Cena (EUR)</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price', $product->price) }}" placeholder="Cena" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Link do slike (URL)</label>
            <input type="text" name="image" class="form-control" value="{{ old('image', $product->image) }}" placeholder="URL slike">
        </div>

        <div class="mb-3">
            <label for="image_file" class="form-label">Ili otpremi novu sliku</label>
            <input type="file" name="image_file" class="form-control">
        </div>

        @if($product->image)
            <div class="mb-3">
                <p>Trenutna slika:</p>
                <img src="{{ $product->image }}" alt="Slika proizvoda" class="img-thumbnail" width="150">
            </div>
        @endif

        <button type="submit" class="btn btn-primary me-2">Sačuvaj izmene</button>
        <a href="/admin/all-products" class="btn btn-secondary">Nazad na listu</a>
    </form>
@endsection
