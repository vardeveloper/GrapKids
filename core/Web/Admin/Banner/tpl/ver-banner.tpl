<h2 class="span contenttitle w-98">Administrador de Banner</h2>

<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/banner">Banner</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/banner/nuevo-banner">Nuevo Banner</a>
</div>

<div id="men2">
    <p class="titulo">Detalle del Banner</p>
    <div class="detalle">
        <p class="subtitulo">Datos</p>
        <p class="des"><span class="ti">Titulo:</span> {$banner->ba_titulo}</p>
        <p class="subtitulo"><span class="ti">Banner</span></p>
        <p class="des"><img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/banner-banner_{$banner->ba_id}" /></p>
    </div>
</div>

<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>