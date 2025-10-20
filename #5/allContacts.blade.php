@extends("layout")

@section("title")
    <title> AllContacts  </title>

    @section("sadrzajstranice")

@foreach($allContacts as $contact)

    <p> {{ $contact->email }} </p>



@endforeach



    @endsection
