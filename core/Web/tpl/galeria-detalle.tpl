<div class="wapper ">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            <div class="interna r">
                <div class="inte_top"></div>
                <div class="inte_center">
                    <h3>Galeria</h3>
                    <div class="gallery">
                        <p><b>Mas Fotos (clic para ampliar imagen)</b></p>
                        <ul>
                            {foreach from=$fotos item=foto}
                            <li><a href="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/fotos-fot_{$foto->fot_id}/600" rel="prettyPhoto[gallery1]" title="{$foto->fot_titulo}"><img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/fotos-fot_{$foto->fot_id}/174" alt="{$foto->fot_titulo}" /></a></li>
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

{literal}
<script type="text/javascript">
    $(document).ready(function(){
        $("a[rel^='prettyPhoto']").prettyPhoto({
            theme: 'dark_rounded'
        });
    });
</script>
{/literal}