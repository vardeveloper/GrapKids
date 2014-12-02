<h2 class="span contenttitle w-98">Administrador de SubCategorias</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias">Categorias</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias/nueva-categoria">Nueva Categoria</a>
</div>
<p class="titulo">Crear Nueva SubCategoria </p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/categorias/svc/guardar-subcategoria/{$cat_id}" method="post" enctype="multipart/form-data">
    <table class="stats">
        <tr>
            <td class="rig">Nombre :</td>
            <td class="let">
                <input type="text" name="sub_nombre" value="{$post.sub_nombre}"  class="text span w-40" />
                <p class="error">{$error.sub_nombre}</p>
            </td>
        </tr>
    </table>
    <table class="stats">
        <tr>
            <td class="rig">&nbsp;</td>
            <td class="let">
                <input class="adm_btn" name="btn_submit" type="submit" value="Guardar" />
                <input class="adm_btn" name="btn_reset" type="reset" value="Borrar" />
            </td>
        </tr>
    </table>
</form>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>