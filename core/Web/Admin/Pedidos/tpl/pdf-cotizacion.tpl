{literal}
<style type="text/css">
table  {vertical-align:top}
tr     {vertical-align:top}
td, th {vertical-align:middle}
.celda {border-right:solid 1px black;border-bottom:solid 1px black}
</style>
{/literal}
<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="page" style="font-size:1em">
    <bookmark title="Lettre" level="0" ></bookmark>
    <table style="width:100%;text-align:center;">
        <tr>
            <td style="width:100%;font-size:16pt;">
                <!--img style="width: 100%;" src="{$smarty.const.BASE_WEB_ROOT}/img/grapkids-medio.png" alt=""><br-->
                <b>GRAP KIDS</b>
            </td>
        </tr>
        <tr>
            <td style="width:100%;font-size:14pt;">
                Juegos Recreativos Infantiles
            </td>
        </tr>
    </table>
    <br>
    <table style="width:100%;text-align:left;">
        <tr>
            <td style="width:14%"></td>
            <td style="width:36%"></td>
            <td style="width:50%;text-align:right">Lima, {$fecha}</td>
        </tr>
        {if $cliente->cli_empresa}
        <tr>
            <td style="width:14%">Empresa :</td>
            <td style="width:36%">{$cliente->cli_empresa}</td>
            <td style="width:50%"></td>
        </tr>
        <tr>
            <td style="width:14%">RUC :</td>
            <td style="width:36%">{$cliente->cli_ruc}</td>
            <td style="width:50%"></td>
        </tr>
        {/if}
        <tr>
            <td style="width:14%">Cliente :</td>
            <td style="width:36%">{$cliente->cli_nombre} {$cliente->cli_apellido}</td>
            <td style="width:50%"></td>
        </tr>
        <tr>
            <td style="width:14%">Dirección :</td>
            <td style="width:36%">{$cliente->cli_direccion}</td>
            <td style="width:50%"></td>
        </tr>
        <tr>
            <td style="width:14%">Email :</td>
            <td style="width:36%">{$cliente->cli_email}</td>
            <td style="width:50%"></td>
        </tr>
        <tr>
            <td style="width:14%">Teléfonos :</td>
            <td style="width:36%">{$cliente->cli_telefono} / {$cliente->cli_celular}</td>
            <td style="width:50%"></td>
        </tr>
    </table>
    <br>
    De mi mayor consideración:<br><br>
    Tengo el agrado de dirigirme a Ud. Con la finalidad de trasmitirle mi saludo e informarle sobre el presupuesto solicitado.
    <br><br>
    <table style="width:100%">
        <tr>
            <td style="width:100%;text-align:center;font-size:12pt">
                <b style="text-decoration:underline">COTIZACIÓN N&deg; 00100-{$carrito->car_id}</b>
            </td>
        </tr>
    </table>
    <br>
    <table style="width:100%;text-align:center;border:solid 1px black" cellpadding="0" cellspacing="0">
        <tr style="background-color:#DCDCDC;">
            <th class="celda" style="width:10%;height:20px">Item</th>
            <th class="celda" style="width:40%">Producto</th>
            <th class="celda" style="width:15%">Precio</th>
            <th class="celda" style="width:10%">Cantidad</th>
            <th class="celda" style="width:10%">Dscto</th>
            <th class="celda" style="width:15%">Total</th>
        </tr>
        {foreach from=$productos item=producto}
        <tr>
            <td class="celda" style="width:10%;height:20px">{$producto.item}</td>
            <td class="celda" style="width:40%;text-align:left;padding:0 10px">{$producto.nombre}</td>
            <td class="celda" style="width:15%;text-align:right">S/. {$producto.precio} &nbsp; </td>
            <td class="celda" style="width:10%">{$producto.cantidad} </td>
            <td class="celda" style="width:10%">{if $producto.descuento} {$producto.descuento} % {/if}</td>
            <td class="celda" style="width:15%;text-align:right;">S/. {$producto.subtotal} &nbsp; </td>
        </tr>
        {/foreach}
        <tr>
            <td class="celda" colspan="5" style="width:85%;height:20px;text-align:right"> <b>TOTAL</b> &nbsp; </td>
            <td class="celda" style="width:15%;text-align:right"><b>S/. {$total}</b> &nbsp; </td>
        </tr>
    </table>
    <br>
    <b>Términos y Condiciones:</b>
    <br><br>
    - Validez de la oferta 30 días.<br>
    - Forma de pago al contado.<br>
    - Garantía 12 meses.<br>
    - No incluye transporte e instalación<br>
    - Incluye IGV
    <br><br>
    Agradeciendo de antemano la atención a la presente esperamos su pronta respuesta, 
    cualquier consulta comuníquese a los teléfonos 470 1780 / 472 8665 o email: grap_kids@hotmail.com, 
    visítanos en nuestra web -> www.grapkids.com,
    síguenos en facebook -> www.facebook.com/grapkids <br><br>
    Atentamente,
    <br><br>
    <table style="width:100%;text-align:center">
        <tr>
            <td style="width:100%">
                Gustavo Alcántara<br>
                Gerente General<br>
            </td>
        </tr>
    </table>
</page>