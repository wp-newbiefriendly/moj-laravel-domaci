@foreach($ocene as $ucenikovaOcena)
    <p> {{ $ucenikovaOcena->predmet }} {{ $ucenikovaOcena->profesor }}: {{ $ucenikovaOcena->ocena }}</p>


@endforeach
