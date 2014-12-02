{literal}
<script type="text/javascript">
    $(document).ready(function(){
        $("select#cat").live("change", function(){
            var id = $(this).val();
            $('select#sub').html('');
            $.ajax({
                type: "POST",
                url: "{/literal}{$smarty.const.WEB_ROOT}{literal}/admin/categorias/svc/ajax-combo-categorias",
                data: "cat="+ id,
                cache: false,
                success : function(html){
                    $('select#sub').append(html);
                }
            });
            return false;
        });
    });
</script>
{/literal}
<h2 class="span contenttitle w-98">Administrador de SubCategorias</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias">Categorias</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias/nueva-categoria">Nueva Categoria</a>
</div>
<p class="titulo">Crear Nueva SubCategoria </p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/categorias/svc/guardar-relacion/{$pro_id}" method="post" enctype="multipart/form-data">
    <table class="stats">
        <tr>
            <td class="rig">Categoría :</td>
            <td class="let">
                <select name="cat" id="cat" class="text w-25">
                    <option selected="selected" value=""> - Seleccionar - </option>
                    {$html}
                </select>
                <p class="error">{$error.cat}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">SubCategoría :</td>
            <td class="let">
                <select name="sub" id="sub" class="text w-25"></select>
            </td>
        </tr>
    </table>
    <table class="stats">
        <tr>
            <td class="rig">&nbsp;</td>
            <td class="let">
                <input class="adm_btn" name="submit" type="submit" id="submit" value="Guardar" />
                <input class="adm_btn" name="submit2" type="reset" id="submit2" value="Borrar" />
            </td>
        </tr>
    </table>
</form>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>