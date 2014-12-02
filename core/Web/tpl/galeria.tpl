<div class="wapper ">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            <div class="interna r">
                <div class="inte_top"></div>
                <div class="inte_center">
                    <h3>Galeria</h3>
                    <div class="cli-lista l" style="width:600px">
                        <ul>
                            {foreach from=$galerias item=galeria}
                            <li><a href="{$smarty.const.WEB_ROOT}/galeria-detalle/{$galeria->gal_key}">{$galeria->gal_titulo}</a></li>
                            {/foreach}
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="inte_bottom"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>