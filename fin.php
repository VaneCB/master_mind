<?php
$carga = fn($clase)=>require_once("$clase.php");
spl_autoload_register($carga);

session_start();
$mostrar_ocultar_clave="Mostrar Clave";
$clave =Clave::obtenerClave();
$jugadas = $_SESSION['jugadas'];
$win = $_GET['win'] ??"";
$intento = sizeof ($_SESSION['jugadas']);
if($win){
    $msj ="<h1>FELICIDADES HAS ACERTADO EN $intento JUGADAS </h1>";
}else{
    $msj = "<h1>¡HAS AGOTADO TODOS TUS INTENTOS!</h1>";

}
echo $msj;

$html_clave= Clave::getClave();
$informacion = "<h1>Clave actual es $html_clave</h1>";
$informacion .= Jugada::obtener_historico_jugadas();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
    <link rel="stylesheet" href=".\node_modules\bootstrap\dist\css\bootstrap.min.css" type="text/css">

</head>
<body>
    <?=$informacion?>
</body>
</html>