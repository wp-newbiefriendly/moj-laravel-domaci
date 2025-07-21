<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-light border-end" style="width: 220px; min-height: 100vh;">
        <div class="p-3">
            <h4>🛠 Admin Panel</h4>
        </div>
        <div class="list-group list-group-flush">
            <a href="/" class="list-group-item list-group-item-action">🏠 Pocetna stranica (frontend)</a>
            <hr style="margin: 15px 0px 15px;">
            <a href="/admin/all-products" class="list-group-item list-group-item-action">📦 Svi Proizvodi</a>
            <a href="/admin/add-products" class="list-group-item list-group-item-action">➕ Dodaj Proizvod</a>
            <hr style="margin: 15px 0px 15px;">
            <a href="/admin/all-contacts" class="list-group-item list-group-item-action">🗂️ Lista Kontakta</a>
        </div>
    </div>

    <!-- Glavni deo stranice -->
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>
</div>
