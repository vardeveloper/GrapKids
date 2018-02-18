{literal}
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode : "exact",
        elements : "pro_descripcion",
        theme : "advanced",
        skin : "o2k7",
        //skin_variant : "black",
        skin_variant : "silver",

        /*plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
         *plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",

            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",*/

        plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,|,justifyfull,styleselect",
        theme_advanced_buttons2 : "pastetext,pasteword,|,undo,redo,|,bullist,|,link,unlink,image,code,",
        theme_advanced_buttons3 : "tablecontrols",
        //theme_advanced_buttons4 : "insertfile",
        theme_advanced_buttons4 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        height : "250",
        theme_advanced_resizing : true
    });
</script>
{/literal}
<h2 class="span contenttitle w-98">Administrador de Productos</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos">Productos</a>
    {if $tipo eq "administrador"}
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/nuevo-producto">Nuevo Producto</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/productos/eliminar-producto">Desactivados</a>
    {/if}
</div>
<p class="titulo">Actualizar Producto</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/productos/svc/actualizar-producto/{$producto->pro_id}" method="post" enctype="multipart/form-data">
    <table class="stats">
        <tr>
            <td class="rig">Nombre : </td>
            <td class="lef">
                <input type="text" name="pro_nombre" value="{$producto->pro_nombre}" class="text w-40 span"/>
                <p class="error">{$error.pro_nombre}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Descripción : </td>
            <td class="lef">
                <textarea name="pro_descripcion" id="pro_descripcion" class="h-10">{$producto->pro_descripcion}</textarea>
                <p class="error">{$error.pro_descripcion}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Video : </td>
            <td class="lef">
                <textarea name="pro_video" id="pro_video" class="h-5 span">{$producto->pro_video}</textarea>
                <p class="error">{$error.pro_video}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Precio S/. :</td>
            <td class="lef">
                <input type="text" name="pro_precio_s" value="{$producto->pro_precio}" class="text w-10 span"/>
                <p class="error">{$error.pro_precio_s}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Foto Actual</td>
            <td class="lef"><img src="{$smarty.const.BASE_WEB_ROOT}/svc/get-img/productos-pro_{$producto->pro_id}_small" /></td>
        </tr>
        <tr>
            <td class="rig">Foto Principal :</td>
            <td class="lef"><input name="imagen" type="file"/>jpg (600 × 450)</td>
        </tr>
        <tr>
            <td class="rig">Foto 1 :</td>
            <td class="lef"><input name="imagen1" type="file"/>jpg (600 × 450)</td>
        </tr>
        <tr>
            <td class="rig">Foto 2 :</td>
            <td class="lef"><input name="imagen2" type="file"/>jpg (600 × 450)</td>
        </tr>
        <tr>
            <td class="rig">Foto 3 :</td>
            <td class="lef"><input name="imagen3" type="file"/>jpg (600 × 450)</td>
        </tr>
        <tr>
            <td class="rig">Foto 4 :</td>
            <td class="lef"><input name="imagen4" type="file"/>jpg (600 × 450)</td>
        </tr>
        <tr>
            <td class="rig">Foto 5 :</td>
            <td class="lef"><input name="imagen5" type="file"/>jpg (600 × 450)</td>
        </tr>
        <tr>
            <td class="rig">Foto 6 :</td>
            <td class="lef"><input name="imagen6" type="file"/>jpg (600 × 450)</td>
        </tr>
    </table>
    <table class="stats">
        <tr>
            <td class="rig">&nbsp;</td>
            <td class="lef">
                <input class="adm_btn" name="btn_submit" type="submit" value="Guardar" />
                <input class="adm_btn" name="btn_reset" type="reset" value="Borrar" />
            </td>
        </tr>
    </table>
</form>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>