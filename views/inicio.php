<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Proyectos</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Gestor de Proyectos</h1>
        <form method="GET">
            <div class="filtro">
                <label>Nombre: </label>
                <input type="text" name="nombre" value="">
            </div>
            <div class="filtro">
                <label>Tipo: </label>
                <select name="tipo">
                    <option value="">Ninguno</option>
                    <?php foreach ($tipos as $t): ?>
                        <option value="<?= $t ?>"><?= $t ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="filtro">
                <label>Tecnologías: </label>
                <?php foreach ($tecnologiasUnicas as $tec): ?>
                    <input type="checkbox" name="tecnologias[]" value="<?= $tec ?>">
                    <label> <?= $tec ?></label>
                <?php endforeach; ?>
            </div>
            <div class="filtro">
                <label>Estado: </label>
                <select name="estado">
                    <option value="">Ninguno</option>
                    <?php foreach ($estadosUnicos as $e): ?>
                        <option value="<?= $e ?>"><?= $e ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit">Filtrar</button>
            <a class="btn-limpiar" href="/Programa-Gestion-Proyectos/">Limpiar</a>
        </form>
        <p>Mostrando <?= count($proyectosFiltrados) ?> proyectos</p>
        <div class="proyectos">
            <?php foreach ($proyectosFiltrados as $proyecto): ?>
            <?= InicioController::mostrarProyecto($proyecto) ?>
            <?php endforeach; ?>
        </div>
        <p>Total: <?= count($proyectos) ?></p>
    </div>
</body>
