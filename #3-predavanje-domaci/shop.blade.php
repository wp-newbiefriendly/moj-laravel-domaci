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

@foreach($products as $singleProduct)
 
   @if($singleProduct == "Youtube" || $singleProduct == "Windows 11")
     <p class="text-center"> {{ $singleProduct }} - SNIZENJE! </p>
   @else 
   <p> {{ $singleProduct }} </p>
  
@endif


@endforeach

@endsection
