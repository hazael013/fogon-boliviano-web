<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería El Lápiz</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        header {
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
        }
        nav ul li {
            display: inline;
            margin-right: 15px;
        }
        footer {
            border-top: 1px solid #ccc;
            margin-top: 20px;
        }
        form label {
            display: block;
            margin-top: 10px;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        .exito {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Librería El Lápiz</h1>
        <nav>
            <ul id="menu-principal">
                <li><a href="/">Inicio</a></li>
                <li><a href="/productos">Catálogo</a></li>
                <li><a href="/contacto">Contacto</a></li>
                <li><a href="/panel">Acceso Dueño</a></li>

                <li>
                    @auth
                        ({{ auth()->user()->email }})
                    @else
                        (Invitado)
                    @endauth
                </li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer>
        <p>Integradora - Hazael Fernando Alanoca Alarcon - 18 de agosto de 2026</p>
    </footer>

    @yield('scripts')
</body>
</html>
