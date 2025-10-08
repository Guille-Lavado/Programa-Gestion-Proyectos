<?php
class Model
{
    public function getProyectos(): array
    {
        $this->proyectos = [
            [
                'Nombre' => 'Intranet Corporativa',
                'Descripción' => 'Desarrollo de una intranet para
centralizar documentos internos, comunicados y herramientas de gestión del
personal',
                'Tipo' => 'Proyecto interno',
                'Tecnologías' => ['PHP', 'Laravel', 'MySQL', 'Bootstrap'],
                'Estado' => 'En progreso'
            ],
            [
                'Nombre' => 'Portal del Cliente - Consultoría Alfa',
                'Descripción' => 'Plataforma web personalizada para la
gestión de incidencias y seguimiento de proyectos para un cliente externo',
                'Tipo' => 'Consultoría',
                'Tecnologías' => [
                    'PHP',
                    'Symfony',
                    'MariaDB',
                    'Tailwind
CSS'
                ],
                'Estado' => 'En progreso'
            ],
            [
                'Nombre' => 'Gestor de Formación Continua',
                'Descripción' => 'Aplicación para el departamento de RRHH
que permite planificar, inscribir y evaluar cursos de formación interna',
                'Tipo' => 'Proyecto interno',
                'Tecnologías' => [
                    'PHP',
                    'Laravel',
                    'PostgreSQL',
                    'Vue.js'
                ],
                'Estado' => 'Bloqueado'
            ],
            [
                'Nombre' => 'Evaluación del Desempeño',
                'Descripción' => 'Aplicación web para gestionar las
evaluaciones anuales del personal, con informes automáticos y exportación
de resultados',
                'Tipo' => 'Iniciativa RRHH',
                'Tecnologías' => ['PHP', 'Laravel', 'MySQL', 'Chart.js'],
                'Estado' => 'Finalizado'
            ],
            [
                'Nombre' => 'Sistema de Control de Accesos',
                'Descripción' => 'Herramienta web para registrar y
monitorizar accesos físicos y digitales de empleados, integrada con la base
de datos corporativa',
                'Tipo' => 'Proyecto interno',
                'Tecnologías' => ['PHP', 'CodeIgniter', 'MySQL', 'jQuery'],
                'Estado' => 'Pendiente'
            ]
        ];
    }
}
?>
