<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Todo List App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<header class="header">
    <div class="container header-inner">
        <h1 class="app-title"><a href="{{ route('tasks.index') }}">Todo List</a></h1>
        <nav>
            <a class="btn" href="{{ route('tasks.create') }}">+ Tambah Task</a>
        </nav>
    </div>
</header>

<main class="container">
    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert danger">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <small>© {{ date('Y') }} Todo App</small>
    </div>
</footer>
</body>
</html>
