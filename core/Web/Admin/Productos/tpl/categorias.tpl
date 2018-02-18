<h2 class="span contenttitle w-98">Administrador de Productos | Relacion Producto - Categoria</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos">Productos</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/nuevo-producto">Nuevo Producto</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/eliminar-producto">Desactivados</a>
</div>
<div class="span adm_datafooter" style="margin-bottom:0">{$error.cat}</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td class="w-15 c"><img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}_small/150:113" /></td>
        <td class="w-40 j t"><b>{$producto->html2}</b><br/><br/>{$producto->pro_descripcion}</td>
        <td class="w-10 bld t r">S/. {$producto->pro_precio} &nbsp; </td>
        <td class="w-10 bld t c">{$producto->pro_fecha|date_format:"%d/%m/%Y"}</td>
    </tr>
</table>
<div class="span adm_datafooter"></div>
<table class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-25">Categoria</td>
            <td class="w-25">SubCategoria</td>
            <!--td class="w-3">Check</td>
            <td class="w-6">Id</td-->
            <td class="w-5 c">Estado</td>
            <td class="w-5 c">Relacionar</td>
            <td class="w-5 c">Eliminar</td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$categorias item=cat}
        <tr class="{$cat.bgcolor}">
            <td class="bld">{$cat.cat_nombre}</td>
            <td class="bld">&nbsp;</td>
            <!--td>{$cat.producto}</td>
            <td>{$cat.ids}</td-->
            <td class="c">{$cat.estado}</td>
            <td class="c">{$cat.relacionar}</td>
            <td class="c">{$cat.eliminar}</td>
        </tr>
            {foreach from=$subcategorias item=su}
                {if $su.sub_id_padre == $cat.cat_id}
                <tr class="{$su.bgcolor}">
                    <td class="bld">&nbsp;</td>
                    <td class="bld">{$su.sub_nombre}</td>
                    <!--td>{$su.producto}</td>
                    <td>{$su.ids}</td-->
                    <td class="c">{$su.estado}</td>
                    <td class="c">{$su.relacionar}</td>
                    <td class="c">{$su.eliminar}</td>
                </tr>
                {/if}
            {/foreach}
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
                alertBox.confirm('<p>¿Está seguro que desea eliminar esta Relación Categoría?<\/p>',{
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