<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Product catalog')</title>
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; }
        header { background-color: #007bff; color: white; text-align: center; padding: 20px; }
        .container { max-width: 800px; margin: 20px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        input, select, button { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <header>
        <h1>@yield('header', 'Product catalog')</h1>
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
