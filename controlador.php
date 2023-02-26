<?php
$carga = fn($clase)=>require_once("$clase.php");
spl_autoload_register($carga);

session_start();

$clave =Clave::obtenerClave();
$mostrar_ocultar_clave="Mostrar Clave";
$texto_informativo="";

function evaluar_fin_juego(Jugada $jugada)
{
    if ($jugada->get_posicionesAcertadas() == 4) {
        $win = true;
        header("location:fin.php?win=$win");
        exit();
    }
if (sizeof($_SESSION['jugadas'])>=14){
    $win=false;
    header("location:fin.php?win=$win");
    exit();
}
}
if (isset($_POST['submit'])){
   $opcion =$_POST['submit']; 


    switch ($opcion){

        case "Mostrar Clave":
            $mostrar_ocultar_clave="Ocultar Clave";
            $informacion = Clave::getClave();
            break;
        case "Ocultar clave":
            $mostrar_ocultar_clave="Mostrar Clave";
            break;
        case "Resetear la Clave":
            Clave::resetearClave();
            break;
        case "Jugar":
            $jugada = new Jugada ($_POST['combinacion']);
            $_SESSION['jugadas'][]=serialize($jugada);
            evaluar_fin_juego($jugada);
            $informacion =Jugada::obtener_jugadas();
    }
}
?>