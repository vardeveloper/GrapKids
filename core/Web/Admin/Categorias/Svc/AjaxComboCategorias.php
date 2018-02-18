<?php

class Web_Admin_Categorias_Svc_AjaxComboCategorias {

    public function doIt() {

        $id = Ey::getPost('cat');

        if ($id != '') {
            $obj3 = new Web_Db_Categorias();
            $db3 = $obj3->getAdapter();
            $select3 = $db3->select()
                            ->from('ma_categorias',array('cat_nombre', 'cat_id', 'cat_padre_id'))
                            ->where('cat_padre_id=?', $id);
                            //->where('sub_estado=?', 1);

            $rs3 = $db3->fetchAll($select3);
        }

//        $html3 = '<select name="sub" id="sub" class="text w-25" >';
//        $html3.='<option selected="selected" value="">' . 'Seleccione' . '</option>';

        foreach ($rs3 as $item3) {
            $html3.='<option value="' . $item3->cat_id . '">' . $item3->cat_nombre . '</option>';
        }

//        $html3.='</select>';

        echo $html3;
    }

}