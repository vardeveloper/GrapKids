<h2 class="span contenttitle w-98">Administrador de Banner Home | Total : {$total}</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/banner">Banner</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/banner/nuevo-banner">Nuevo Banner</a>
</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-3">&nbsp;</td>
            <td class="w-20 c">Imagen</td>
            <td class="w-40">Titulo</td>
            <td class="w-18 c" colspan="3">Acciones</td>
            <td class="w-3">&nbsp;</td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$banner item=ba}
        <tr class="{$ba.bgcolor}">
            <td class="w-3">&nbsp;</td>
            <td class="W-20 c"><img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/banner-banner_{$ba.id}/200" /></td>
            <td class="w-40 m bld">{$ba.titulo}</td>
            <td class="w-6 m c">{$ba.bloquear}</td>
            <td class="w-6 m c">{$ba.modificar}</td>
            <td class="w-6 m c">{$ba.eliminar}</td>
            <td class="w-3">&nbsp;</td>
        </tr>
        {/foreach}
    </tbody>
</table>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
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
                alertBox.confirm('<p>¿Está seguro que desea eliminar este banner?<\/p>',{
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