<h2 class="span contenttitle w-98">Administrador de Pedidos | Detalle de Pedido</h2>
<div class="span adm_datahead">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/pedidos">Pedidos</a>
    {$editar}
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/pedidos/svc/convertir-pdf" target="blank">Exportar a PDF</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/pedidos/svc/convertir-pdf-to" target="blank">Exportar a PDF IMG</a>
</div>
<div id="men2">
    <div class="detalle">
        <p class="subtitulo mr-2 ml-1 mt-1" style="width:445px">Información del Cliente</p>
        <p class="subtitulo mt-1" style="width:445px">Información de la Empresa</p>
        <p class="des" style="width:450px">
            <span class="ti">Nombres y Apellidos : </span> {$cliente->cli_nombre} {$cliente->cli_apellido}<br />
            <span class="ti">País : </span> {$cliente->cli_pais}<br />
            <span class="ti">Ciudad : </span> {$cliente->cli_provincia}<br />
            <span class="ti">Distrito : </span> {$cliente->cli_distrito}<br />
            <span class="ti">Dirección : </span> {$cliente->cli_direccion}<br />
            <span class="ti">Email : </span> {$cliente->cli_email}<br />
            <span class="ti">Teléfono : </span> {$cliente->cli_telefono}<br />
            <span class="ti">Celular : </span> {$cliente->cli_celular}<br />
        </p>
        <p class="des" style="width:450px">
            <span class="ti">Razón Social : </span> {$cliente->cli_empresa}<br />
            <span class="ti">RUC : </span> {$cliente->cli_ruc}<br />
            <span class="ti">Cargo : </span> {$cliente->cli_cargo}<br />
        </p>
        <div class="des">
            <table id="simple" class="data">
                <tr>
                    <td class="w-15" style="border-bottom: none !important;"><b>Nº de Pedido :</b></td>
                    <td class="w-15" style="border-bottom: none !important;"> {$caritoDato->car_id}</td>
                    <td class="w-20" style="border-bottom: none !important;"><b>Fecha de Registro :</b></td>
                    <td class="w-20" style="border-bottom: none !important;"> {$caritoDato->car_fecha_registro|date_format:"%d/%m/%Y, %I:%M %p"}</td>
                    <td class="w-10" style="border-bottom: none !important;"><b>Estado :</b></td>
                    <td class="w-10" style="border-bottom: none !important;"> {$html}</td>
                </tr>
            </table>
            <table id="simple" class="data">
                <thead>
                    <tr>
                        <td class="w-50 c" colspan="2">Producto</td>
                        <td class="w-13 c">Precio</td>
                        <td class="w-7 c">Cant</td>
                        <td class="w-7 c">Dscto</td>
                        <td class="w-13 c">Total</td>
                    </tr>
                </thead>
                {foreach from=$productos item=producto}
                <tr>
                    <td class="c"><img src="{$smarty.const.WEB_ROOT}/svc/get-img/productos-pro_{$producto.id}_small/100:75" /></td>
                    <td class="c m bld">{$producto.nombre}</td>
                    <td class="r m">{$producto.precio}</td>
                    <td class="c m">{$producto.cantidad}</td>
                    <td class="c m bld" style="color:red">{if $producto.descuento} - {$producto.descuento} % {/if}</td>
                    <td class="r m">{$producto.subtotal}</td>
                </tr>
                {/foreach}
                <tr>
                    <td colspan="5" class="r bld">Total :</td>
                    <td class="r bld">S/. {$total} </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="span adm_datafooter"></div>