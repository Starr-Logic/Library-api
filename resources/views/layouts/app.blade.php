<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Library</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f8; color: #222; }
        nav { background: #111827; padding: 0 16px; display: flex; gap: 4px; flex-wrap: wrap; }
        nav a { color: #d1d5db; text-decoration: none; padding: 14px 16px; font-size: 15px; }
        nav a:hover { background: #1f2937; color: #fff; }
        nav a.active { background: #2563eb; color: #fff; }
        .wrap { max-width: 1200px; margin: 30px auto; padding: 0 16px; }
        h1 { margin: 0 0 6px; }
        .sub { color: #666; margin-bottom: 20px; font-size: 14px; }
        .sub a { color: #2563eb; }
        .scroll { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 1px 4px rgba(0,0,0,.1); }
        th, td { padding: 10px 12px; text-align: left; border-bottom: 1px solid #e5e7eb; font-size: 14px; }
        th { background: #1f2937; color: #fff; }
        tr:hover td { background: #f9fafb; }
        .tag { display: inline-block; background: #dbeafe; color: #1e40af; padding: 2px 8px; border-radius: 10px; font-size: 12px; margin: 1px; }
        .empty { text-align: center; padding: 30px; color: #888; }
    </style>
</head>
<body>
<nav>
    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Books</a>
    <a href="/authors" class="{{ request()->is('authors') ? 'active' : '' }}">Authors</a>
    <a href="/book-types" class="{{ request()->is('book-types') ? 'active' : '' }}">Book Types</a>
    <a href="/book-authors" class="{{ request()->is('book-authors') ? 'active' : '' }}">Book Authors</a>
</nav>
<div class="wrap">
    <h1>@yield('title')</h1>
    <div class="sub">Total: @yield('total') | JSON API: <a href="@yield('api')">@yield('api')</a></div>
    <div class="scroll">
        @yield('content')
    </div>
</div>
</body>
</html>
