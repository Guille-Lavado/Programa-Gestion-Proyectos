<?php
class InicioController
{
    public function index()
    {
        self::sesionLog();

        require_once "models/Model.php";
        $model = new Model();

        // Filtros
        $nombre = $_GET["nombre"] ?? "";
        $tipo = $_GET["tipo"] ?? "";
        $tecnologias = $_GET["tecnologias"] ?? [];
        $estado = $_GET["estado"] ?? "";

        echo $_COOKIE["idioma"];

        // Aplicar filtros
        $proyectosFiltrados = $model->aplicarFiltros($nombre, $tipo, $tecnologias, $estado);

        // Obtener únicos para los filtros
        $tipos = $model->getTiposUnicos();
        $tecnologiasUnicas = $model->getTecnologiasUnicas();
        $estadosUnicos = $model->getEstadosUnicos();

        $proyectos_length = count($model->getProyectos());

        // Cargamos el View
        require_once "views/inicio.php";
    }

    public function sesionLog()
    {
        session_start();
        
        if (!isset($_SESSION["nombre"]) || !isset($_SESSION["contrasenya"]) || !isset($_SESSION["time"])) {
            session_destroy();
            header("location: sesion");
        }

        
        if (time() - $_SESSION["time"] > 120) {
            session_destroy();
            header("location: sesion");
        }
    }
}
?>
