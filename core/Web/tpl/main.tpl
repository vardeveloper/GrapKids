<div class="wapper cuerpo">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            {$Banner}
            {$Slider}
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="wapper patron">
    <div id="container2">
        <div class="destacados">
            {*<div class="dest_titulo"></div>*}
            {foreach from=$productos item=pro}
            <div class="dest_pro">                
                <img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/productos-pro_{$pro->pro_id}_small/160:120" alt="{$pro->pro_nombre}" />
                {if $pro->pro_oferta eq 1}
                    <span class="new"> {$pro->pro_descuento}% </span>
                {/if}
                <div class="dest_img"><a href="{$smarty.const.BASE_WEB_ROOT}/producto-detalle/{$pro->pro_key}" title="{$pro->pro_nombre}">{$pro->pro_nombre}</a></div>
            </div>
            {/foreach}
            <div class="clear"></div>
        </div>
        {*
        <div class="destacados">
            <div class="ofer_titulo"></div>
            {foreach from=$promociones item=producto}
            <div class="dest_pro l">
                <div class="dest_img"><a href="{$smarty.const.BASE_WEB_ROOT}/producto-detalle/{$producto.key}" title="{$producto.nombre}">{$producto.nombre}</a></div>
                <img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/productos-pro_{$producto.id}_small" alt="{$producto.nombre}"/>
            </div>
            {/foreach}
            <div class="clear"></div>
        </div>
        <div class="ofertas">
            <div class="ofer_titulo"></div>
            <div class="ofer_img l"><a href="{$smarty.const.BASE_WEB_ROOT}/promociones"><img src="{$smarty.const.BASE_WEB_ROOT}/img/ofertas_1.png" alt=""/></a></div>
            <div class="ofer_img l"><a href="{$smarty.const.BASE_WEB_ROOT}/promociones"><img src="{$smarty.const.BASE_WEB_ROOT}/img/ofertas_2.png" alt=""/></a></div>
            <div class="ofer_img l"><a href="{$smarty.const.BASE_WEB_ROOT}/promociones"><img src="{$smarty.const.BASE_WEB_ROOT}/img/ofertas_3.png" alt=""/></a></div>
            <div class="ofer_img l"><a href="{$smarty.const.BASE_WEB_ROOT}/promociones"><img src="{$smarty.const.BASE_WEB_ROOT}/img/ofertas_4.png" alt=""/></a></div>
        </div>
        *}
        {*
        <div style="width:940px;height:300px;padding:20px 10px">
            <div class="yoxview l" style="width: 640px;">
                <a href="{$smarty.const.BASE_WEB_ROOT}/pdf/Catalogo-de-Modulos-2012.pdf" target="blank"><img src="{$smarty.const.BASE_WEB_ROOT}/img/banner-catalogo.jpg" alt="" style="margin-bottom:20px;"/></a>
                <a href="http://www.youtube.com/watch?v=f1szAVCITVQ" target="blank"><img src="{$smarty.const.BASE_WEB_ROOT}/img/parque-recreativo.jpg" width="300" height="182" alt="Parque Recreativo" style="margin-right:20px;"/></a>
                <a href="http://www.youtube.com/watch?v=TTU5ANWnHMQ" target="blank"><img src="{$smarty.const.BASE_WEB_ROOT}/img/parque-acuatico.jpg" width="300" height="182" alt="Parque Acuatico" /></a>
            </div>
            <div class="r">
                <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fgrapkids&amp;width=292&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=true&amp;appId=135483446021" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:290px;" allowTransparency="true"></iframe>
            </div>
        </div>
        *}
    </div>
</div>
{literal}
<script type="text/javascript">
    /*$(document).ready(function(){
        $(".yoxview").yoxview({
            skin: "top_menu",
            lang: "es",
            backgroundColor: '#D1EAF9',
            videoSize: { maxwidth: 720, maxheight: 560 }
        });
    });*/
</script>
{/literal}
{literal}
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-17397629-1']);
    _gaq.push(['_trackPageview','Home']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
{/literal}