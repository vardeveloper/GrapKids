<div class="wapper patron">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            <div class="interna r">
                <div class="inte_top"></div>
                <div class="inte_center">
                    <h3>Iniciar Sesion</h3>
                    <p>Al identificarte como cliente podrás acceder a la configuración de tu cuenta y podras adquirir las cotizaciones de los productos.</p>

                    <form id="registro_user" name="frm" method="post" action="{$smarty.const.BASE_WEB_ROOT}/svc/login">
                        <fieldset>
                            <legend> Ya Soy Cliente </legend>
                            <p> Si ya eres cliente, por favor introduce tu dirección de email y contraseña. </p>
                            <p> &nbsp; </p>
                            <p> <label> Email </label> <span class="error"> &nbsp; {$error.uuser} </span></p>
                            <p> <input type="text" name="uuser" value="{$post.uuser}"/> </p>
                            <p> <label> Contraseña </label> <span class="error"> &nbsp; {$error.upass} </span></p>
                            <p> <input type="password" name="upass" value="{$post.upass}"/> </p>
                            <p> &nbsp; </p>
                            <p> <button type="submit" value="submit" class="btnEntrar">&nbsp;</button> </p>
                        </fieldset>
                    </form>

                    <form id="registro_user_2" method="post" action="{$smarty.const.BASE_WEB_ROOT}/svc/forgot-passwd">
                        <fieldset>
                            <legend> Recuperar Contraseña </legend>
                            <p> ¿Olvidaste tu contraseña? Ingresa tu e-mail </p>
                            <p>&nbsp;</p>
                            <p><input type="text" name="email" id="email" /></p>
                            <p>&nbsp;</p>
                            <p><button type="submit" value="submit" class="btnEnviar">&nbsp;</button></p>
                            <p>&nbsp;</p>
                            <p class="error">{$forgotPass}</p>
                        </fieldset>
                    </form>
                    
                    <div class="clear"></div>
                    
                    <p><b>¿Nuevo cliente?</b></p>
                    <p>Es necesario que se registre para obtener información relevante sobre nuestros productos y servicios haciendo <a href="{$smarty.const.BASE_WEB_ROOT}/registro">clic aquí</a></p>
                    <p>&nbsp;</p>

                </div>
                <div class="inte_bottom"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>