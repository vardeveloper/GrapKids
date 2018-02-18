<?php

class Web_Admin_Pedidos_Wgt_FechaTo
{

    public function render($day = '', $month = '', $year = '')
    {
        $dia = '<select id="date-sel3-dd" name="dia" class="adm_user2">
          <option value="">Dia</option>';

        for ($i = 1; $i <= 31; $i++) {
            if ($day == $i) {
                $dia.='<option selected="selected" value="' . $i . '">' . $i . '</option>';
            } else {
                $dia.='<option value="' . $i . '">' . $i . '</option>';
            }
        }
        $dia.='</select>';

        $mes = '<select id="date-sel3-mm" name="mes" class="adm_user">
           <option value="">-- Mes --</option>';

        $arraymes = array(1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Setiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        );
        for ($j = 1; $j <= 12; $j++) {
            if ($month == $j) {
                $mes.='<option selected="selected" value="' . $j . '">' . $arraymes[$j] . '</option>';
            } else {
                $mes.='<option value="' . $j . '">' . $arraymes[$j] . '</option>';
            }
        }
        $mes.='</select>';

        $ano = '<input type="text" value="' . $year . '" class="w3em highlight-days-67 split-date no-transparency adm_pass w-4" id="date-sel3" name="anio" />';

        return $dia . $mes . $ano;
    }

}