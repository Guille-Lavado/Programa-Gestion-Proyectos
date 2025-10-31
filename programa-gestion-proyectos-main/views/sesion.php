<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $idioma_actual === 'en' ? 'Login' : 'Iniciar Sesión' ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container login-container">
        <h1><?= $idioma_actual === 'en' ? 'Login' : 'Iniciar Sesión' ?></h1>
        
        <?php if (!empty($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form action="sesion" method="POST">
            <div class="form-group">
                <label for="nombre"><?= $idioma_actual === 'en' ? 'Username:' : 'Usuario:' ?></label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="contrasenya"><?= $idioma_actual === 'en' ? 'Password:' : 'Contraseña:' ?></label>
                <input type="password" id="contrasenya" name="contrasenya" required>
            </div>
            
            <div class="form-group">
                <label for="idioma"><?= $idioma_actual === 'en' ? 'Language:' : 'Idioma:' ?></label>
                <select name="idioma" id="idioma">
                    <option value="es" <?= $idioma_actual === 'es' ? 'selected' : '' ?>>Español</option>
                    <option value="en" <?= $idioma_actual === 'en' ? 'selected' : '' ?>>English</option>
                </select>
            </div>
            
            <div class="botones">
                <button type="submit" class="btn-submit"><?= $idioma_actual === 'en' ? 'Login' : 'Iniciar Sesión' ?></button>
            </div>
        </form>
    </div>
</body>
</html>