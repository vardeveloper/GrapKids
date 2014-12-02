<h2 class="span contenttitle w-98">Administrador de Delivery {if $total}| Total : {$total} {/if}</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/delivery">Distritos</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/delivery/nuevo-delivery">Nuevo Distrito</a>
</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-1">&nbsp;</td>
            <td class="w-30">Distrito</td>
            <td class="w-15">Codigo</td>
            <td class="w-15">Precio Soles</td>
            <td class="w-15">Precio Dolares</td>
            <td class="w-9 c" colspan="3">Acciones</td>
            <td class="w-1">&nbsp;</td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$usuarios item=usuario}
        <tr class="{$usuario.bgcolor}">
            <td>&nbsp;</td>
            <td class="bld">{$usuario.distrito}</td>
            <td>{$usuario.codigo}</td>
            <td>S/.{$usuario.precio}</td>
            <td>${$usuario.precio2}</td>
            <td class="w-3">{$usuario.bloquear}</td>
            <td class="w-3">{$usuario.editar}</td>
            <td class="w-3">{$usuario.eliminar}</td>
            <td>&nbsp;</td>
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
                alertBox.confirm('<p>¿Está seguro que desea eliminar este Registro?<\/p>',{
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