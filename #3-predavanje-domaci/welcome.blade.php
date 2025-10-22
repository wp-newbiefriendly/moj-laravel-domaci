@extends("layout")

@section("title")
    <title> Home  </title>

@section("sadrzajstranice")

@if($sat < 12)
  <p> Dobro jutro </p>		
@else
<p class="text-center"> Dobar dan! </p>
@endif 

<div class="container mt-5">
    <h1 class="text-center">Home</h1>
    <p class="text-center">Dobrodošli na početnu stranicu!</p>
	<p class="text-center">Trenutno vreme je {{$trenutnoVreme}}</p>
		<p class="text-center">Trenutni sat je {{$sat}}</p>

	
</div>
@endsection
