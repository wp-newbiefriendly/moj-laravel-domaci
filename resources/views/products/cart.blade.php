@extends("layout")

@section("title")
    Shop
@endsection

@section("sadrzajstranice")

    <div class="container mt-5">
        <h1 class="text-center">Korpa</h1>
        <p class="text-center">Ovo je Korpa stranica</p>
        <hr class="solid">
    </div>

    @foreach($cart as $product => $amount)

        <h3 class="text-center"> {{ $product." ".$amount }}</h3>

    @endforeach

@endsection
