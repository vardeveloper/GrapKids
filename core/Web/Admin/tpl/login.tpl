<div class="adm_login">
    <form method="post" action="{$smarty.const.BASE_WEB_ROOT}/admin/svc/do-login" >
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>Usuario</td>
            </tr>
            <tr>
                <td><input type="text" class="w-18" name="user"/></td>
            </tr>
            <tr>
                <td><p class="error">{$error.user}</p></td>
            </tr>
            <tr>
                <td>Password</td>
            </tr>
            <tr>
                <td><input type="password" class="w-18" name="pass"/></td>
            </tr>
            <tr>
                <td><p class="error">{$error.pass}</p></td>
            </tr>
            <tr>
                <td><input type="submit" value="Acceder" class="adm_btn"/></td>
            </tr>
        </table>
    </form>
</div>