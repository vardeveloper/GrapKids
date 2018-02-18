<h2 class="span contenttitle w-98">Administrador de Clientes</h2>
<div class="span adm_datahead">
    <a class="adm_btn span adm_btn2" href="{$smarty.const.WEB_ROOT}/admin/clientes">Clientes</a>
</div>
<p class="titulo">Crear Nuevo Cliente</p>
<p class="subtitulo">Ingresar Datos</p>
<form class="forminsert" action="{$smarty.const.WEB_ROOT}/admin/clientes/svc/guardar-cliente" method="post" enctype="multipart/form-data" id="form1">
    <table class="stats" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="rig">Nombres :</td>
            <td class="let">
                <input name="nombre" type="text" class="text span w-40" value="{$post.nombre}" />
                <p class="error">{$error.nombre}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">Apellidos :</td>
            <td class="let">
                <input name="apellido" type="text" class="text span w-40" value="{$post.apellido}" />
                <p class="error">{$error.apellido}</p>
            </td>
        </tr>
        <tr>
            <td class="rig">E-mail :</td>
            <td class="let">
                <input name="email" type="text" class="text span w-40" value="{$post.email}" />
                <p class="error">{$error.email}</p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class="adm_btn" name="btnSave" type="submit" value="Guardar" />
                <input class="adm_btn" name="btnReset" type="reset" value="Borrar" />
            </td>
        </tr>
    </table>
</form>
<div class="span adm_datafooter w-98"></div>