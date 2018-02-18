<h2 class="span contenttitle w-98">Administrador de Videos | Total : {$total}</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/videos">Videos</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/videos/nuevo-video">Nuevo Video</a>
</div>
<table class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-30 c">Video</td>
            <td class="w-40 c">Titulo</td>
            <td class="w-15 c" colspan="3">Acciones</td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$videos item=video}
        <tr class="{$video.bgcolor}">
            <td class="bld">{$video.link}</td>
            <td class="bld t">{$video.titulo}</td>
            <td class="w-5 t">{$video.bloquear}</td>
            <td class="w-5 t">{$video.modificar}</td>
            <td class="w-5 t">{$video.eliminar}</td>
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
                alertBox.confirm('<p>¿Está seguro que desea eliminar este video?<\/p>',{
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