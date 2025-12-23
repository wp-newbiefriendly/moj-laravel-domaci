@extends("layout")

@section("title")
    Uspesna Porudzbina
@endsection

@section("sadrzajstranice")
    <div class="container mt-5">
        <h1 class="text-center mb-4">Uspesna porudzbina</h1>
        <p class="text-center mb-4">Vaša porudžbina je uspešno izvršena! Hvala na kupovini.</p>

        <div class="order-summary">
            <h4>Detalji o porudžbini</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Proizvod</th>
                    <th>Količina</th>
                    <th>Cena</th>
                    <th>Ukupno</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->price }}€</td>
                        <td>{{ $item->amount * $item->price }}€</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <hr class="solid">
            <div class="total-price">
                <h5>Ukupna cena: {{ $totalPrice }}€</h5>
            </div>

            <hr class="solid">
            <div class="order-info">
                <h5>Informacije o porudžbini</h5>
                <ul>
                    <li><strong>Broj porudžbine:</strong> {{ $order->id }}</li>
                    <li><strong>Status:</strong> U obradi</li>
                    <li><strong>Datum porudžbine:</strong> {{ $order->created_at }}</li>
                </ul>
            </div>

            <a href="/" class="btn btn-primary mt-3">Nazad na početnu stranicu</a>
        </div>
    </div>

@endsection

@section("styles")
    <style>
        .order-summary {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .order-summary h4 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .table {
            margin-bottom: 20px;
        }

        .table th, .table td {
            text-align: center;
        }

        .solid {
            border-top: 2px solid #ddd;
        }

        .total-price h5 {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .order-info ul {
            list-style-type: none;
            padding: 0;
        }

        .order-info li {
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 1rem;
            text-decoration: none;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
@endsection
