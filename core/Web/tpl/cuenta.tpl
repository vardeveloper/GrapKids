<div class="wapper patron">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            <div class="interna r">
                <div class="inte_top"></div>
                <div class="inte_center">
                    <h3>Actualizar Datos</h3>
                    <p class="error">{$envio}</p>

                    <form id="registro_user" method="post" action="{$smarty.const.BASE_WEB_ROOT}/svc/cliente-actualizar">
                        <fieldset>
                            <legend>Datos Personales</legend>
                            <p><label>Nombres </label> <span class="error"> &nbsp; {$error.nombre}</span></p>
                            <p><input type="text" name="nombre" value="{$cliente->cli_nombre}"/> </p>
                            <p><label>Apellidos </label> <span class="error"> &nbsp; {$error.apellido}</span></p>
                            <p><input type="text" name="apellido" value="{$cliente->cli_apellido}"/> </p>
                            <p><label>País </label> <span class="error"> &nbsp; {$error.pais}</span></p>
                            <p><input type="text" name="pais" value="{$cliente->cli_pais}"/> </p>
                            <p><label>Ciudad </label> <span class="error"> &nbsp; {$error.provincia}</span></p>
                            <p><input type="text" name="provincia" value="{$cliente->cli_provincia}"/> </p>
                            <p><label>Distrito </label> <span class="error"> &nbsp; {$error.distrito}</span></p>
                            <p><input type="text" name="distrito" value="{$cliente->cli_distrito}"/> </p>
                            <p><label>Dirección </label> <span class="error"> &nbsp; {$error.direccion}</span><br /></p>
                            <p><input type="text" name="direccion" value="{$cliente->cli_direccion}"/> </p>
                            <p><label>Teléfono </label> <span class="error"> &nbsp; {$error.telefono}</span></p>
                            <p><input type="text" name="telefono" value="{$cliente->cli_telefono}"/> </p>
                            <p><label>Celular </label> <span class="error"> &nbsp; {$error.celular}</span></p>
                            <p><input type="text" name="celular" value="{$cliente->cli_celular}"/> </p>
                        </fieldset>
                        <fieldset>
                            <legend>Datos de la Empresa</legend>
                            <p><label>Razón Social</label></p>
                            <p><input type="text" name="empresa" value="{$cliente->cli_empresa}"/> </p>
                            <p><label>RUC</label></p>
                            <p><input type="text" name="ruc" value="{$cliente->cli_ruc}" maxlength="11"/> </p>
                            <p><label>Cargo</label></p>
                            <p><input type="text" name="cargo" value="{$cliente->cli_cargo}"/> </p>
                        </fieldset>
                        <button type="submit" value="submit" class="btnGuardar">&nbsp;</button>
                    </form>

                    <div class="clear"></div>
                </div>
                <div class="inte_bottom"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>