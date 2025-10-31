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

        // Obtener idioma de la cookie
        $idioma = $_COOKIE["idioma"] ?? "es";

        // Aplicar filtros
        $proyectosFiltrados = $model->aplicarFiltros($nombre, $tipo, $tecnologias, $estado);

        // Obtener únicos para los filtros
        $tipos = $model->getTiposUnicos();
        $tecnologiasUnicas = $model->getTecnologiasUnicas();
        $estadosUnicos = $model->getEstadosUnicos();

        $proyectos_length = count($model->getProyectos());

        // Cargamos el View pasando el idioma
        require_once "views/inicio.php";
    }

    public function sesionLog()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Verificar existencia y validez temporal de la sesión
        if (!isset($_SESSION["nombre"]) || !isset($_SESSION["time"])) {
            session_destroy();
            header("location: sesion");
            exit;
        }

        // Verificar expiración (2 minutos = 120 segundos)
        if (time() - $_SESSION["time"] > 120) {
            session_destroy();
            header("location: sesion");
            exit;
        }

        // Actualizar tiempo de sesión en cada interacción
        $_SESSION["time"] = time();
    }
}
?>