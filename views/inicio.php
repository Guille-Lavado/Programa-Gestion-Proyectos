<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Proyectos</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <?php
        // Función para mostrar tecnologías
        function mostrarTecnologias($tecnologias)
        {
            $html = "";
            foreach ($tecnologias as $tec) {
                $html .= '<span class="tecnologia">' . $tec . "</span> ";
            }
            return $html;
        }

        // Función para mostrar un proyecto
        function mostrarProyecto($proyecto)
        {
            $html = '<div class="proyecto">';
            $html .= "<h3>" . $proyecto["nombre"] . "</h3>";
            $html .= '<p class="descripcion">' . $proyecto["descripcion"] . "</p>";
            $html .= '<div class="detalles">';
            $html .= '<span class="tipo">' . $proyecto["tipo"] . "</span>";
            $html .= '<span class="estado">' . $proyecto["estado"] . "</span>";
            $html .= "</div>";
            $html .=
                '<div class="tecnologias">' .
                mostrarTecnologias($proyecto["tecnologias"]) .
                "</div>";
            $html .= "</div>";
            return $html;
        }
    ?>

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
            <a class="btn-limpiar" href="/programa-gestion-proyectos/">Limpiar</a>
        </form>
        <p>Mostrando <?= count($proyectosFiltrados) ?> proyectos</p>
        <div class="proyectos">
            <?php foreach ($proyectosFiltrados as $proyecto): ?>
            <?= mostrarProyecto($proyecto) ?>
            <?php endforeach; ?>
        </div>
        <p>Total: <?= $proyectos_length ?></p>
    </div>
</body>
