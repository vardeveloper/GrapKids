<h2 class="span contenttitle w-98">Administrador de Videos</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/videos">Videos</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/videos/nuevo-video">Nuevo Video</a>
</div>
<p class="titulo">Crear Nuevo Video</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/videos/svc/guardar-video" method="post" enctype="multipart/form-data">
    <table class="stats" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="rig">Título : </td>
            <td class="let">
                <input type="text" name="vid_titulo" id="vid_titulo" value="{$post.vid_titulo}" class="text w-40"/>
                <p class="error">{$error.vid_titulo}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Link : </td>
            <td class="let">
                <textarea name="vid_link" id="vid_link" class="h-7">{$post.vid_link}</textarea>
                <p class="error">{$error.vid_link}</p>
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
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>