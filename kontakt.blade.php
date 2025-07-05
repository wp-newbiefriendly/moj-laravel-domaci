@section("title")
    Kontakt
@endsection

@extends("layout")

@section("sadrzajstranice")
<div class="container mt-5">
    <h1 class="text-center mb-4">Kontakt</h1>
	    <p class="text-center">Dobrodosli na Kontakt stranicu - ispod teksta je Forma i Mapa</p>


    <div class="row">
        <!-- Forma -->
        <div class="col-md-4">
            <form>
                <div class="mb-3">
                    <label class="form-label">Ime</label>
                    <input type="text" class="form-control" placeholder="Vaše ime">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Vaš email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Poruka</label>
                    <textarea class="form-control" rows="4" placeholder="Vaša poruka"></textarea>
                </div>
                <button type="submit" class="btn btn-dark">Pošalji</button>
            </form>
        </div>

        <!-- Mapa -->
        <div class="col-md-6 mt-4 mt-md-0">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.9317192144987!2d21.89542931553572!3d43.90148697911116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b076c95be0d5%3A0xa2e5bb5a71c0b836!2sZaje%C4%8Dar!5e0!3m2!1ssr!2srs!4v1626184500000" 
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>


@endsection

