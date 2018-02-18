{literal}
<style type="text/css">
table { vertical-align: top; }
tr    { vertical-align: top; }
td, th    { vertical-align: middle; }
</style>
{/literal}
<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" style="font-size: 10pt">
    <bookmark title="Lettre" level="0" ></bookmark>
    <table cellspacing="0" style="width: 100%; font-size: 14px; color: #444444;">
        <tr>
            <td style="width: 100%; height: 20px; font-size: 18px; text-align: center; ">
                <!--img style="width: 100%;" src="{$smarty.const.BASE_WEB_ROOT}/img/grapkids-medio.png" alt=""><br-->
                <b>GRAP KIDS</b>
            </td>
        </tr>
        <tr>
            <td style="width: 100%; height: 16px; font-style: italic; text-align: center;">
                Juegos Recreativos Infantiles
            </td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;">
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
            <td style="width:14%">Direccion :</td>
            <td style="width:36%">{$cliente->cli_direccion}</td>
            <td style="width:50%"></td>
        </tr>
        <tr>
            <td style="width:14%">Email :</td>
            <td style="width:36%">{$cliente->cli_email}</td>
            <td style="width:50%"></td>
        </tr>
        <tr>
            <td style="width:14%">Telefonos :</td>
            <td style="width:36%">{$cliente->cli_telefono} / {$cliente->cli_celular}</td>
            <td style="width:50%"></td>
        </tr>
        <tr>
            <td style="width:14%">Cotizacion # :</td>
            <td style="width:36%">{$carrito->car_id}</td>
            <td style="width:50%"></td>
        </tr>
    </table>
    <br>
    De mi mayor consideracion:<br><br>
    Tengo el agrado de dirigirme a Ud. Con la finalidad de trasmitirle mi saludo e informarle sobre el presupuesto solicitado.
    <br><br>
    <table style="width: 100%; border-bottom: dashed 1px black; border-top: dashed 1px black; text-align: center;">
        <tr>
            <th style="width:12%;height: 20px"># ID</th>
            <th style="width:42%;text-align:left">PRODUCTO</th>
            <th style="width:13%">UND</th>
            <th style="width:10%">CANT</th>
            <th style="width:10%">DSCTO</th>
            <th style="width:13%">PRECIO</th>
        </tr>
    </table>
    {foreach from=$productos item=producto}
    <table style="width: 100%; text-align: center;">
        <tr>
            <td style="width:12%;height:16px">{$producto.id}</td>
            <td style="width:42%;text-align:left">{$producto.nombre}</td>
            <td style="width:13%;text-align:right">S/. {$producto.precio}</td>
            <td style="width:10%">{$producto.cantidad}</td>
            <td style="width:10%">{if $producto.descuento} -{$producto.descuento}% {/if}</td>
            <td style="width:13%;text-align:right;">S/. {$producto.subtotal}</td>
        </tr>
    </table>
    {/foreach}
    <table style="width: 100%; border-bottom: dashed 1px black; border-top: dashed 1px black;">
        <tr>
            <th style="width:87%; height: 20px; text-align:right;">TOTAL : </th>
            <th style="width:13%; text-align:right;">S/. {$total}</th>
        </tr>
    </table>
    <br><br>
    <b>Condiciones de Venta:</b><br><br>
    - Validez de la oferta 30 dias.<br>
    - Forma de pago al contado.<br>
    - Garantia 12 meses.<br>
    - No incluye transporte e instalacion<br>
    - Incluye IGV
    <br><br><br>
    Agradeciendo de antemano la atencion a la presente esperamos su pronta respuesta, 
    cualquier consulta comuniquese a los telefonos 470 1780 / 472 8665 o email: grap_kids@hotmail.com, tambien puede visitarnos en nuestra web -> www.grapkids.com,
    siguenos en facebook -> www.facebook.com/grapkids <br>
    Atentamente,
    <br><br>
    <table cellspacing="0" style="width: 100%; text-align: center;">
        <tr>
            <td style="width:100%;">
                Gustavo Alcantara<br>
                Gerente<br>
            </td>
        </tr>
    </table>
</page>