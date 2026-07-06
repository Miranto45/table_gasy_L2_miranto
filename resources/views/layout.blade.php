<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Resto Manager - Laravel</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        * { box-sizing: border-box; }
        body { font-family: system-ui, sans-serif; margin: 0; background: #f5f6fa; color: #222; }
        header { background: #fffefe; color: #fff; padding: 1rem 2rem; }
        header a { color: #000000; text-decoration: none; margin-right: 1.5rem; font-weight: 500; }
        header a:hover { color: #727677; }
        main { max-width: 1200px; margin: 2rem auto; padding: 0 1rem; }
        h1 { margin-top: 0; }
        .btn { display: inline-block; padding: 0.5rem 1rem; background: #ffffff; color: #000000; border: 0; border-radius: 6px; cursor: pointer; text-decoration: none; font-size: 0.9rem; }
        .btn.danger { background: #dc2626; }
        .btn.ghost { background: #e5e7eb; color: #111; }
        .card { background: #fff; padding: 1.5rem; border-radius: 10px; box-shadow: 0 1px 3px rgba(0,0,0,.08); margin-bottom: 1.5rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 0.6rem; border-bottom: 1px solid #eee; }
        th { background: #f8fafc; }
        input, select, textarea { width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 6px; font: inherit; }
        label { display: block; margin: 0.5rem 0 0.25rem; font-weight: 500; }
        .alert { background: #dcfce7; color: #14532d; padding: 0.75rem 1rem; border-radius: 6px; margin-bottom: 1rem; }
        .plan { position: relative; height: 500px; background: #fef9c3; border: 2px dashed #eab308; border-radius: 10px; }
        .table-item { position: absolute; width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-direction: column; color: #fff; font-weight: bold; cursor: pointer; font-size: 0.75rem; transform: translate(-50%,-50%); box-shadow: 0 2px 6px rgba(0,0,0,.2); }
        .s-libre { background: #16a34a; }
        .s-reservee { background: #2563eb; }
        .s-occupee { background: #dc2626; }
        .s-a_nettoyer { background: #ca8a04; }
        .s-hors_service { background: #6b7280; }
        .legend span { display: inline-block; padding: 0.25rem 0.6rem; border-radius: 4px; color: #fff; margin-right: 0.5rem; font-size: 0.8rem; }
        form.inline { display: inline; }
    </style>
</head>
<body>
<header>
    <a href="{{ route('home') }}">Resto GasyL2</a>
    <a href="{{ route('tables.index') }}">Tables</a>
    <a href="{{ route('zones.index') }}">Zones</a>
    <a href="{{ route('clients.index') }}">Clients</a>
    <a href="{{ route('reservations.index') }}">Réservations</a>
</header>
<main>
    @if(session('ok'))<div class="alert">{{ session('ok') }}</div>@endif
    @yield('content')
</main>
</body>
</html>
