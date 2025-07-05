<!DOCTYPE HTML>

<html>
	
<head>
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
	
	<body class="d-flex flex-column min-vh-100">
    @include("navigation")
		
    <main class="flex-fill">
        @yield("sadrzajstranice")
    </main>
		
    @include("footer")
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

	
</html>