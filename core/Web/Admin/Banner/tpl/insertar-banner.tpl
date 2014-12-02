<h2 class="span contenttitle w-98">Administrador de Banner Home</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/banner">Banner</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/banner/nuevo-banner">Nuevo Banner</a>
</div>
<p class="titulo">Crear Nuevo Banner</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/banner/svc/guardar-banner" method="post" enctype="multipart/form-data" id="form1">
    <table class="stats" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="rig">Título : </td>
            <td class="let">
                <input type="text" name="ba_titulo" value="{$post.ba_titulo}" class="text w-30 span"/>
                <p class="error">{$error.ba_titulo}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Imagen JPG : </td>
            <td class="let">
                <input type="file" name="imagen" class="span"/>(660 × 328)
                <p class="error">{$error.imagen}</p>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input class="adm_btn" name="btn_submit" type="submit" value="Guardar" />
                <input class="adm_btn" name="btn_reset" type="reset" value="Borrar" />
            </td>
        </tr>
    </table>
</form>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>