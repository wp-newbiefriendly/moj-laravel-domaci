@extends("layout")

@section("title")
    Shop
@endsection

@section("sadrzajstranice")

<div class="container mt-5">
    <h1 class="text-center">Shop</h1>
    <p class="text-center">Ovo je Shop stranica</p>
	<hr class="solid">
</div>

@foreach($products as $product)

   <p> {{ $product->name}} – {{ $product->description }} - {{$product->price}}e
{{--    <a href="{{ route("products.permalink", ["product" => $product->id]) }}" class="button">Detaljnije</a>--}}
       <a class="btn btn-outline-primary" href="{{ route("products.permalink", ["product" => $product->id]) }}" role="button">Detaljnije</a>
   </p>

   @endforeach

@endsection
