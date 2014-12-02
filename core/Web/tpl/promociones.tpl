<div class="wapper ">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            <div class="interna r">
                <div class="inte_top"></div>
                <div class="inte_center">
                    <h3>Promociones y Liquidaciones</h3>
                    <div class="categorias">
                        <div class="paginador">{$navigator}</div>
                        {foreach from=$productos item=pro}
                        <div class="cat_pro l" style="min-height:265px">
                            <a href="{$smarty.const.WEB_ROOT}/producto-detalle/{$pro->pro_key}" title="{$pro->pro_nombre}"><img src="{$pro->imagen}" alt="{$pro->pro_nombre}"/></a>
                            <p><a href="{$smarty.const.WEB_ROOT}/producto-detalle/{$pro->pro_key}" title="{$pro->pro_nombre}"><strong>{$pro->pro_nombre}</strong></a></p>
                            <!--p><strong>S/.{$pro->pro_precio}</strong> &nbsp;  &nbsp;  &nbsp;  &nbsp;  <strong>${$pro->precio2}</strong></p-->
                            {if $pro->pro_valor_a != "" && $pro->pro_valor_b != ""}
                            <p class="error"><strong>¡Promoción {$pro->pro_valor_a} x {$pro->pro_valor_b}!</strong></p>
                            <p><strong>Precio: S/.{$pro->pro_precio}</strong></p>
                            {elseif $pro->pro_descuento != ""}
                            <p class="error"><strong>¡{$pro->pro_descuento}% de descuento!</strong></p>
                            <!--p><strong>Precio: S/.{$pro->pro_precio*$pro->pro_descuento/100}</strong></p-->
                            <!--p><strong>Precio: S/.{$pro->pro_precio}</strong></p-->
                            {else}
                            <p style="text-decoration:line-through;color:#888"><strong>Antes: S/.{$pro->pro_precio}</strong></p>
                            <p><strong>Precio: S/.{$pro->pro_precio_oferta}</strong></p>
                            {/if}
                            <a href="{$smarty.const.WEB_ROOT}/svc/agregar-carrito/{$pro->pro_id}/{$pro->precio2}" class="btnCotizar"></a>
                        </div>
                        {/foreach}
                        <div class="paginador">{$navigator}</div>
                    </div>
                </div>
                <div class="inte_bottom"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>