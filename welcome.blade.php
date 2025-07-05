@extends("layout")

@section("title")
    <title> Home  </title>

@section("sadrzajstranice")
<div class="container mt-5">
    <h1 class="text-center">Home</h1>
    <p class="text-center">Dobrodošli na početnu stranicu!</p>
<p class="text-center">Trenutno vreme je <span id="clock" class="fs-4">{{ date('H:i:s') }}</span></p>
	<script>
  setInterval(() => {
    const now = new Date();
    document.getElementById('clock').textContent = 
      now.toLocaleTimeString('sr-RS', { hour12: false });
  }, 1000);
</script>
</div>
@endsection




