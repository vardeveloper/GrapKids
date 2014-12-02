<h2 class="span contenttitle w-98">Administrador de Pedidos</h2>
<div class="span adm_datahead">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/pedidos">Pedidos</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/pedidos/generar-pedido">Generar Pedido</a>
</div>
<p class="titulo">Registro de datos de envio</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/pedidos/svc/guardar-pedido" method="post" enctype="multipart/form-data" id="form1">
    <table class="stats" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="rig"><b>DATOS DE CLIENTE</b></td>
            <td class="let"><input id="cliId" name="cliId" type="hidden" /></td>
        </tr>
        <tr>
            <td class="rig">Cliente :</td>
            <td class="let">
                <input id="cliNombre" name="cliNombre" type="text" class="text span w-40" value="{$post.cliNombre}" />
                <p class="error">{$error.cliNombre}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Email :</td>
            <td class="let">
                <input id="cliEmail" name="cliEmail" type="text" class="text span w-40" value="{$post.cliEmail}" onfocus="this.blur();" />
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class="adm_btn" name="btnSave" type="submit" value="Guardar" />
                <input class="adm_btn" name="btnReset" type="reset" value="Borrar" />
            </td>
        </tr>
    </table>
</form>
<div class="span adm_datafooter w-98"></div>
{literal}
<script type="text/javascript">
    $(function()
    {
        $("#cliNombre").autocomplete({
            source: "{/literal}{$smarty.const.WEB_ROOT}{literal}/admin/pedidos/svc/buscar-cliente/",
            minLength: 2,
            select: clienteSeleccionado,
            focus: clienteMarcado
        }); 
    });

    function clienteMarcado(event, ui)
    {
        var cliente = ui.item.value;
        $("#cliNombre").val(cliente.nombre);
        event.preventDefault();
    }

    function clienteSeleccionado(event, ui)
    {
        var cliente = ui.item.value;
        $("#cliNombre").val(cliente.nombre);
        $("#cliEmail").val(cliente.email);
        $("#cliId").val(cliente.id);
        event.preventDefault();
    }
</script>
{/literal}