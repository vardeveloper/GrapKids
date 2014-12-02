<h2 class="span contenttitle w-98">Administrador de Clientes</h2>
<div class="span adm_datahead">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/clientes">Clientes</a>
    <!--a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/clientes/crear-usuario">Crear Cliente</a-->
</div>
<p class="titulo">Actualizar Cliente</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/clientes/svc/actualizar-cliente" method="post" enctype="multipart/form-data" id="form1" >
    <input type="hidden" name="id" value="{$usuario->cli_id}" />
    <table class="stats" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="rig">Razón Social :</td>
            <td class="let">
                <input name="empresa" type="text" class="text span w-30" value="{$usuario->cli_empresa}" />
                <p class="error">{$error.empresa}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">RUC :</td>
            <td class="let">
                <input name="ruc" type="text" class="text span w-30" value="{$usuario->cli_ruc}" maxlength="11" />
                <p class="error">{$error.ruc}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Cargo :</td>
            <td class="let">
                <input name="cargo" type="text" class="text span w-30" value="{$usuario->cli_cargo}" />
                <p class="error">{$error.cargo}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Nombre :</td>
            <td class="let">
                <input name="nombre" type="text" class="text span w-30" value="{$usuario->cli_nombre}" />
                <p class="error">{$error.nombre}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Apellido :</td>
            <td class="let">
                <input name="apellido" type="text" class="text span w-30" value="{$usuario->cli_apellido}" />
                <p class="error">{$error.apellido}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">País :</td>
            <td class="let">
                <input name="pais" type="text" class="text span w-30" value="{$usuario->cli_pais}" />
                <p class="error">{$error.pais}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Ciudad :</td>
            <td class="let">
                <input name="ciudad" type="text" class="text span w-30" value="{$usuario->cli_provincia}" />
                <p class="error">{$error.ciudad}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Distrito :</td>
            <td class="let">
                <input name="distrito" type="text" class="text span w-30" value="{$usuario->cli_distrito}" />
                <p class="error">{$error.distrito}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Dirección :</td>
            <td class="let">
                <input name="direccion" type="text" class="text span w-30" value="{$usuario->cli_direccion}" />
                <p class="error">{$error.direccion}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Teléfono :</td>
            <td class="let">
                <input name="fono" type="text" class="text span w-30" value="{$usuario->cli_telefono}" />
                <p class="error">{$error.fono}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Celular :</td>
            <td class="let">
                <input name="celu" type="text" class="text span w-30" value="{$usuario->cli_celular}" />
                <p class="error">{$error.celu}</p>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input class="adm_btn" name="btn_submit" type="submit" value="Guardar" />
            </td>
        </tr>
    </table>
</form>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>