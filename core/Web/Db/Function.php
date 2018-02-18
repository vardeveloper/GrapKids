<?php

class Web_Db_Function
{

    public function getUnidadOptions($selected = '')
    {
        global $db;

        $selectUnidad = $db->select()
                ->from('gk_categorias', array('cat_id', 'cat_nombre'))
                ->where('cat_estado = ?', 1)
                ->where('cat_padre_id = ?', 0)
                ->order('cat_nombre');

        $rowsUnidad = $db->fetchAll($selectUnidad);

        if (count($rowsUnidad) > 0) {
            $optionsUnidad = '<option value="0"> - Todos los Productos - </option>';

            foreach ($rowsUnidad as $rowUnidad) {
                $optionsUnidad.= '<option value="' . $rowUnidad->cat_id . '"';
                $optionsUnidad.= $selected == $rowUnidad->cat_id ? ' selected' : '';
                $optionsUnidad.= '>' . $rowUnidad->cat_nombre . '</option>';
            }
        }

        return $optionsUnidad;
    }

    public function getUnidadNombre($id)
    {
        global $db;

        if ($id != '') {
            $selectUnidad = $db->select()
                    ->from('gk_categorias', array('cat_nombre'))
                    ->where('cat_estado <> ?', 2)
                    ->where('cat_id = ?', $id);
            $rowUnidad = $db->fetchRow($selectUnidad);

            if ($rowUnidad) {
                return $rowUnidad->cat_nombre;
            }
        }

        return false;
    }

    /*  Consulta Sub categoria para el combo del filtro */

    public function getAllCategoriaOptions($idUnidad = 0, $idSelected = 0, $stilo = 'text')
    {
        global $db;
        if ($stilo != 'text') {
            $stilo = 'select';
        }

        $optionsCategoria = '<select name="pro_cat_id" id="pro_cat_id">';
        $optionsCategoria.= '<option value="0"> - Seleccionar - </option>';

        if ($idUnidad != 0) {
            $selectCategoria = $db->select()
                    ->from(array('cat' => 'gk_categorias'), array('cat_id', 'cat_nombre'))
                    ->where('cat_padre_id = ?', $idUnidad)
                    ->order('cat_id ASC');

            $rowsCategorias = $db->fetchAll($selectCategoria);

            if ($rowsCategorias) {
                foreach ($rowsCategorias as $rowCategoria) {
                    $optionsCategoria.= '<option value="' . $rowCategoria->cat_id . '"';
                    $optionsCategoria.= $idSelected == $rowCategoria->cat_id ? ' selected' : '';
                    $optionsCategoria.= '>' . $rowCategoria->cat_nombre . '</option>';
                }
            }
        }

        $optionsCategoria.= '</select>';

        return $optionsCategoria;
    }

}

