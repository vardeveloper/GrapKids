<h2 class="span contenttitle w-98">Administrador de Galerias | Fotos : {$total}</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/galerias">Galerias</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/galerias/nueva-galeria">Nueva Galeria</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/galerias/nueva-foto/{$gal_id}">Agregar Fotos</a>
</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-15 c">Imagen</td>
            <td class="w-20">Titulo</td>
            <td class="w-20">Galeria</td>
            <!--td class="w-7"></td-->
            <td class="w-5"></td>
            <td class="w-5"></td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$fotos item=foto}
        <tr class="{$foto.bgcolor}">
            <td class="c"><img src="{$foto.imagen}" /></td>
            <td class="m bld">{$foto.titulo}</td>
            <td class="m bld">{$foto.galeria}</td>
            <!--td>{$foto.nuevafoto}</td-->
            <td class="m c">{$foto.modificar}</td>
            <td class="m c">{$foto.eliminar}</td>
        </tr>
        {/foreach}
    </tbody>
</table>
<div class="span adm_datafooter w-93">
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
                alertBox.confirm('<p>¿Está seguro que desea eliminar esta Foto?<\/p>',{
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