@extends('layouts.adminlayout')

@if (session('success'))
    <div class="alert alert-success text-center mx-auto">
        {{ session('success') }}
    </div>
@endif


@section('title', 'Svi Proizvodi')

@section('content')
    <h2 class="mb-4">📦 Lista Proizvoda</h2>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Opis</th>
            <th>Cena</th>
            <th>Slika</th>
            <th>Akcija</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }} EUR</td>
                <td>
                    @if($product->image)
                        <img src="{{ $product->image }}" width="100" class="img-thumbnail">
                    @else
                        <em>Nema slike</em>
                    @endif
                </td>
                <td>
                    <a href="{{ url('/admin/products/' . $product->id . '/edit') }}" class="btn btn-sm btn-primary">Izmeni</a>
                    <a href="{{ url('/admin/delete-product/' . $product->id) }}" class="btn btn-sm btn-danger">Obriši</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
