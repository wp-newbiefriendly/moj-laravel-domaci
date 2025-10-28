@section("title")
    About
@endsection

@extends("layout")

@csrf

@section("sadrzajstranice")
    <div class="container mt-5">
        <h1 class="text-center">Proizvodi</h1>
        <p class="text-center">{{ $product->name }}</p>
        <form method="POST" action="{{ route("cart.add") }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="text" name="amount" placeholder="Enter amount">
            <button>Add to Cart</button>
        </form>
    </div>

@endsection

