<div class="wapper">
    <div id="top">
        <div class="login">
            <div class="l" style="margin-top:5px">
                <iframe src="http://www.facebook.com/plugins/like.php?app_id=252949538054611&amp;href=http%3A%2F%2Fwww.facebook.com%2Fgrapkids&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=verdana&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe>
            </div>
            <div class="login-ingresar l">
                {if $user eq true}
                <a href="{$smarty.const.BASE_WEB_ROOT}/svc/lo-off"> Cerrar Sesión </a> -
                <a href="{$smarty.const.BASE_WEB_ROOT}/cuenta"> Cuenta </a>
                {else}
                <a href="{$smarty.const.BASE_WEB_ROOT}/login"> Iniciar Sesión </a> -
                <a href="{$smarty.const.BASE_WEB_ROOT}/registro"> Regístrate </a>
                {/if}
            </div>
            <div class="login-user l">
                {if $user eq true}
                Bienvenido/a : {$nombre} {$apellido}
                {/if}
            </div>
            <div class="cant_prod r">{$cantidad}</div>
            <div class="btnCarrito r"><a href="{$smarty.const.BASE_WEB_ROOT}/mi-carrito">Productos</a></div>
        </div>
    </div>
</div>
<div class="wapper">
    <div id="header">
        <div class="logo"><a href="{$smarty.const.BASE_WEB_ROOT}" title="Grap Kids"><img src="{$smarty.const.BASE_WEB_ROOT}/img/logo-grapkids.png" alt="Grap Kids Peru"/></a></div>
        <div class="menu">
            <div class="menu-buscar r">
                <form action="{$smarty.const.BASE_WEB_ROOT}/svc/do-search" method="post">
                    <input name="criterio" id="criterio" type="text" value="Buscar Productos" onfocus="this.value=(this.value=='Buscar Productos')? '' : this.value ;" />
                    <input name="Buscar" id="Buscar" type="image" src="{$smarty.const.BASE_WEB_ROOT}/img/btn_search.png"/>
                </form>
            </div>
            <div class="menu-central r">
                &nbsp; Central Telefonica <br /> <b>(511) 472 8665 </b>
            </div>
            <div class="link">
                <div class="link_demas l"> <a href="{$smarty.const.BASE_WEB_ROOT}/nosotros"> Nosotros </a> </div>
                <div class="link_demas l"> <a href="{$smarty.const.BASE_WEB_ROOT}/servicios"> Servicios </a> </div>
                <div class="link_demas l"> <a href="{$smarty.const.BASE_WEB_ROOT}/clientes"> Clientes </a> </div>
                <div class="link_demas l"> <a href="http://www.facebook.com/grapkids/photos" target="blank"> Galeria </a> </div>
                <div class="link_demas l"> <a href="http://www.youtube.com/user/GrapKids/videos" target="blank"> Videos </a> </div>
                <div class="link_demas l"> <a href="{$smarty.const.BASE_WEB_ROOT}/contacto"> Contacto </a> </div>
            </div>
        </div>
    </div>
</div>