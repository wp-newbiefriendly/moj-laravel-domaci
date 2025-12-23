@extends('layouts.adminlayout')

@section('title', 'Dodaj Proizvod')

@section('content')
    <h2 class="mb-4">➕ Dodaj Novi Proizvod</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>ayo
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="w-75">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Naziv</label>
            <input type="text" name="name" class="form-control" placeholder="Naziv" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Opis</label>
            <textarea name="description" class="form-control" placeholder="Opis" value="{{ old('description') }}"></textarea>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Količina</label>
            <input type="number" name="amount" class="form-control" value="{{ old('amount') }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Cena (EUR)</label>
            <input type="number" name="price" class="form-control" step="0.01" placeholder="Cena" value="{{ old('price') }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Link do slike (URL)</label>
            <input type="text" name="image" class="form-control" placeholder="URL slike" value="{{ old('image') }}">
        </div>

        <div class="mb-3">
            <label for="image_file" class="form-label">Ili otpremi sliku sa računara</label>
            <input type="file" name="image_file" class="form-control">
        </div>

        <button type="submit" class="btn btn-success me-2">✅ Dodaj proizvod</button>
        <a href="/admin/all-products" class="btn btn-secondary">📦 Nazad na listu</a>
    </form>
@endsection
