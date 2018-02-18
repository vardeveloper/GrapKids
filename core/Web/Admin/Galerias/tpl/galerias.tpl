<h2 class="span contenttitle w-98">Administrador de Galerias | Total : {$total}</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/galerias">Galerias</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/galerias/nueva-galeria">Nueva Galeria</a>
</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <!--td class="w-15 c">Imagen</td-->
            <td class="w-40">Titulo</td>
            <td colspan="5"></td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$galerias item=galeria}
        <tr class="{$galeria.bgcolor}">
            <!--td class="c"><img src="{$galeria.imagen}" alt=""/></td-->
            <td class="bld">{$galeria.titulo}</td>
            <td class="c w-7">{$galeria.nuevafoto}</td>
            <td class="c w-5">{$galeria.fotos}</td>
            <td class="c w-5">{$galeria.bloquear}</td>
            <td class="c w-5">{$galeria.modificar}</td>
            <td class="c w-5">{$galeria.eliminar}</td>
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
                alertBox.confirm('<p>¿Está seguro que desea eliminar esta Galeria?<\/p>',{
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