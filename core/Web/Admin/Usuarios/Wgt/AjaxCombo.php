<?php

class Web_Admin_Usuarios_Wgt_AjaxCombo
{

    public function getform($parm='')
    {
        $html3 = '';
        if ($parm == 'administrador') {
            $html3.='Todos los Privilegios';
        } elseif ($parm == 'usuario') {
            $html3.='
            <ul class="privi">
                <li><input name="pri_1" type="checkbox" value="categorias" /> Categorias </li>
                <li><input name="pri_2" type="checkbox" value="productos" /> Productos </li>
                <li><input name="pri_3" type="checkbox" value="clientes" /> Clientes </li>
                <li><input name="pri_4" type="checkbox" value="pedidos" /> Pedidos </li>
                <li><input name="pri_5" type="checkbox" value="banner" /> Banner </li>
            </ul>';
        } else {
            $html3.='   Eligir el tipo de usuario para los privilegios   ';
        }
        return $html3;
    }

}