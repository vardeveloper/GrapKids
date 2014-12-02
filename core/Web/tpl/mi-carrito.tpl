<div class="wapper patron">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            <div class="interna r">
                <div class="inte_top"></div>
                <div class="inte_center">
                    <h3>Lista de Productos a Cotizar</h3>
                    <p>Agregar todos los productos que desee de las diferentes categorias que tenemos para la cotización.<br />
                       Para agregar mas cantidad del mismo producto, digite el número en la casilla de cantidad y dar clic en el boton recalcular. 
                       Si desea eliminar el producto dar clic en la X.</p>
                    <div class="carrito" style="font:normal 12px 'Tahoma'; min-height:400px;padding: 0 10px;">
                        <form id="f-Carrito" action="{$smarty.const.WEB_ROOT}/svc/actualizar-carrito" method="post">
                            <table id="t-Carrito" style="width: 680px;">
                                <thead>
                                    <tr>
                                        <th style="width:150px">Imagen</th>
                                        <th style="width:350px;text-align:center">Producto</th>
                                        <th style="width:100px;text-align:center">Cantidad</th>
                                        <th style="width:100px;text-align:center">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach from=$matriz item=carrito}
                                    <tr class="light">
                                        <td align="center"><img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/productos-pro_{$carrito.pro_id}_small/150" alt="" /></td>
                                        <td align="center" style="vertical-align:middle"><a href="{$smarty.const.BASE_WEB_ROOT}/producto-detalle/{$carrito.pro_key}"><b>{$carrito.pro_titulo}</b></a><br /></td>
                                        <td align="center" style="vertical-align:middle"><input type="text" name="{$carrito.pro_id}" maxlength="2" value="{$carrito.pro_cantidad}" style="width:20px"/></td>
                                        <td align="center" style="vertical-align:middle">
                                            <a href="{$smarty.const.WEB_ROOT}/svc/elimina-elemento/{$carrito.pro_id}">
                                                <img src="{$smarty.const.BASE_WEB_ROOT}/img/delete.png" alt=""/>
                                            </a>
                                        </td>
                                    </tr>
                                    {/foreach}
                                </tbody>
                            </table>

                            <div class="r" style="margin-top:20px;display:block">
                                <div class="r"><a class="btnContinuar" href="{$smarty.const.BASE_WEB_ROOT}/svc/guardar-carrito"></a></div>
                                <div class="r" style="margin:0 10px;"><input class="btnRecalcular" type="submit" name="recalcular" value=""/></div>
                                <div class="r"><a class="btnAgregar" href="{$smarty.const.BASE_WEB_ROOT}"></a></div>
                            </div>

                        </form>
                        
                        <div class="clear"></div>
                        
                        <p class="error">{$enviado}</p>
                        
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="inte_bottom"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>