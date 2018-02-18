<h2 class="span contenttitle w-98">Administrador de Categorias | Productos ({$total}) | Categoria "{$categoria}"</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias">Categorias</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/categorias/nueva-categoria">Nueva Categoria</a>
</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-15 c">Imagen</td>
            <td class="w-50">Producto</td>
            <!--td class="w-20">Categoria</td-->
            <td class="w-10 c">Precio</td>
            <td class="w-7 c"></td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$productos item=pro}
        <tr class="{$pro.bgcolor}">
            <td class="c"><img src="{$smarty.const.WEB_ROOT}/svc/get-img/productos-pro_{$pro.id}_small/150:113" /></td>
            <td class="j t"><b>{$pro.html2}</b><br /><br />{$pro.intro}</td>
            <!--td class="bld t">{$pro.categoria}</td-->
            <td class="bld t r">S/. {$pro.precio} &nbsp;</td>
            <td class="c t r">{$pro.eliminar} </td>
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
                alertBox.confirm('<p>¿Está seguro que desea eliminar esta relacion entre el producto y la categoria?<\/p>',{
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