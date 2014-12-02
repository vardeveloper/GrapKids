<h2 class="span contenttitle w-98">Administrador de Delivery</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/delivery">Distritos</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/banner/nuevo-delivery">Nuevo Distrito</a>
</div>
<p class="titulo">Modificar Distrito</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/delivery/svc/actualizar-delivery/{$delivery->del_id}" method="post"  enctype="multipart/form-data" id="form1" >
    <table class="stats" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="rig">Distrito : </td>
            <td class="let">
                <input type="text" name="distrito" id="distrito" value="{$delivery->del_distrito}" class="text span w-30" />
            </td>
        </tr>
        <tr>
            <td class="rig">Codigo : </td>
            <td class="let">
                <input type="text" name="codigo" id="codigo" value="{$delivery->del_codigo}" class="text span w-30" />
            </td>
        </tr>
        <tr>
            <td class="rig">Precio Soles S/. : </td>
            <td class="let">
                <input type="text" name="precio" id="precio" value="{$delivery->del_precio}" class="text span w-30" />
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input class="adm_btn" name="submit2" type="submit" id="submit2" value="Guardar" /></td>
        </tr>
    </table>
</form>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>