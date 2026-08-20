<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fogón Boliviano</title>
    <style>
        body {
            background-color: #f8f9fb;
            color: #17233b;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
        }

        header {
            background-color: #013998;
            color: white;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            color: white;
            margin-top: 0;
            margin-bottom: 15px;
        }

        header ul {
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 24px;
        }

        header li {
            list-style: none;
        }

        header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        section {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        h2, h3 {
            color: #013998;
            margin-top: 0;
        }

        label, input, textarea, select {
            display: block;
            width: 100%;
            max-width: 400px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        input, textarea, select {
            padding: 8px;
            border: 1px solid #aaa;
            border-radius: 4px;
        }

        button {
            background-color: #98bf61;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #555;
        }

        .error {
            color: #cc0000;
            font-weight: bold;
            margin-top: 10px;
        }
        .exito {
            color: #006600;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Fogón Boliviano</h1>
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
        <p>Desarrollado por: Hazael Fernando Alanoca Alarcon</p>
    </footer>

    @yield('scripts')
</body>
</html>
