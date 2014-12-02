<?php

class Web_Admin_Clientes_Svc_ExportarExcel
{

    public function doIt()
    {
        $this->convertirExcel();
    }

    private function convertirExcel()
    {
        $obj = new Web_Db_Clientes();
        $db = $obj->getAdapter();
        $select = $db->select()
                ->from('gk_clientes', array('cli_email', 'cli_nombre', 'cli_apellido', 'cli_distrito', 'cli_empresa'))
                ->where('cli_estado=?', 1)
                ->order('cli_apellido');
        $rs = $db->fetchAll($select);

        $matriz = array();
//        Matriz a convertir: 
        $matriz[] = array('Correo', 'Nombre', 'Apellido', 'Distrito', 'Empresa');
        foreach ($rs as $item) {
            $matriz[] = array(strtolower($item->cli_email), 
                                ucwords(mb_strtolower($item->cli_nombre, 'UTF-8')), 
                                ucwords(mb_strtolower($item->cli_apellido, 'UTF-8')), 
                                $item->cli_distrito, 
                                $item->cli_empresa);
        }

        $excel = new Export2Excel();
//        Convertimos la matriz a Excel: 
        $excel->WriteMatriz($matriz);
//        Hacemos que sea descargable: 
        $excel->Download("ArchivoExcel");
    }

}

