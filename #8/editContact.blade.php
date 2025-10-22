@extends('layouts.adminlayout')

@section('title', 'Izmeni Kontakt')

@section('content')
    <h2 class="mb-4">✏️ Izmeni Kontakt</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Forma za editovanje, koristimo metodu PUT -->
    <form method="POST" action="/admin/contact/{{ $contact->id }}">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email', $contact->email) }}" placeholder="Email" required>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Sadrzaj</label>
            <textarea name="subject" class="form-control" placeholder="Opis">{{ old('subject', $contact->subject) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Poruka</label>
            <input type="text" name="message" class="form-control" value="{{ old('message', $contact->message) }}" placeholder="Poruka">
        </div>


        <button type="submit" class="btn btn-primary me-2">Sačuvaj izmene</button>
        <a href="/admin/all-contacts" class="btn btn-secondary">Nazad na listu</a>
    </form>
@endsection
