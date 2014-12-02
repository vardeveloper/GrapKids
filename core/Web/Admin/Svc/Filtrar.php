<?php

class Web_Admin_Svc_Filtrar {

    public function doIt() {
        $_SESSION['filtrar'] = array('seccion' => $_POST['seccion'],
                                    'unidad' => $_POST['pro_uni_id'],
                                    'categoria' => $_POST['pro_cat_id'],
                                    'order' => $_POST['order']);
        Ey::goBack();
    }

}