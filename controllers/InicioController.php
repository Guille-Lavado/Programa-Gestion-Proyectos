<?php
class InicioController
{
    public function index()
    {
        require_once "models/Model.php";
        $model = new Model();

        // Filtros
        $nombre = $_GET["nombre"] ?? "";
        $tipo = $_GET["tipo"] ?? "";
        $tecnologias = $_GET["tecnologias"] ?? [];
        $estado = $_GET["estado"] ?? "";

        // Aplicar filtros
        $proyectosFiltrados = $model->aplicarFiltros($nombre, $tipo, $tecnologias, $estado);

        // Obtener tipos únicos para los filtros
        $tipos = $model->getTiposUnicos();
        
        // Obtener tecnologías únicas para los filtros
        $tecnologiasUnicas = $model->getTecnologiasUnicas();

        // Obtener estados únicas para los filtros
        $estadosUnicos = $model->getEstadosUnicos();

        $proyectos_length = count($model->getProyectos());

        // Cargamos el View
        require_once "views/inicio.php";
    }
}
?>
