{*<div class="slider_titulo"></div>*}
<div id="slider">
    <ul id="sliderPro">
        {foreach from=$novedades item=pro}
        <li>
            <a href="{$smarty.const.BASE_WEB_ROOT}/producto-detalle/{$pro->pro_key}" title="{$pro->pro_nombre}">
                <img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/productos-pro_{$pro->pro_id}_small/160:120" alt="{$pro->pro_nombre}" />
            </a>
            <p><a href="{$smarty.const.BASE_WEB_ROOT}/producto-detalle/{$pro->pro_key}" title="{$pro->pro_nombre}" class="name">{$pro->pro_nombre}</a></p>
        </li>
        {/foreach}
    </ul>
</div>