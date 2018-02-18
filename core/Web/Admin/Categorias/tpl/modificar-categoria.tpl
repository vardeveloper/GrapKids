<h2 class="span contenttitle w-98">Administrador de Categorias</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias">Categorias</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias/nueva-categoria">Nueva Categoria</a>
</div>
<p class="titulo">Actualizar Categoria</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/categorias/svc/actualizar-categoria/{$categoria->cat_id}" method="post" enctype="multipart/form-data">
    <table class="stats">
        <tr>
            <td class="rig">Nombre :</td>
            <td class="let">
                <input type="text" name="cat_nombre" value="{$categoria->cat_nombre}" class="text w-40 span"/>
                <p class="error">{$error.cat_nombre}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Title :</td>
            <td class="let">
                <textarea name="cat_title" id="cat_title" class="h-5">{$categoria->cat_title}</textarea>
            </td>
        </tr>
        <tr>
            <td class="rig">Meta Description :</td>
            <td class="let">
                <textarea name="cat_description" id="cat_description" class="h-10">{$categoria->cat_description}</textarea>
            </td>
        </tr>
        <tr>
            <td class="rig">Meta Keywords :</td>
            <td class="let">
                <textarea name="cat_keywords" id="cat_keywords" class="h-10">{$categoria->cat_keywords}</textarea>
            </td>
        </tr>
        <tr>
            <td class="rig">Codigo Analytics :</td>
            <td class="let">
                <textarea name="cat_analytics" id="cat_analytics" class="h-10">{$categoria->cat_analytics}</textarea>
            </td>
        </tr>
        <!--tr>
            <td class="rig">Imagen :</td>
            <td class="let"><img src="" /></td>
        </tr>
        <tr>
            <td class="rig">Imagen JPG (990px × 193px) :</td>
            <td class="let">
                <input name="imagen" type="file" class="span" />
            </td>
        </tr-->
    </table>
    <table class="stats">
        <tr>
            <td class="rig">&nbsp;</td>
            <td class="lef">
                <input class="adm_btn" name="btn_submit" type="submit" value="Guardar" />
                <input class="adm_btn" name="btn_reset" type="reset" value="Borrar" />
            </td>
        </tr>
    </table>
</form>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>