<div class="wapper patron">
    <div id="container">
        {$ColLeft}
        <div id="cuerpo" class="l">
            <div class="interna r">
                <div class="inte_top"></div>
                <div class="inte_center">
                    <h3>¡Contáctanos!</h3>
                    <p style="width:280px;float:left">Si desea información de nuestros productos envienos un correo indicando el nombre del producto.<br />
                       Si tienes alguna pregunta, sugerencia o comentario, llena el siguiente formulario y te responderemos con mucho agrado.<br />
                       Tendrás respuesta a tu pregunta dentro de 48 horas.<br />
                       Para contactar nuestro Servicio de Atención al Cliente, llama al teléfono (511) 472 8665.<br />
                       * datos obligatorios.</p>
                    
                    <div style="float:left;width:350px;border:solid 1px #0C70D3"><img src="{$smarty.const.BASE_WEB_ROOT}/img/fachada.jpg" width="350" alt="" /></div>

                    <div class="clear"></div>
                    
                    <div class="formulario">
                        <div style="position: relative;">
                            {$envio}
                            {$error.total}
                            <br />
                            <form action="{$smarty.const.WEB_ROOT}/svc/enviar-contactenos" method="post" name="form" id="form">
                                <table border="0" cellpadding="0" cellspacing="0" >
                                    <tr><td><strong>Empresa : </strong></td></tr>
                                    <tr><td><input type="text" name="empresa" id="empresa" value="{$post.empresa}"/></td></tr>
                                    <tr><td><strong>RUC : </strong></td></tr>
                                    <tr><td><input type="text" name="ruc" id="ruc" value="{$post.ruc}" maxlength="11"/></td></tr>
                                    <tr><td><strong>Cargo : </strong></td></tr>
                                    <tr><td><input type="text" name="cargo" id="cargo" value="{$post.cargo}"/></td></tr>
                                    <tr><td><strong>Nombres y Apellidos : * </strong></td></tr>
                                    <tr><td><input type="text" name="nombre" id="nombre" value="{$post.nombre}"/></td></tr>
                                    <tr><td><strong>Email : * </strong></td></tr>
                                    <tr><td><input type="text" name="email" id="email" value="{$post.email}"/></td></tr>
                                    <tr><td><strong>Teléfonos : * </strong></td></tr>
                                    <tr><td><input type="text" name="telefono" id="telefono" value="{$post.telefono}"/></td></tr>
                                    <tr><td><strong>Dirección : </strong></td></tr>
                                    <tr><td><input type="text" name="direccion" id="direccion" value="{$post.direccion}"/></td></tr>
                                    <tr><td><strong>Mensaje : * </strong></td></tr>
                                    <tr><td><textarea name="mensaje" id="mensaje" cols="45" rows="5">{$post.mensaje}</textarea></td></tr>
                                    <tr><td><input type="submit" name="button" id="button" value="Enviar" /></td></tr>
                                </table>
                            </form>

                            <div id="map">
                                <iframe width="350" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/maps/ms?msa=0&amp;msid=214249144141398188769.0004b984230be9e112025&amp;ie=UTF8&amp;t=m&amp;ll=-12.076882,-77.030468&amp;spn=0.020983,0.014977&amp;z=15&amp;output=embed"></iframe><br /><br />
                                <small style="font:normal 12px Tahoma;">Ver <a href="http://maps.google.es/maps/ms?msa=0&amp;msid=214249144141398188769.0004b984230be9e112025&amp;ie=UTF8&amp;t=m&amp;ll=-12.076882,-77.030468&amp;spn=0.020983,0.014977&amp;z=15&amp;source=embed" style="color:#0000FF;text-align:left;text-decoration:none;font:normal 12px Tahoma">Juegos Recreativos Grap Kids</a> en un mapa más grande</small>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="inte_bottom"></div>
            </div>

        </div>
        <div class="clear"></div>
    </div>
</div>