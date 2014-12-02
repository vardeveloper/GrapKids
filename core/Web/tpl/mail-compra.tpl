<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="font:14px/22px 'Trebuchet MS',Arial,Helvetica,sans-serif">
    <tr>
        <td height="20" colspan="5">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5"><!--img src="{$smarty.const.BASE_WEB_ROOT}/img/logo.png" alt="Grap Kids"/--></td>
    </tr>
    <tr>
        <td width="20">&nbsp;</td>
        <td colspan="3"><h2 style="font-size:18px;text-align:center">Información de Grapkids.com</h2></td>
        <td width="20">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b style="font:16px/22px">Fecha : {$carrito->car_fecha_registro|date_format:"%d/%m/%Y, %I:%M %p"}</b></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b style="font:16px/22px">Cliente : {$cliente}</b></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b style="font:16px/22px">Email : {$email}</b></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><b style="font:16px/22px">Pedido # : {$carrito->car_id}</b></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3">

            <table cellpadding="1" cellspacing="1" border="1" style="width:650px;font:14px/22px 'Trebuchet MS',Arial,Helvetica,sans-serif">
                <tr bgcolor="#FFFF64">
                    <td width="150" align="center"><b>Producto</b></td>
                    <td width="400" align="center"><b>Detalle</b></td>
                    <td width="50" align="center"><b>Cantidad</b></td>
                </tr>
                {foreach from=$productos item=producto}
                <tr bgcolor="#FFFFFF">
                    <td align="center"><img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/productos-pro_{$producto->det_pro_id}_small/150" alt=""/></td>
                    <td align="center" valign="middle">{$producto->det_pro_nombre}</td>
                    <td align="center" valign="middle">{$producto->det_pro_cantidad}</td>
                </tr>
                {/foreach}
            </table>

        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3">
            <small style="font:12px/22px">Si tiene alguna duda puede entrar a nuestra Web para mayor información <a href="{$smarty.const.WEB_ROOT}" target="_blank">{$smarty.const.WEB_ROOT}</a></small>
        </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
        <td height="20" colspan="5">&nbsp;</td>
    </tr>
</table>