<h2 class="span contenttitle w-98">Administrador de Pedidos {if $total}| Total : {$total}{/if}</h2>
<div class="span adm_datahead">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/pedidos">Pedidos</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/pedidos/generar-pedido">Generar Pedido</a>
    <form class="form1" name="form1" method="post" action="{$smarty.const.WEB_ROOT}/admin/pedidos/svc/filtrar" style="float: right">
        Desde {$fecha} Hasta {$fechaTo}
        <input type="submit" name="buscar" id="btn" class="adm_btn" value="Filtrar" />
    </form>
</div>
<div class="span adm_datahead">
    <form name="frm" method="post" action="{$smarty.const.WEB_ROOT}/admin/pedidos/svc/do-search">
        <div class="r spanr mr-1" style="float: right;"><input class="adm_btn" type="submit" value="Buscar"/></div>
        <div class="r spanr mr-1" style="float: right;">{$titulo} <input type="text" name="criterio" class="w-5" value="#" onfocus="this.value=(this.value=='#')? '' : this.value ;" /></div>
    </form>
</div>
<table id="simple" class="data w-98" border="0" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td class="w-5">#</td>
            <td class="w-25">Cliente</td>
            <td class="w-25">Empresa</td>
            <td class="w-6 c">Productos</td>
            <td class="w-14 c">Fecha Pedido</td>
            <td class="w-6 c">Estado</td>
            <td class="w-2"></td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$usuarios item=usuario}
        <tr class="{$usuario.bgcolor}">
            <td class="bld">{$usuario.id}</td>
            <td class="bld">{$usuario.name}</td>
            <td class="bld">{$usuario.rsEmpresa}</td>
            <td class="bld c">{$usuario.Cantidad}</td>
            <td class="bld c">{$usuario.fecha|date_format:"%d/%m/%Y, %I:%M %p"}</td>
            <td class="c">{$usuario.estado}</td>
            <td class="c">{$usuario.detalle}</td>
        </tr>
        {/foreach}
    </tbody>
</table>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>