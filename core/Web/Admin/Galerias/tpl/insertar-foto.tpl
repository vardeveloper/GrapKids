<h2 class="span contenttitle w-93">Administrador de Galerias | Nueva Foto</h2>
<div class="span adm_datahead w-93">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/galerias">Galerias</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/galerias/nueva-galeria">Nueva Galeria</a>
</div>
<p class="titulo">Crear Nueva Foto</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/galerias/svc/guardar-foto/{$gal_id}" method="post"  enctype="multipart/form-data" id="form1" >
    <table class="stats" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="rig">Título : </td>
            <td class="let">
                <input type="text" name="fot_titulo" id="fot_titulo" class="text w-40" value="{$post.fot_titulo}" />
                <p class="error">{$error.fot_titulo}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Imagen : </td>
            <td class="let">
                <input type="file" name="imagen"/>jpg (600 x 450)
                <p class="error">{$error.imagen}</p>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input class="adm_btn" name="submit" type="submit" id="submit" value="Guardar" />
                <input class="adm_btn" name="submit2" type="reset" id="submit2" value="Borrar" />
            </td>
        </tr>
    </table>
</form>
<div class="span adm_datafooter w-93">
    {$footermsg}{$navegacion}
</div>