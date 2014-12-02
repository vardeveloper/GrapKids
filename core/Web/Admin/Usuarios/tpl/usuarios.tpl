<h2 class="span contenttitle w-98">Administrador de Usuarios</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/usuarios">Usuarios</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/usuarios/insertar-usuario">Crear Usuario</a>
</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-25">Apellidos y Nombres</td>
            <td class="w-15">Usuario</td>
            <td class="w-25">Email</td>
            <td class="w-10 c">Tipo</td>
            <td class="w-3 c"></td>
            <td class="w-18 c" colspan="3"></td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$usuarios item=usuario}
        {if $usuario.id eq "87"}
        <tr>
            <td class="w-25">{$usuario.nombre}</td>
            <td class="w-15 bld">{$usuario.user}</td>
            <td class="w-25 ">{$usuario.email}</td>
            <td class="w-10 c">{$usuario.tipo}</td>
            <td class="w-3 c">{$usuario.img}</td>
            <td class="w-6 c">&nbsp;</td>
            <td class="w-6 c">{$usuario.modificar}</td>
            <td class="w-6 c">&nbsp;</td>
        </tr>
        {else}
        <tr class="{$usuario.bgcolor}">
            <td class="w-25">{$usuario.nombre}</td>
            <td class="w-15 bld">{$usuario.user}</td>
            <td class="w-25">{$usuario.email}</td>
            <td class="w-10 c">{$usuario.tipo}</td>
            <td class="w-3 c">{$usuario.img}</td>
            <td class="w-6 c">{$usuario.bloquear}</td>
            <td class="w-6 c">{$usuario.modificar}</td>
            <td class="w-6 c">{$usuario.eliminar}</td>
        </tr>
        {/if}
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
                alertBox.confirm('<p>¿Está seguro que desea eliminar este Usuario?<\/p>',{
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