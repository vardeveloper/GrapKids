<?php

class Web_Admin_Categorias_Svc_AjaxComboCategorias
{

    public function doIt()
    {
        $id = Ey::getPost('cat');

        if ($id != '') {
            $obj = new Web_Db_Categorias();
            $db = $obj->getAdapter();
            $select = $db->select()
                    ->from('ma_categorias', array('cat_nombre', 'cat_id', 'cat_padre_id'))
                    ->where('cat_padre_id=?', $id);
//                    ->where('sub_estado=?', 1);

            $rs = $db->fetchAll($select);
        }

//        $html = '<select name="sub" id="sub" class="text w-25" >';
//        $html.='<option selected="selected" value="">' . 'Seleccione' . '</option>';

        foreach ($rs as $item) {
            $html.='<option value="' . $item->cat_id . '">' . $item->cat_nombre . '</option>';
        }

//        $html.='</select>';

        echo $html;
    }

}