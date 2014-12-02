<div class="wapper patron">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            <div class="interna r">
                <div class="inte_top"></div>
                <div class="inte_center">
                    <h3>{$titulo}</h3>
                    <div class="categorias">
                        <div class="paginador">{$navigator}</div>
                        {foreach from=$productos item=pro}
                        <div class="cat_pro l">
                            <img src="{$pro->imagen}" alt="{$pro->pro_nombre}"/>
                            <p><b>{$pro->pro_nombre}</b></p>
                            <a href="{$smarty.const.WEB_ROOT}/svc/agregar-carrito/{$pro->pro_id}/{$pro->precio2}" class="btnCotizar r"></a>
                            <a href="{$smarty.const.WEB_ROOT}/producto-detalle/{$pro->pro_key}" title="{$pro->pro_nombre}" class="btnVerDetalle l"></a>
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