<?php
class SesionController
{
    public function index()
    {
        session_start();

        $nombre = $_POST["nombre"] ?? "";
        $contrasenya = $_POST["contrasenya"] ?? "";
        $idioma = $_POST["idioma"] ?? "";

        if ($nombre == "daw" && $contrasenya == "daw2025") {
            $_SESSION["nombre"] = $nombre;
            $_SESSION["contrasenya"] = $contrasenya;
            $_SESSION["time"] = time();

            setcookie("idioma", $idioma, time() + 2*3600);

            header("location: ./");
        }

        require_once "views/sesion.php";
    }
}
?>