<h2 class="span contenttitle w-98">Administrador de SubCategorias</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias">Categorias</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias/nueva-categoria">Nueva Categoria</a>
</div>
<p class="titulo">Actualizar SubCategoria</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/categorias/svc/actualizar-subcategoria/{$sub->cat_id}" method="post" enctype="multipart/form-data">
    <table class="stats">
        <tr>
            <td class="rig">Categoria :</td>
            <td class="let">
                <select name="cat" id="cat" class="text w-25 span" >
                    <option selected="selected" value="0">- Seleccionar -</option>
                    {$html}
                </select>
                <p class="error" >{$error.categoria}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Nombre :</td>
            <td class="let">
                <input type="text" name="sub_nombre" value="{$sub->cat_nombre}" class="text w-40 span"/>
                <p class="error">{$error.sub_nombre}</p>
            </td>
        </tr>
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