<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat room</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        // rename myToken as you like
        window.myToken = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <h1>ChatRoom</h1>
        <example></example>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>