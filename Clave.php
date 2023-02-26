<?php

class Clave
{
public const COLORES=['Azul','Rojo','Naranja','Verde','Violeta','Amarillo','Marron','Rosa'];
private static $clave =[];
static public function obtenerClave(){
    if (isset($_SESSION['clave'])){
        self::$clave = $_SESSION['clave'];
         echo "SESION INICIADA";
    }else{
        self::generaClave();
        $_SESSION['clave']=self::$clave;
        echo "SESION NO INICIADA";
        //var_dump(self::$clave);
    }

    return self::$clave;
    }
    private static function generaClave()
    {
        $colores = self::COLORES;
        $posiciones = array_rand($colores, 4);
        foreach ($posiciones as $posicionColores) {
            self::$clave[] = $colores[$posicionColores];
        }
        echo "CLAVE GENERADA";
    }
    public static function getClave(){
        $clave="";

        foreach (self::$clave as $color){

            $clave.="<span class='$color'>$color</span>";
        }
        return $clave;
    }

    public static function resetearClave()
    {
        self::$clave = [];
        session_destroy();
        session_start();
        self::obtenerClave();

        echo "CLAVE RESETEADA";
    }
}

