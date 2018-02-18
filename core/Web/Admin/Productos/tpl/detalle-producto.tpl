<h2 class="span contenttitle w-98">Administrador de Productos</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos">Productos</a>
    {if $tipo eq "administrador"}
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/nuevo-producto">Nuevo Producto</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/eliminar-producto">Desactivados</a>
    {/if}
</div>
<div id="men2">
    <p class="titulo">Detalle del Producto</p>
    <div class="detalle">
        <p class="subtitulo">Información General</p>
        <div class="span w-45">
            <p class="des"><span class="ti">Nombre : </span> {$producto->pro_nombre}</p>
            <div class="des"><span class="ti">Descripcion : </span> {$producto->pro_descripcion}</div>
            <p class="des"><span class="ti">Precio : </span> S/. {$producto->pro_precio}</p>
        </div>
        <div class="span w-52">
            <div class="des" style="width:auto;"><img src="{$smarty.const.WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}/500:375" /></div>
        </div>
        <div class="span w-100">
            <div class="des">
                {if $img1}<div class="span w-15 c ti" style="margin-right:5px;color:#164F67"><b>Foto 1</b></div>{/if}
                {if $img2}<div class="span w-15 c ti" style="margin-right:5px;color:#164F67"><b>Foto 2</b></div>{/if}
                {if $img3}<div class="span w-15 c ti" style="margin-right:5px;color:#164F67"><b>Foto 3</b></div>{/if}
                {if $img4}<div class="span w-15 c ti" style="margin-right:5px;color:#164F67"><b>Foto 4</b></div>{/if}
                {if $img5}<div class="span w-15 c ti" style="margin-right:5px;color:#164F67"><b>Foto 5</b></div>{/if}
                {if $img6}<div class="span w-15 c ti" style="margin-right:5px;color:#164F67"><b>Foto 6</b></div>{/if}
            </div>
            <div class="des">
                {if $img1}<div class="span w-15 c" style="margin-right:5px;"><img src="{$smarty.const.WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}_1/150:113" /></div>{/if}
                {if $img2}<div class="span w-15 c" style="margin-right:5px;"><img src="{$smarty.const.WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}_2/150:113" /></div>{/if}
                {if $img3}<div class="span w-15 c" style="margin-right:5px;"><img src="{$smarty.const.WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}_3/150:113" /></div>{/if}
                {if $img4}<div class="span w-15 c" style="margin-right:5px;"><img src="{$smarty.const.WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}_4/150:113" /></div>{/if}
                {if $img5}<div class="span w-15 c" style="margin-right:5px;"><img src="{$smarty.const.WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}_5/150:113" /></div>{/if}
                {if $img6}<div class="span w-15 c" style="margin-right:5px;"><img src="{$smarty.const.WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}_6/150:113" /></div>{/if}
            </div>
            {if $tipo eq "administrador"}
            <div class="des">
                {if $img1}<div class="span w-15 c" style="margin-right:5px;"><a href="{$smarty.const.WEB_ROOT}/admin/productos/svc/eliminar-imagen/{$producto->pro_id}/1" title="Eliminar" class="adm_alert_delete"><img src="{$smarty.const.WEB_ROOT}/img/admin/delete.png" /></a></div>{/if}
                {if $img2}<div class="span w-15 c" style="margin-right:5px;"><a href="{$smarty.const.WEB_ROOT}/admin/productos/svc/eliminar-imagen/{$producto->pro_id}/2" title="Eliminar" class="adm_alert_delete"><img src="{$smarty.const.WEB_ROOT}/img/admin/delete.png" /></a></div>{/if}
                {if $img3}<div class="span w-15 c" style="margin-right:5px;"><a href="{$smarty.const.WEB_ROOT}/admin/productos/svc/eliminar-imagen/{$producto->pro_id}/3" title="Eliminar" class="adm_alert_delete"><img src="{$smarty.const.WEB_ROOT}/img/admin/delete.png" /></a></div>{/if}
                {if $img4}<div class="span w-15 c" style="margin-right:5px;"><a href="{$smarty.const.WEB_ROOT}/admin/productos/svc/eliminar-imagen/{$producto->pro_id}/4" title="Eliminar" class="adm_alert_delete"><img src="{$smarty.const.WEB_ROOT}/img/admin/delete.png" /></a></div>{/if}
                {if $img5}<div class="span w-15 c" style="margin-right:5px;"><a href="{$smarty.const.WEB_ROOT}/admin/productos/svc/eliminar-imagen/{$producto->pro_id}/5" title="Eliminar" class="adm_alert_delete"><img src="{$smarty.const.WEB_ROOT}/img/admin/delete.png" /></a></div>{/if}
                {if $img6}<div class="span w-15 c" style="margin-right:5px;"><a href="{$smarty.const.WEB_ROOT}/admin/productos/svc/eliminar-imagen/{$producto->pro_id}/6" title="Eliminar" class="adm_alert_delete"><img src="{$smarty.const.WEB_ROOT}/img/admin/delete.png" /></a></div>{/if}
            </div>
            {/if}
        </div>
    </div>
</div>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>
{literal}
<script type="text/javascript">
    window.addEvent('load', function() {
        var els = $$('a.adm_alert_delete');
        alertBox = new SexyAlertBox();
        els.each(function(el){
            el.addEvent('click', function(e){
                e.stop();
                link=el.href;
                alertBox.confirm('<p>¿Está seguro que desea eliminar esta Imagen?<\/p>',{
                    onComplete: function(returnvalue) {
                        if(returnvalue){
                            document.location.href=link;
                        }
                    }
                });
            });
        });
    });
</script>
{/literal}