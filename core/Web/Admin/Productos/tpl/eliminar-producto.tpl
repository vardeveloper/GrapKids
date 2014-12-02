<h2 class="span contenttitle w-98">Administrador de Productos | Desactivados : {$total}</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos">Productos</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/nuevo-producto">Nuevo Producto</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/eliminar-producto">Desactivados</a>
</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-15 c">Imagen</td>
            <td class="w-40">Producto</td>
            <td class="w-10 c">Precio</td>
            <td class="w-12 c" colspan="2"></td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$productos item=producto}
        <tr class="{$producto.bgcolor}">
            <td class="w-15 c"><img src="{$smarty.const.WEB_ROOT}/svc/get-img/productos-pro_{$producto.id}_small/150:113" /></td>
            <td class="w-40 j t"><b>{$producto.html2}</b><br /><br />{$producto.descripcion}</td>
            <td class="w-10 bld t r">S/. {$producto.precio} &nbsp; </td>
            <td class="w-6 t c">{$producto.restaurar}</td>
            <td class="w-6 t c">{$producto.eliminar}</td>
        </tr>
        {/foreach}
    </tbody>
</table>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navigator}
</div>
{literal}
<script type="text/javascript">
    window.addEvent('load', function() {
        var els = $$('a.adm_alert_delete');
        alertBox = new SexyAlertBox();
        els.each(function(el){
            el.addEvent('click', function(e){
                e.stop();
                link=el.href;
                alertBox.confirm('<p>¿Está seguro que desea eliminar este Producto?<\/p>',{
                    onComplete: function(returnvalue) {
                        if(returnvalue){
                            document.location.href=link;
                        }
                    }
                });
            });
        });
    });
</script>
{/literal}