<form method="POST" action="/add-user-grade">
    {{ csrf_field() }}
    <input required name="profesor" placeholder="Unesite ime profesora">
    <input required type="text" name="predmet" placeholder="Unesite ime predmeta">
    <input required type="number" name="ocena" placeholder="Unesite ocenu">
    <button>Sacuvaj ocenu</button>
</form>
