<div class="wapper patron">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            <div class="interna r">
                <div class="inte_top"></div>
                <div class="inte_center">
                    {if $cat_key}
                    <h3><a href="{$smarty.const.WEB_ROOT}/categorias/{$cat_key}">{$cat_nombre}</a></h3>
                    {/if}
                    <div class="productos">
                        <h1>{$producto->pro_nombre}</h1>
                        <!--div class="proPhoto">
                            <a rel="single" class="pirobox" href="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}/600:450" title="{$producto->pro_nombre}">
                                <img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}/400:300" alt="{$producto->pro_nombre}" />
                            </a>
                            {if $producto->pro_oferta eq 1}
                            <span class="new"> {$producto->pro_descuento}% </span>
                            {/if}
                        </div-->
                        <div id="gallery" class="nivoGallery">
                            <ul>
                                <li data-title="Grap Kids" data-caption="{$producto->pro_nombre}"><img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}" alt="{$producto->pro_nombre}" /></li>
                                {$Thumb}
                                {if $producto->pro_video != null}
                                <li data-type="video" data-title="YouTube Video">
                                    {$producto->pro_video}
                                </li>
                                {/if}
                            </ul>
                            {if $producto->pro_oferta eq 1}
                            <span class="new"> {$producto->pro_descuento}% </span>
                            {/if}
                        </div>
                        <div class="proDatos">
                            <p><b>Descripción :</b></p>
                            {$producto->pro_descripcion}
                            <a href="{$smarty.const.WEB_ROOT}/svc/agregar-carrito/{$producto->pro_id}/0" class="btnCotizar l" style="margin-left:20px"></a>
                            <div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="float:right;margin-right:20px">
                                <a class="addthis_button_facebook"></a>
                                <a class="addthis_button_twitter"></a>
                                <a class="addthis_button_email"></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                        <!--div class="gallery">
                            <p><b>Mas Fotos (clic para ampliar imagen)</b></p>
                            <ul>
                                {$Thumb}
                            </ul>
                        </div>
                        <div class="clear"></div-->
                    </div>
                </div>
                <div class="inte_bottom"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
{literal}
<script type="text/javascript">
    $(document).ready(function(){        
        /*$().piroBox_ext({
            piro_speed : 700,
            bg_alpha : 0.5,
            piro_scroll : true 
        });*/
        $('#gallery').nivoGallery();
    });
</script>
{/literal}