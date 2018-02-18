<h2 class="span contenttitle w-98">Administrador de Productos</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos">Productos</a>
    {if $tipo eq "administrador"}
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/nuevo-producto">Nuevo Producto</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/eliminar-producto">Desactivados</a>
    {/if}
</div>
<p class="titulo">Crear Descuento Producto</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/productos/svc/guardar-oferta/{$pro_id}/1" method="post"  enctype="multipart/form-data">
    <table class="stats">
        {*
        <tr>
            <td class="rig">Precio Oferta :</td>
            <td class="let">
                <input type="text" name="pro_precio_oferta" value="{$post.pro_precio_oferta}"  class="text span w-10" maxlength="11"/>
                <p class="error">{$error.pro_precio_oferta}</p>
            </td>
        </tr>
        *}
        <tr>
            <td class="rig">Descuento % :</td>
            <td class="let">
                <input type="text" name="pro_descuento" value="{$post.pro_descuento}"  class="text span w-2" maxlength="2" />
            </td>
        </tr>
        {*
        <tr>
            <td class="rig">Promoción :</td>
            <td class="let">
                <input type="text" name="pro_valor1" value="{$post.pro_valor1}"  class="text span w-2" style="float: none;"/> X
                <input type="text" name="pro_valor2" value="{$post.pro_valor2}"  class="text span w-2" style="float: none;"/>
            </td>
        </tr>
        *}
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