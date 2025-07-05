<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid  align-items-center justify-content-between">

    <!-- Levo: Logo -->
    <a class="logo-moj-laravel-sajt navbar-brand mb-0 h1" href="/">Moj Laravel Sajt</a>

    <!-- Sredina: Collapse meni koji se pojavljuje centriran -->
    <div class="collapse navbar-collapse justify-content-center order-2 order-lg-2" id="navbarMenu">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/shop">Shop</a></li>
        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="/kontakt">Kontakt</a></li>
      </ul>
    </div>

    <!-- Toggler: uvek centriran između logo i itmentorstva -->
    <button class="navbar-toggler order-1 mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Desno: ITMentorstva, uvek vidljiv -->
    <span class="navbar-text text-white align-items-center order-3">
      <i class="fa-solid fa-graduation-cap me-2"></i> ITMentorstva
    </span>
  </div>
</nav>
