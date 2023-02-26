<?php
require ("controlador.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
    <link rel="stylesheet" href=".\node_modules\bootstrap\dist\css\bootstrap.min.css" type="text/css">

</head>
<body>
<div class="contenedorJugar">
    <div class="opciones">
        <h2>OPCIONES</h2>
        <fieldset>
            <legend>Acciones posibles</legend>
            <form action="jugar.php" method="POST">
                <input type="submit" value="<?=$mostrar_ocultar_clave?>" name="submit">
                <input type="submit" value="Resetear la Clave" name="submit">
            </form>
        </fieldset>
        <fieldset>
            <legend>Menú jugar</legend>
            <form action="jugar.php" method="POST">
                <div class="grupo_select">
                    <h3> Selecciona 4 colores para jugar</h3>
                    <?=Plantilla::generarFormulario()?>

                </div>
                <input type="submit" value="Jugar" name="submit" class="btn btn-success mt-2">
            </form>
        </fieldset>


    </div>

    <fieldset class="informacion">
        <h2>INFORMACIÓN</h2>
        <fieldset>
            <legend>Sección de información</legend>
           <?php
                if(isset ($informacion)){
                    echo $informacion;
                }
                ?>
            <?php
                if(isset ($jugada)){
                    echo $jugada;
                }else{
                    echo "No hay información que mostrar";
                }
            ?>
        </fieldset>
    </fieldset>
</div>

<script src="./script.js"></script>
</body>

</html>
