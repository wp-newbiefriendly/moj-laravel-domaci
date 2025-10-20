@extends('layouts.adminlayout')

@section('title', 'Svi Kontakti')

@section('content')
    <h2 class="mb-4">🗂️ Lista Kontakta</h2>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th style="width: 5%;">ID</th>
            <th style="width: 20%;">Email</th>
            <th style="width: 55%;">Poruka</th>
            <th style="width: 20%;">Akcija</th>
        </tr>
        </thead>
        <tbody>
@foreach($allContacts as $contact)
    <tr>
        <td> {{ $contact->id }}</td>
        <td> {{ $contact->email }} </td>
        <td style="word-break: break-word;">{{ $contact->message }}</td>
        <td>
             <a href="{{ url('/admin/all-contacts/' . $contact->id . '/edit') }}" class="btn btn-sm btn-primary">Izmeni</a>
             <a href="{{ url('/admin/delete-contact/' . $contact->id) }}" class="btn btn-sm btn-danger">Obriši</a>
        </td>
    </tr>
    @php
        $undoId = session()->pull('undoContact');
    @endphp

    @if($undoId)
        <div class="alert alert-warning">
            Kontakt obrisan.
            <a href="{{ url('/admin/undo-contact/' . $undoId) }}">Poništi</a>
        </div>
    @endif



    @endforeach



    @endsection
