<h2 class="span contenttitle w-98">Administrador de Usuarios</h2>
<div class="span adm_datahead w-98">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/usuarios">Usuarios</a>
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/usuarios/insertar-usuario">Crear Usuario</a>
</div>
<p class="titulo">Crear Nuevo Usuario</p>
<p class="subtitulo">Ingresar Datos</p>
<form id="form1" class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/usuarios/svc/guardar-usuario" method="post" enctype="multipart/form-data">
    <table class="stats" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="rig">Nombre :</td>
            <td class="let">
                <input type="text" name="adm_nombre" id="adm_nombre" value="{$post.adm_nombre}" class="text w-30 span"/>
                <p class="error">{$error.adm_nombre}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Apellido :</td>
            <td class="let">
                <input type="text" name="adm_apellido" id="adm_apellido" value="{$post.adm_apellido}" class="text w-30 span"/>
                <p class="error">{$error.adm_apellido}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">E-mail :</td>
            <td class="let">
                <input type="text" name="adm_email" id="adm_email" value="{$post.adm_email}" class="text w-30 span"/>
                <p class="error">{$error.adm_email}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Usuario :</td>
            <td class="let">
                <input type="text" name="adm_user" id="adm_user" value="{$post.adm_user}" class="text span"/>
                <p class="error">{$error.adm_user}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Contraseña :</td>
            <td class="let">
                <input type="password" name="adm_pass" id="adm_pass" class="text span"/>
                <p class="error">{$error.adm_pass}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Tipo de Administrador :</td>
            <td class="let">
                <select name="adm_tipo" id="pri" class="span">
                    <option value="0" selected="selected">-Seleccione-</option>
                    <option value="administrador">Administrador</option>
                    <option value="usuario">Usuario</option>
                </select>
                <p class="error">{$error.adm_tipo}</p></td>
        </tr>
        <tr>
            <td class="rig">Privilegios :</td>
            <td class="let">
                <div id="privilegios" class="text span" style="padding:5px 8px">
                    <b>Eligir el tipo de usuario para los privilegios</b>
                </div>
            </td>
        </tr>
        <tr>
            <td class="rig">Fecha de Registro :</td>
            <td class="let"><b class="text span" style="padding:5px 8px;display:inline-block">{$date|date_format:"%d/%m/%Y"}</b></td>
        </tr>   
        <tr>
            <td>&nbsp;</td>
            <td>
                <input class="adm_btn" name="btn_submit" type="submit" value="Guardar" />
                <input class="adm_btn" name="btn_reset" type="reset" value="Borrar" />
            </td>
        </tr>
    </table>
</form>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>