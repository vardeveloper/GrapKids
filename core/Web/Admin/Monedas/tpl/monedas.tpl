<h2 class="span contenttitle w-93">Administrador de Monedas</h2>
<div class="span w-90">
    <!--span class="info w-50 mb-1 mt-1">(*) La ciudad no es obligatoria</span-->
    <form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/monedas/svc/guardar-monedas" method="post"  enctype="multipart/form-data" id="form1" >
        <table class="w-50 span" border="0" cellpadding="0" cellspacing="0">
            <tr class="h-4">
                <td class="w-30 bld">Titulo</td>
                <td class="w-20 bld">Simbolo</td>
                <td class="w-20 bld">Valor</td>
                <td class="w-20"></td>
            </tr>
            {foreach from=$monedas item=moneda}
            <tr class="{$moneda->bgcolor} h-4">
                <td>{$moneda->mon_nombre}</td>
                <td>{$moneda->mon_simbolo}</td>
                <td><input type="text" name="{$moneda->mon_id}" value="{$moneda->mon_valor}"/></td>
                <td>{*{$moneda->menu}*}</td>
            </tr>
            {/foreach}
            <tr>
                <td class="w-20"></td>
                <td class="w-20"></td>
                <td class="w-20"><input type="submit" value="Guardar Cambios" class="adm_btn"/></td>
            </tr>
        </table>
    </form>
    {*
    <form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/monedas/svc/guardar-moneda" method="post" enctype="multipart/form-data" id="form1" >
        <table class="stats " style="float:left; width:320px;" border="0" cellpadding="0" cellspacing="0">
            <p class="bld">Insertar Nueva Moneda</p>
            <p class="bld">-------- ------- --------</p>
            <tr>
                <td class="rig">Nombre:</td>
                <td class="let"><input name="mon_nombre" type="text" id="mon_nombre" size="30" class="text span" value="{$post.mon_nombre}" title="" />
                    <p class="error" id="ero">{$error.mon_nombre}</p></td>
            </tr>
            <tr>
                <td class="rig">Simbolo:</td>
                <td class="let"><input name="mon_simbolo" type="text" id="mon_simbolo" size="20" class="text span" value="{$post.mon_simbolo}" title="" />
                    <p class="error" id="ero2">{$error.mon_simbolo}</p></td>
            </tr>
            <tr>
                <td class="rig">Valor Referencial:</td>
                <td class="let"><input name="mon_valor" type="text" id="mon_valor" size="20" class="text span" value="{$post.mon_valor}" title="" />
                    <p class="error" id="ero3">{$error.mon_valor}</p></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input class="adm_btn" name="submit2" type="submit" id="submit2" value="Guardar" />
                    <input class="adm_btn" name="submit2" type="reset" id="submit2" value="Borrar" /></td>
            </tr>
        </table>
    </form>
    *}
</div>
<div class="span adm_datafooter w-93">
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
                alertBox.confirm('<p>¿Está seguro que desea eliminar esta Moneda?<\/p>',{
                    onComplete: function(returnvalue) {
                        if(returnvalue) {
                            document.location.href=link;
                        }
                    }
                });
            });
        });
    });
</script>
{/literal}