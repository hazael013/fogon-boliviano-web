<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesando Pedido - Heladería Doña Nieve</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Heladería Doña Nieve</h1>
    </header>
    <main>
        <section>
            <h2>Pedido recibido:</h2>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_POST["nombre"]); ?></p>
            <p><strong>Correo:</strong> <?php echo htmlspecialchars($_POST["correo"]); ?></p>
            <p><strong>Sabores:</strong> <?php echo htmlspecialchars($_POST["sabores"]); ?></p>
            
            <h3>Carta:</h3>
            <ul>
                <?php
                $carta = [
                    "Cono simple - Bs 8",
                    "Copa doble - Bs 15",
                    "Litro para llevar - Bs 35"
                ];
                foreach ($carta as $menu) {
                    echo "<li>" . $menu . "</li>";
                }
                ?>
            </ul>
            <p>Te atiende Hazael Fernando Alanoca Alarcon</p>
        </section>
    </main>
</body>
</html>
