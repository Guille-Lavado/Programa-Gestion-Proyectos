<?php
class Model
{
    private $proyectos = [
        [
            'nombre'      => 'Intranet Corporativa',
            'descripcion' => 'Desarrollo de una intranet para centralizar documentos internos, comunicados y herramientas de gestión del personal',
            'tipo'        => 'Proyecto interno',
            'tecnologias' => ['PHP', 'Laravel', 'MySQL', 'Bootstrap'],
            'estado'      => 'En progreso',
        ],
        [
            'nombre'      => 'Portal del Cliente - Consultoría Alfa',
            'descripcion' => 'Plataforma web personalizada para la gestión de incidencias y seguimiento de proyectos para un cliente externo',
            'tipo'        => 'Consultoría',
            'tecnologias' => ['PHP', 'Symfony', 'MariaDB', 'Tailwind CSS'],
            'estado'      => 'En progreso',
        ],
        [
            'nombre'      => 'Gestor de Formación Continua',
            'descripcion' => 'Aplicación para el departamento de RRHH que permite planificar, inscribir y evaluar cursos de formación interna',
            'tipo'        => 'Proyecto interno',
            'tecnologias' => ['PHP', 'Laravel', 'PostgreSQL', 'Vue.js'],
            'estado'      => 'Bloqueado',
        ],
        [
            'nombre'      => 'Evaluación del Desempeño',
            'descripcion' => 'Aplicación web para gestionar las evaluaciones anuales del personal, con informes automáticos y exportación de resultados',
            'tipo'        => 'Iniciativa RRHH',
            'tecnologias' => ['PHP', 'Laravel', 'MySQL', 'Chart.js'],
            'estado'      => 'Finalizado',
        ],
        [
            'nombre'      => 'Sistema de Control de Accesos',
            'descripcion' => 'Herramienta web para registrar y monitorizar accesos físicos y digitales de empleados, integrada con la base de datos corporativa',
            'tipo'        => 'Proyecto interno',
            'tecnologias' => ['PHP', 'CodeIgniter', 'MySQL', 'jQuery'],
            'estado'      => 'Pendiente',
        ],
    ];

    public function getProyectos(): array
    {
        return $this->proyectos;
    }

    public function getTiposUnicos(): array
    {
        return array_unique(array_column($this->proyectos, "tipo"));
    }

    public function getTecnologiasUnicas(): array
    {
        $tecnologiasUnicas = [];
        foreach ($this->proyectos as $proyecto) {
            $tecnologiasUnicas = array_merge($tecnologiasUnicas, $proyecto["tecnologias"]);
        }
        return array_unique($tecnologiasUnicas);
    }

    public function getEstadosUnicos(): array
    {
        return array_unique(array_column($this->proyectos, "estado"));
    }

    public function aplicarFiltros($nombre, $tipo, $tecnologias, $estado): array
    {
        if (!$nombre && !$tipo && !$tecnologias && !$estado) {
            return $this->proyectos;
        }

        $proyectosFiltrados = [];
        foreach ($this->proyectos as $proyecto) {
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

        return $proyectosFiltrados;
    }
}
?>
