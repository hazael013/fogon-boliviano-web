<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesando Pedido - Fogón Boliviano</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <strong>Fogón Boliviano</strong>
    </header>
    <main>
        <section>
            <h2>Mensaje recibido por PHP</h2>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_POST["nombre"]); ?></p>
            <p><strong>Correo:</strong> <?php echo htmlspecialchars($_POST["correo"]); ?></p>
            <p><strong>Asunto:</strong> <?php echo htmlspecialchars($_POST["asunto"]); ?></p>
            <p><strong>Mensaje:</strong> <?php echo htmlspecialchars($_POST["mensaje"]); ?></p>
            
            <a href="index.html" class="boton-modo" style="text-align: center; text-decoration: none;">Volver al formulario</a>
        </section>
    </main>
</body>
</html>
