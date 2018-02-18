<div class="wapper patron">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            <div class="interna r">
                <div class="inte_top"></div>
                <div class="inte_center">
                    <h3>Nuevo Cliente</h3>
                    <p>Bienvenido, por favor registrese para recibir la informacion que desee de los productos.</p>
                    <p><b>Los datos con asterisco ( * ) son obligatorios y en minúsculas</b></p>

                    <form id="registro_user" method="post" action="{$smarty.const.BASE_WEB_ROOT}/svc/cliente-registrar">
                        <fieldset>
                            <legend>Datos Personales</legend>
                            <p><label>Nombres *</label> <span class="error"> &nbsp; {$error.nombre}</span></p>
                            <p><input type="text" name="nombre" value="{$post.nombre}"/> </p>
                            <p><label>Apellidos *</label> <span class="error"> &nbsp; {$error.apellido}</span></p>
                            <p><input type="text" name="apellido" value="{$post.apellido}"/> </p>
                            <p><label>País *</label> <span class="error"> &nbsp; {$error.pais}</span></p>
                            <p><input type="text" name="pais" value="{$post.pais}"/> </p>
                            <p><label>Ciudad *</label> <span class="error"> &nbsp; {$error.provincia}</span></p>
                            <p><input type="text" name="provincia" value="{$post.provincia}"/> </p>
                            <p><label>Distrito *</label> <span class="error"> &nbsp; {$error.distrito}</span></p>
                            <p><input type="text" name="distrito" value="{$post.distrito}"/> </p>
                            <p><label>Dirección *</label> <span class="error"> &nbsp; {$error.direccion}</span><br /></p>
                            <p><input type="text" name="direccion" value="{$post.direccion}"/> </p>
                            <p><label>Teléfono *</label> <span class="error"> &nbsp; {$error.telefono}</span></p>
                            <p><input type="text" name="telefono" value="{$post.telefono}"/> </p>
                            <p><label>Celular *</label> <span class="error"> &nbsp; {$error.celular}</span></p>
                            <p><input type="text" name="celular" value="{$post.celular}"/> </p>
                            <p>&nbsp;</p>
                            <p><input type="checkbox" name="boletin" value="SI"/> Marque la casilla si desea recibir el boletin mensual y las promociones de grapkids.com</p>
                        </fieldset>
                        <fieldset>
                            <legend>Datos de la Empresa</legend>
                            <p><label>Razón Social</label></p>
                            <p><input type="text" name="empresa" value="{$post.empresa}"/> </p>
                            <p><label>RUC</label></p>
                            <p><input type="text" name="ruc" value="{$post.ruc}" maxlength="11"/> </p>
                            <p><label>Cargo</label></p>
                            <p><input type="text" name="cargo" value="{$post.cargo}"/> </p>
                        </fieldset>
                        <fieldset>
                            <legend>Datos de Usuario</legend>
                            <p><label>E-mail *</label> <span class="error"> &nbsp; {$error.email}</span></p>
                            <p><input type="text" name="email" value="{$post.email}"/> </p>
                            <p><label>Contraseña * (mínimo de 6 caracteres)</label> <span class="error"> &nbsp; {$error.pass}</span></p>
                            <p><input type="password" name="pass" value="{$post.pass}"/> </p>
                            <p><label>Confirmar Contraseña *</label> <span class="error"> &nbsp; {$error.repass}</span></p>
                            <p><input type="password" name="repass" value="{$post.repass}"/> </p>
                        </fieldset>
                        <button type="submit" value="submit" class="btnRegistrarse">&nbsp;</button>
                    </form>
                    
                    <div class="clear"></div>
                </div>
                <div class="inte_bottom"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>