<h2 class="span contenttitle w-98">Administrador de Pedidos</h2>
<div class="span adm_datahead">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/pedidos">Pedidos</a>
</div>
<p class="titulo">Generar Pedido</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/pedidos/svc/agregar-producto" method="post">
    <table class="start mb-2 ml-2 mt-2 span" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="w-12 c">Cantidad</td>
            <td class="w-42">Producto</td>
            <td class="w-12 c">Precio</td>
            <td class="w-12 c">Importe</td>
            <td class="w-12 c"></td>
        </tr>
        <tr>
            <td class="w-12 c"><input id="txtCantidad" name="cantidad" type="text" class="text span w-10" value="1" /></td>
            <td class="w-42 c"><input id="txtProducto" name="nombre" type="text" class="text span w-40" /></td>
            <td class="w-12 c m"><label id="lblPrecio">0.00</label></td>
            <td class="w-12 c m"><label id="lblImporte">0.00</label></td>
            <td class="w-12 c m">
                <input id="idPro" name="idPro" type="hidden" />
                <input id="precio" name="precio" type="hidden" />
                <input class="adm_btn" name="btnSave" type="submit" value="Agregar" />
            </td>
        </tr>
    </table>
</form>
<table id="simple" class="data w-98">
    <thead>
        <tr>
            <td class="w-40">Producto</td>
            <td class="w-10 c">Cantidad</td>
            <td class="w-10 c">Precio</td>
            <td class="w-10 c">Importe</td>
            <td class="w-2"></td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$matriz item=pro}
        <tr class="{$pro.bgcolor}">
            <td class="bld">{$pro.nombre}</td>
            <td class="c">{$pro.cantidad}</td>
            <td class="c">{$pro.precio|number_format:2:'.':','}</td>
            <td class="c">{$pro.importe|number_format:2:'.':','}</td>
            <td class="c">{$pro.eliminar}</td>
        </tr>
        {/foreach}

        <tr> 
            <td class="r" colspan="3"><b>Total :</b></td>
            <td class="c"><b><span id="ctotal">S/. {$total}</span></b></td>
            <td>&nbsp;</td>
        </tr>
        <tr> 
            <td class="r" colspan="3"></td>
            <td class="c"><a id="btnContinuar" class="adm_btn" href="{$smarty.const.WEB_ROOT}/admin/pedidos/datos-envio">Continuar</a></td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>
<div class="span adm_datafooter w-98"></div>
{literal}
<script type="text/javascript">
    $(function()
    {
        $("#txtProducto").autocomplete({
            source: "{/literal}{$smarty.const.WEB_ROOT}{literal}/admin/pedidos/svc/buscar-producto/",
            minLength: 2,
            select: productoSeleccionado,
            focus: productoMarcado
        });
    });

    function productoMarcado(event, ui)
    {
        var producto = ui.item.value;

        $("#txtProducto").val(producto.descripcion);
        event.preventDefault();
    }

    function productoSeleccionado(event, ui)
    {
        var producto = ui.item.value;
        var cantidad = $("#txtCantidad").val();

        cantidad = parseInt(cantidad, 10);
        if (isNaN(cantidad))
            cantidad = 0;

        var precio = producto.precio;
        var importe = (precio * cantidad).toFixed(2);

        $("#lblPrecio").text(precio);
        $("#lblImporte").text(importe);

        $("#txtProducto").val(producto.descripcion);

        $("#precio").val(producto.precio);
        $("#idPro").val(producto.id);

        event.preventDefault();
    }

</script>
{/literal}