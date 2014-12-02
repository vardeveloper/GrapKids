<div id="banner">
    <ul id="sliderBanner">
        {foreach from=$banners item=banner}
        <li><img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/banner-banner_{$banner->ba_id}" width="660" height="328" alt="{$banner->ba_titulo}"/></li>
        {/foreach}
    </ul>
</div>