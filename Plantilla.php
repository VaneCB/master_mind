<?php

class Plantilla
{
    static public function generarFormulario()
    {
        $html_select = "";

        for ($n = 0; $n < 4; $n++) {
            $html_select .= "<select name='combinacion[]' class='my_selector'>";
            foreach (Clave::COLORES as $color) {
                $html_select .= "<option class=$color value='$color'>$color</option>";

            }
            $html_select .= "</select>";


        }
        return $html_select;
    }

}