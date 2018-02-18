<h2 class="span contenttitle w-98">Administrador de Categorias | Total : {$total}</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias">Categorías</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias/nueva-categoria">Nueva Categoría</a>
</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-25">Categoria</td>
            <td class="w-25">SubCategoria</td>
            <td class="w-6 c">Productos</td>
            <td class="w-4 c">Agregar</td>
            <td class="w-2 c">Estado</td>
            <td class="w-2 c">Editar</td>
            <td class="w-2 c">Eliminar</td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$categorias item=cat}
        <tr class="{$cat.bgcolor}">
            <td class="bld">{$cat.nombre}</td>
            <td class="bld">&nbsp;</td>
            <td class="bld c">{$cat.productos}</td>
            <td class="c">{$cat.agregar}</td>
            <td class="c">{$cat.bloquear}</td>
            <td class="c">{$cat.modificar}</td>
            <td class="c">{$cat.eliminar}</td>
        </tr>
            {foreach from=$sub item=su}
                {if $su.id == $cat.id}
                <tr class="{$su.bgcolor}">
                    <td class="bld">&nbsp;</td>
                    <td class="bld">{$su.nombre}</td>
                    <td class="bld c">{$su.productos}</td>
                    <td>&nbsp;</td>
                    <td class="c">{$su.bloquear}</td>
                    <td class="c">{$su.modificar}</td>
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
                alertBox.confirm('<p>¿Está seguro que desea eliminar esta Categoría?<\/p>',{
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