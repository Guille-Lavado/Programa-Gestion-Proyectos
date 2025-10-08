<?php
class InicioController
{
    public function index()
    {
        require_once "models/Model.php";
        $model = new Model();
        $proyectos = $model->getProyectos();
        // Filtros
        $nombre = $_GET["nombre"] ?? "";
        $tipo = $_GET["tipo"] ?? "";
        $tecnologias = $_GET["tecnologias"] ?? [];
        $estado = $_GET["estado"] ?? "";
        // Aplicar filtros
        $proyectosFiltrados = [];
        foreach ($proyectos as $proyecto) {
            // Filtro por nombre
            if ($nombre && stripos($proyecto["Nombre"], $nombre) === false) {
                continue;
            }
            // Filtro por tipo
            if ($tipo && $proyecto["Tipo"] != $tipo) {
                continue;
            }
            // Filtro por tecnologías
            if ($tecnologias) {
                $coincide = false;
                foreach ($tecnologias as $tec) {
                    if (in_array($tec, $proyecto["Tecnologías"])) {
                        $coincide = true;
                        break;
                    }
                }
                if (!$coincide) {
                    continue;
                }
            }
            // Filtro por estado
            if ($estado && $proyecto["Estado"] != $estado) {
                continue;
            }
            $proyectosFiltrados[] = $proyecto;
        }
        // Obtener tipos y tecnologías únicas para los filtros
        $tipos = array_unique(array_column($proyectos, "Tipo"));
        $tecnologiasUnicas = [];
        foreach ($proyectos as $proyecto) {
            $tecnologiasUnicas = array_merge(
                $tecnologiasUnicas,
                $proyecto["Tecnologías"]
            );
        }
        $tecnologiasUnicas = array_unique($tecnologiasUnicas);
        $estadosUnicos = array_unique(array_column($proyectos, "Estado"));
        require_once "views/inicio.php";
    }
    // Función para mostrar tecnologías
    public static function mostrarTecnologias($tecnologias)
    {
        $html = "";
        foreach ($tecnologias as $tec) {
            $html .= '<span class="tecnologia">' . $tec . "</span> ";
        }
        return $html;
    }
    // Función para mostrar un proyecto
    public static function mostrarProyecto($proyecto)
    {
        $html = '<div class="proyecto">';
        $html .= "<h3>" . $proyecto["Nombre"] . "</h3>";
        $html .= '<p class="descripcion">' . $proyecto["Descripción"] . "</p>";
        $html .= '<div class="detalles">';
        $html .= '<span class="tipo">' . $proyecto["Tipo"] . "</span>";
        $html .= '<span class="estado">' . $proyecto["Estado"] . "</span>";
        $html .= "</div>";
        $html .=
            '<div class="tecnologias">' .
            self::mostrarTecnologias($proyecto["Tecnologías"]) .
            "</div>";
        $html .= "</div>";
        return $html;
    }
}
?>
