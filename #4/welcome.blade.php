@extends("layout")

@section("title")
    <title> Home  </title>

@section("sadrzajstranice")

<div class="container mt-5">
    <h1 class="text-center">Home</h1>
    <p class="text-center">Dobrodošli na početnu stranicu!</p>
	<p class="text-center">Trenutno vreme je {{$trenutnoVreme}}</p>
		<p class="text-center">Trenutni sat je {{$sat}}</p>
    @if($sat < 12)
        <p> Dobro jutro </p>
    @else
        <p class="text-center"> Dobar dan! </p>
    @endif

    <hr class="solid">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Svi proizvodi</h3>
                <hr style="width: 150px; margin: 10 auto; border: 1px solid black;" />
                    @foreach ($products as $product)
                    <p>{{ $product->name }}</p>
                @endforeach
            </div>

            <div class="col-md-6">
                <h3>Poslednjih 6 proizvoda</h3>
                <hr style="width: 150px; margin: 10 auto; border: 1px solid black;" />
            @foreach ($latestproducts as $product)
                    <p>{{ $product->name }}</p>
                @endforeach
            </div>
        </div>
    </div>


</div>
@endsection




