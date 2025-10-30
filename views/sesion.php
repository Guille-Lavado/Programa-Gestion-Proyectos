<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="sesion" method="POST">
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre">
        </div>
        <div>
            <label for="contrasenya">Contraseña: </label>
            <input type="text" id="contrasenya" name="contrasenya">
        </div>
        <div>
            <label for="idioma">Idioma: </label>
            <select name="idioma" id="idioma">
                <option value="es">Español</option>
                <option value="en">Ingles</option>
            </select>
        </div>
        <input type="submit" value="enviar">
    </form>
</body>
</html>