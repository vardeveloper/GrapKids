<h2 class="span contenttitle w-98">Administrador de Clientes {if $total}| Total : {$total} {/if}</h2>
<div class="span adm_datahead">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/clientes">Clientes</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/clientes/insertar-cliente">Nuevo Cliente</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/clientes/svc/exportar-excel">Exportar a Excel</a>
    <form name="frm" method="post" action="{$smarty.const.WEB_ROOT}/admin/clientes/svc/do-search">
        <div class="r spanr mr-1" style="float: right;"><input type="submit" value="Buscar"/></div>
        <div class="r spanr mr-1" style="float: right;">{$titulo} <input type="text" name="criterio" class="w-25" value="Apellidos, Nombres, Email" onfocus="this.value=(this.value=='Apellidos, Nombres, Email')? '' : this.value ;" /></div>
    </form>
</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-25">Apellidos y Nombres</td>
            <td class="w-25">Email</td>
            <td class="w-10">Telefono</td>
            <td class="w-10">Celular</td>
            <td class="w-10 c" colspan="3">Acciones</td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$usuarios item=usuario}
        <tr class="{$usuario.bgcolor}">
            <td class="bld">{$usuario.html2}</td>
            <td>{$usuario.email}</td>
            <td>{$usuario.telefono}</td>
            <td>{$usuario.celular}</td>
            <td class="w-6 c">{$usuario.verpedido}</td>
            {if $tipo eq "administrador"}
            <td class="w-2 c">{$usuario.actualizar}</td>
            <td class="w-2 c">{$usuario.eliminar}</td>
            {else}
            <td class="w-2 c">{$usuario.actualizar}</td>
            <td class="w-2 c"></td>
            {/if}
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
                alertBox.confirm('<p>¿Está seguro que desea eliminar este Cliente?<\/p>',{
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