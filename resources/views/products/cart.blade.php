@extends("layout")

@section("title")
    Shop - Korpa
@endsection

@section("sadrzajstranice")
    <div class="container mt-5">
        <h1 class="text-center">Korpa</h1>
        <p class="text-center">Pregled proizvoda koje ste dodali u korpu</p>
        <hr class="solid">

        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        @if(is_array($cart) && count($cart) > 0)
            <div class="cart-table">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Proizvod</th>
                        <th>Količina</th>
                        <th>Cena</th>
                        <th>Ukupno</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $product)
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['amount'] }}</td>
                            <td>{{ $product['price']  }}€</td>
                            <td>{{ $product['amount'] * $product['price'] }}€</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="cart-summary">
                    <h4>Ukupno: {{ $totalPrice }}€</h4>
                </div>
            </div>
        @else
            <h3 class="text-center">Nema proizvoda u korpi</h3>
        @endif
    </div>
@endsection
