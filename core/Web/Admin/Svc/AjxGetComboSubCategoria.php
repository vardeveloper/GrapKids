<?php

/* /svc/ajx-get-cat/table/id_padre/seleccionado */

class Web_Admin_Svc_AjxGetComboSubCategoria {

    public function doIt() {
        $idUnidad = Ey::getPrm(3);
        $select = Web_Db_Function::getAllCategoriaOptions($idUnidad);
        echo $select;
    }

}