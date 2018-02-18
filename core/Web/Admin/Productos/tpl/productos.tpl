<h2 class="span contenttitle w-98">Administrador de Productos | Total : {$total}</h2>
<div class="span adm_datahead">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos">Productos</a>
    {if $tipo eq "administrador"}
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/nuevo-producto">Nuevo Producto</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/eliminar-producto">Desactivados</a>
    {/if}
    {if $optionsCategoria}
    <form name="frm1" method="post" action="{$smarty.const.BASE_WEB_ROOT}/admin/svc/filtrar">
        <div class="r spanr mr-1" style="float: right;"><input type="submit" value="Filtrar"/></div>
        <div class="r spanr mr-1" style="float: right;" id="combo_subcategoria">{$optionsCategoria}</div>
        <div class="r spanr mr-1" style="float: right;"><select name="pro_uni_id" id="pro_uni_id">{$optionsUnidad}</select></div>
        {if $tipo eq "administrador"}
        <div class="r spanr mr-1" style="float: right;">{$htmlOrden}</div>
        {/if}
        <input type="hidden" name="seccion" value="producto" />
    </form>
    {/if}
</div>
<div class="span adm_datahead">
    <form name="frm2" method="post" action="{$smarty.const.BASE_WEB_ROOT}/admin/productos/svc/do-search">
        <div class="r spanr mr-1" style="float: right;"><input type="submit" value="Buscar"/></div>
        <div class="r spanr mr-1" style="float: right;">{$titulo} <input type="text" name="criterio" class="w-30" value="Nombre Producto" onfocus="this.value=(this.value=='Nombre Producto')? '' : this.value ;" /></div>
    </form>
</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-15 c">Imagen</td>
            <td class="w-40">Producto</td>
            <td class="w-10 c">Precio</td>
            <td class="w-12 c" colspan="6"></td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$productos item=producto}
        <tr class="{$producto.bgcolor}">
            <td class="c"><img src="{$producto.imagen}" /></td>
            <td class="j t"><b>{$producto.html2}</b><br/><br/>{$producto.descripcion}</td>
            <td class="bld t r">S/. {$producto.precio} &nbsp; </td>
            {if $tipo eq "administrador"}
            <td class="w-2 t c">{$producto.categorias}</td>
            <td class="w-2 t c">{$producto.oferta}</td>
            <td class="w-2 t c">{$producto.bloquear}</td>
            <td class="w-2 t c">{$producto.destacado}</td>
            <td class="w-2 t c">{$producto.modificar}</td>
            <td class="w-2 t c">{$producto.eliminar}</td>
            {else}
            <td class="w-2 t"> &nbsp; </td>
            <td class="w-2 t"> {$producto.oferta} </td>
            <td class="w-2 t"> &nbsp; </td>
            <td class="w-2 t"> &nbsp; </td>
            <td class="w-2 t c">{$producto.modificar}</td>
            <td class="w-2 t"> &nbsp; </td>
            {/if}
        </tr>
        {/foreach}
    </tbody>
</table>
<div class="span adm_datafooter">
    {$footermsg}{$navigator}
</div>

<div id="tooltip" class="tooltip">
    Desactivar
</div>
<div id="tooltip2" class="tooltip">
    Editar
</div>
<div id="tooltip3" class="tooltip">
    Destacado
</div>
<div id="tooltip4" class="tooltip">
    Destacar
</div>
<div id="tooltip5" class="tooltip">
    Activo
</div>
<div id="tooltip6" class="tooltip">
    Nuevo
</div>
<div id="tooltip7" class="tooltip">
    Ofertar
</div>
<div id="tooltip8" class="tooltip">
    Ofertado
</div>
<div id="tooltip9" class="tooltip">
    Relacion Categorias
</div>
<div id="tooltip10" class="tooltip">
    Relacion Productos
</div>

{literal}
<script type="text/javascript">
    // execute your scripts when the DOM is ready. this is a good habit
    jQuery.noConflict();
    jQuery(document).ready(function() {
        // setup tooltip for a single DIV element
        jQuery(".desactivar").tooltip({
            // each trashcan image works as a trigger
            tip: '#tooltip',
            // custom positioning
            position: 'center right',
            // move tooltip a little bit to the right
            offset: [0, 15],
            // there is no delay when the mouse is moved away from the trigger
            delay: 0
        });
        // setup tooltip for a single DIV element
        jQuery(".editar").tooltip({
            // each trashcan image works as a trigger
            tip: '#tooltip2',
            // custom positioning
            position: 'center right',
            // move tooltip a little bit to the right
            offset: [0, 15],
            // there is no delay when the mouse is moved away from the trigger
            delay: 0
        });
        jQuery(".destacado").tooltip({
            // each trashcan image works as a trigger
            tip: '#tooltip3',
            // custom positioning
            position: 'center right',
            // move tooltip a little bit to the right
            offset: [0, 15],
            // there is no delay when the mouse is moved away from the trigger
            delay: 0
        });
        jQuery(".destacar").tooltip({
            // each trashcan image works as a trigger
            tip: '#tooltip4',
            // custom positioning
            position: 'center right',
            // move tooltip a little bit to the right
            offset: [0, 15],
            // there is no delay when the mouse is moved away from the trigger
            delay: 0
        });
        jQuery(".activo").tooltip({
            // each trashcan image works as a trigger
            tip: '#tooltip5',
            // custom positioning
            position: 'center right',
            // move tooltip a little bit to the right
            offset: [0, 15],
            // there is no delay when the mouse is moved away from the trigger
            delay: 0
        });
        jQuery(".nuevo").tooltip({
            // each trashcan image works as a trigger
            tip: '#tooltip6',
            // custom positioning
            position: 'center right',
            // move tooltip a little bit to the right
            offset: [0, 15],
            // there is no delay when the mouse is moved away from the trigger
            delay: 0
        });
        jQuery(".ofertar").tooltip({
            // each trashcan image works as a trigger
            tip: '#tooltip7',
            // custom positioning
            position: 'center right',
            // move tooltip a little bit to the right
            offset: [0, 15],
            // there is no delay when the mouse is moved away from the trigger
            delay: 0
        });
        jQuery(".ofertado").tooltip({
            // each trashcan image works as a trigger
            tip: '#tooltip8',
            // custom positioning
            position: 'center right',
            // move tooltip a little bit to the right
            offset: [0, 15],
            // there is no delay when the mouse is moved away from the trigger
            delay: 0
        });
        jQuery(".categorias").tooltip({
            // each trashcan image works as a trigger
            tip: '#tooltip9',
            // custom positioning
            position: 'center right',
            // move tooltip a little bit to the right
            offset: [0, 15],
            // there is no delay when the mouse is moved away from the trigger
            delay: 0
        });
        jQuery(".relacion").tooltip({
            // each trashcan image works as a trigger
            tip: '#tooltip10',
            // custom positioning
            position: 'center right',
            // move tooltip a little bit to the right
            offset: [0, 15],
            // there is no delay when the mouse is moved away from the trigger
            delay: 0
        });
    });
</script>
{/literal}