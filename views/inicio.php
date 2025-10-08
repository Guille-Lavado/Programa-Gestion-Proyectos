<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Proyectos</title>
    <link rel="stylesheet" href="/daw_servidor/forms/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Gestor de Proyectos</h1>
        <form method="GET">
            <div class="filtro">
                <label>Nombre: <input type="text" name="nombre" value="<?= $_GET['nombre'] ?? '' ?>"></label>
            </div>
            <div class="filtro">
                <label>Tipo:
                    <select name="tipo">
                        <option value="">Todos</option>
                        <?php foreach ($tipos as $t): ?>
                        <option
                            value="<?= $t ?>"
                            <?= isset($_GET['tipo']) && $_GET['tipo'] == $t ? 'selected' : '' ?>>
                            <?= $t ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </div>
            <div class="filtro">
                <label>Tecnologías:
                    <?php foreach ($tecnologiasUnicas as $tec): ?>
                    <label>
                        <input type="checkbox" name="tecnologias[]"
                            value="<?= $tec ?>"
                            <?= isset($_GET['tecnologias']) && in_array($tec,$_GET['tecnologias']) ? 'checked' : '' ?>> 
                            <?= $tec ?>
                    </label>
                    <?php endforeach; ?>
                </label>
            </div>
            <div class="filtro">
                <label>Estado:
                    <select name="estado">
                        <option value="">Todos</option>
                        <?php foreach ($estadosUnicos as $e): ?>
                        <option 
                            value="<?= $e ?>"
                            <?= isset($_GET['estado']) && $_GET['estado'] == $e ? 'selected' : '' ?>>
                        <?= $e ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </div>
            <button type="submit">Filtrar</button>
            <a href="/daw_servidor/forms/index.php">Limpiar</a>
        </form>
        <p>Mostrando <?= count($proyectosFiltrados) ?> proyectos</p>
        <div class="proyectos">
            <?php foreach ($proyectosFiltrados as $proyecto): ?>
            <?= InicioController::mostrarProyecto($proyecto) ?>
            <?php endforeach; ?>
        </div>
        <p>Total: <?= count($proyectosFiltrados) ?></p>
    </div>
</body>
