<div id="menu_lateral" class="l">
    <div id="menu_inicio"></div>
    <div id="menu_cuerpo">
        <ul>
            {foreach from=$categorias item=categoria}
            <li><a href="{$smarty.const.BASE_WEB_ROOT}/categorias/{$categoria->cat_key}" title="{$categoria->cat_nombre}">{$categoria->cat_nombre}</a></li>
            {/foreach}
        </ul>
    </div>
    <!--div id="menu_final"></div-->
</div>