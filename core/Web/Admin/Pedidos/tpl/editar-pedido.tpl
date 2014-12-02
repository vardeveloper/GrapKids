<h2 class="span contenttitle w-98">Administrador de Pedidos | Detalle de Pedido</h2>
<div class="span adm_datahead">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/pedidos">Pedidos</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/pedidos/detalle-pedido/{$caritoDato->car_id}">Regresar</a>
</div>
<div id="men2">
    <div class="detalle">
        <div class="des">
            <table class="data">
                <tr>
                    <td class="w-15" style="border-bottom: none !important;"> <b>Nº de Pedido :</b> </td>
                    <td class="w-15" style="border-bottom: none !important;"> {$caritoDato->car_id} </td>
                    <td class="w-20" style="border-bottom: none !important;"> <b>Fecha de Registro :</b> </td>
                    <td class="w-20" style="border-bottom: none !important;"> {$caritoDato->car_fecha_registro|date_format:"%d/%m/%Y, %I:%M %p"} </td>
                    <td class="w-10" style="border-bottom: none !important;"> <b>Estado :</b> </td>
                    <td class="w-10" style="border-bottom: none !important;"> {$html} </td>
                </tr>
            </table>
            <form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/pedidos/svc/actualizar-pedido/{$caritoDato->car_id}" method="post" enctype="multipart/form-data">
            <table class="data">
                <thead>
                    <tr>
                        <td class="w-70 c" colspan="2">Producto</td>
                        <td class="w-15 c">Unidad</td>
                        <td class="w-10 c">Cantidad</td>
                        <td class="w-10 c">Dscto</td>
                    </tr>
                </thead>

                {foreach from=$productos item=producto}
                <tr>
                    <td class="c"><img src="{$smarty.const.WEB_ROOT}/svc/get-img/productos-pro_{$producto.id}_small/100:75" alt=""/></td>
                    <td class="c m">{$producto.nombre} <input type="hidden" name="id_{$producto.id}" value="{$producto.id}" /></td>
                    <td class="c m">S/. <input type="text" name="precio_{$producto.id}" value="{$producto.precio}" class="text w-10"/></td>
                    <td class="c m">{$producto.cantidad}</td>
                    <td class="c m bld red">- <input type="text" name="descuento_{$producto.id}" value="{$producto.descuento}" class="text w-2" maxlength="2"/> %</td>
                </tr>
                {/foreach}
                <tr>
                    <td colspan="6" class="r">
                        <input class="adm_btn" name="submit" type="submit" id="submit" value="Guardar" />
                    </td>
                </tr>    
            </table>
            </form>
        </div>
    </div>
</div>
<div class="span adm_datafooter w-93"></div>

{literal}
<script type="text/javascript">
    /*function comboEstado(id,opc){
        jQuery.post('{/literal}{$smarty.const.WEB_ROOT}{literal}/admin/pedidos/svc/actualizar-estado',{
            'id':id,
            'opc':opc
        });
    }*/
    
    function comboEstado(id, opc) {
        $.ajax({
            type    : "POST",
            cache   : false,
            url     : '{/literal}{$smarty.const.WEB_ROOT}{literal}/admin/pedidos/svc/actualizar-estado',
            data    : "id="+id+"&opc="+opc,
            success : function() {}
        });
    }
</script>
{/literal}