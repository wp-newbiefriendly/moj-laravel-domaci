@extends('layouts.adminlayout')

@section('title', 'Svi Kontakti')

@section('content')

    @if (session('success'))
        <div class="alert alert-success text-center mx-auto">
            {{ session('success') }}
        </div>
    @endif


    <h2 class="mb-4">🗂️ Lista Kontakta</h2>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th style="width: 5%;">ID</th>
            <th style="width: 20%;">Email</th>
            <th style="width: 20%;">Sadrzaj</th>
            <th style="width: 45%;">Poruka</th>
            <th style="width: 25%;">Akcija</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allContacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td style="word-break: break-word;">{{ $contact->message }}</td>
                <td class="d-flex flex-column flex-md-row gap-1">
                    <a href="{{ route('editContact', ['contact' => $contact->id]) }}" class="btn btn-sm btn-primary w-100">Izmeni</a>
                    <a href="{{ route('obrisiKontakt', ['contact' => $contact->id]) }}" class="btn btn-sm btn-danger w-100">Obriši</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if ($trashedContacts->count())
        <h4 class="mt-5">🗑️ Obrisani Kontakti ({{ $trashedCount }})</h4>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Email</th>
                <th>Poruka</th>
                <th>Akcija</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trashedContacts as $trashed)
                <tr>
                    <td>{{ $trashed->email }}</td>
                    <td>{{ $trashed->message }}</td>
                    <td>
                        <form method="GET" action="{{ route('contact.undo', ['id' => $trashed->id]) }}">
                            <button class="btn btn-success btn-sm">Vrati</button>
                        </form>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@endsection
