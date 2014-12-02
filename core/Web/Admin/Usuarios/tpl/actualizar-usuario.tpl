<h2 class="span contenttitle w-98">Administrador de Usuarios</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/usuarios">Usuarios</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/usuarios/insertar-usuario">Crear Usuario</a>
</div>
<p class="titulo">Actualizar Usuario</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/usuarios/svc/modificar-usuario" method="post" enctype="multipart/form-data" id="form1" >
    <input type="hidden" name="adm_id" value="{$usuario->adm_id}" />
    <table class="stats" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="rig">Nombre :</td>
            <td class="let">
                <input name="adm_nombre" type="text" id="adm_nombre" class="text span w-30" value="{$usuario->adm_nombre}" />
                <p class="error">{$error.adm_nombre}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Apellido :</td>
            <td class="let">
                <input name="adm_apellido" type="text" id="adm_apellido" class="text span w-30" value="{$usuario->adm_apellido}" />
                <p class="error">{$error.adm_apellido}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">E-mail :</td>
            <td class="let">
                <input name="adm_email" type="text" id="adm_email" class="text span w-30" value="{$usuario->adm_email}" />
                <p class="error">{$error.adm_email}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Usuario :</td>
            <td class="let">
                <input name="adm_user" type="text" id="adm_user" class="text span" value="{$usuario->adm_user}" />
                <p class="error">{$error.adm_user}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Contraseña :</td>
            <td class="let">
                <input name="adm_pass" type="password" id="adm_pass" class="text span" />
                <p class="error">{$error.adm_pass}</p>
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