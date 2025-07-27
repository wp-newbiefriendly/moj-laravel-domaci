@extends("layout")

@section("title")
    Dashboard
@endsection

@section("sadrzajstranice")


<div class="container mt-5">
    <h1 class="text-center">Dashboard</h1>
    <p class="text-center">Dobrodošli na početnu stranicu!</p>
	<p class="text-center">Trenutno vreme je {{ $trenutnoVreme }}</p>
		<p class="text-center">Trenutni sat je {{$sat}}</p>
    @if($sat < 12)
        <p> Dobro jutro </p>
    @else
        <p class="text-center"> Dobar dan! </p>
    @endif

    <hr class="solid">
    <div class="w-50 p-3 align-center mx-auto" >
    <form method="POST" action="/send-contact">
        {{ csrf_field() }}

        <div class="mb-3">
            <label for="email" class="form-label">Email adresa</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Unesite vaš email">
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Naslov</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Unesite naslov poruke">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Poruka</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Unesite poruku"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Pošalji</button>
        @if($errors->any())
            <h4 class="text-danger">Greska: {{ $errors->first() }}</h4>
        @endif

    </form>
</div>
    <hr class="solid">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Svi proizvodi</h3>
                <hr style="width: 150px; margin: 10px auto; border: 1px solid black;" />
                    @foreach ($products as $product)
                    <p>{{ $product->name }} - {{ $product->price  }}e</p>
                @endforeach
            </div>

            <div class="col-md-6">
                <h3>Poslednjih 6 proizvoda</h3>
                <hr style="width: 150px; margin: 10px auto; border: 1px solid black;" />
                @foreach ($latestProducts as $product)
                    <p>{{ $product->name }} - {{ $product->price  }}e</p>
                @endforeach
            </div>
        </div>
    </div>


</div>
@endsection



