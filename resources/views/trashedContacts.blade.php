@extends('layouts.adminlayout')

@section('title', 'Obrisani Kontakti')

@section('content')
    <h2 class="mb-4">🗑️ Obrisani Kontakti</h2>

    @if($trashedContacts->isEmpty())
        <div class="alert alert-info">Nema obrisanih kontakata.</div>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Email</th>
                <th>Poruka</th>
                <th>Akcija</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trashedContacts as $contact)
                <tr>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <form method="POST" action="{{ url('/admin/undo-contact/'.$contact->id) }}">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success btn-sm">Vrati</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
