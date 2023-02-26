<?php

class Jugada
{
    private $colores;
    private $posicionesAcertadas;
    private $coloresAcertados;


    public function __construct(array $jugada)
    {
        $this->colores = $jugada;      
        $this->posicionesAcertadas = 0;
        $this->coloresAcertados = 0;
        $clave = Clave::obtenerClave();
        $this->evalua_jugada($clave);
  
    }


    public function get_posicionesAcertadas()
    {
    return $this->posicionesAcertadas;
    }

    private function evalua_jugada(array $clave)
    {
        foreach ($clave as $color) {
            if (in_array($color, $this->colores)) {
                $this->coloresAcertados++;
            }
        }
        foreach ($clave as  $pos => $color) {
            if ($color == $this->colores [$pos]) {
                $this->posicionesAcertadas++;
            }
        }
    }

    /*private function evalua_jugada(array $clave){
        $coloresAcertados = array_intersect($clave,$this->colores);
        $this->coloresAcertados= count($coloresAcertados);
        $posicionesAcertadas = array_intersect_assoc($clave,$this->colores);
        $this->posicionesAcertadas = count($posicionesAcertadas);

    }*/

    public static function obtener_jugadas()
    {
        $html = "";
        $jugadas = $_SESSION['jugadas'];
        foreach ($jugadas as $jugada) {
            $jugada = unserialize($jugada);
            $html .= "$jugada<br>";
        }
    }
    public static function obtener_historico_jugadas()
    {
        $html = "";
        $jugadas = $_SESSION['jugadas'];
        foreach ($jugadas as $jugada) {
            $jugada = unserialize($jugada);
            $html .= "$jugada<br>";
        }
        return $html;
    }

    public function __toString(): string
    {
        $html_jugada = "";
        for ($n = 0; $n < $this->posicionesAcertadas; $n++) {
            $html_jugada .= "<span class='negro mx-1'>$n</span>";
        }
        for ($n = $this->posicionesAcertadas; $n < $this->coloresAcertados; $n++) {
            $html_jugada .= "<span class='blanco mx-1'>$n</span>";
        }
        foreach ($this->colores as $color) {
            $html_jugada .= "<span class='$color mx-1'>$color</span>";

        }
        return $html_jugada;
    }

}
?>