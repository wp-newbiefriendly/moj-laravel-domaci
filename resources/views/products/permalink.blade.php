@section("title")
    {{ $product->name }} - MLS
@endsection

@extends("layout")

@section("sadrzajstranice")

    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mt-5">
        <h1 class="text-center">{{ $product->name }}</h1>
        <p class="text-center">{{ $product->description }}</p>
        <hr class="solid">
        <h2 class="text-center mb-3">Cena: {{ $product->price }}€</h2>
        <form method="POST" class="text-center" action="{{ route("cart.add") }}">
           {{ csrf_field() }}
            <input type="hidden" class="text-center" name="id" value="{{ $product->id }}">
            <input type="text" class="text-center" name="amount" placeholder="Enter amount">
            <button>Add to Cart</button>
            <p class="text-center mt-2">Na stanju kolicina: {{ $product->amount }}</p>
        </form>
    </div>

@endsection

