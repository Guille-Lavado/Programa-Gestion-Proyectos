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
            $hayFiltro = false;

            // Filtro por nombre
            if (stripos($proyecto["nombre"], $nombre) != false) {
                $hayFiltro = true;
            }

            // Filtro por tipo
            if ($proyecto["tipo"] === $tipo) {
                $hayFiltro = true;
            }

            // Filtro por tecnologías
            foreach ($tecnologias as $tec) {
                if (in_array($tec, $proyecto["tecnologias"])) {
                    $hayFiltro = true;
                    break;
                }
            }
            // Filtro por estado
            if ($proyecto["estado"] === $estado) {
                $hayFiltro = true;
            }

            if ($hayFiltro) {
                $proyectosFiltrados[] = $proyecto;
            }
        }

        if (empty($_GET)) {
            $proyectosFiltrados = $proyectos;
        }

        // Obtener tipos únicos para los filtros
        $tipos = array_unique(array_column($proyectos, "tipo"));
        
        // Obtener tecnologías únicas para los filtros
        $tecnologiasUnicas = [];
        foreach ($proyectos as $proyecto) {
            $tecnologiasUnicas = array_merge($tecnologiasUnicas, $proyecto["tecnologias"]);
        }
        $tecnologiasUnicas = array_unique($tecnologiasUnicas);

        // Obtener estados únicas para los filtros
        $estadosUnicos = array_unique(array_column($proyectos, "estado"));

        // Cargamos el View
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
        $html .= "<h3>" . $proyecto["nombre"] . "</h3>";
        $html .= '<p class="descripcion">' . $proyecto["descripcion"] . "</p>";
        $html .= '<div class="detalles">';
        $html .= '<span class="tipo">' . $proyecto["tipo"] . "</span>";
        $html .= '<span class="estado">' . $proyecto["estado"] . "</span>";
        $html .= "</div>";
        $html .=
            '<div class="tecnologias">' .
            self::mostrarTecnologias($proyecto["tecnologias"]) .
            "</div>";
        $html .= "</div>";
        return $html;
    }
}
?>
