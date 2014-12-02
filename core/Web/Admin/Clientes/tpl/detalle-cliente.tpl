<h2 class="span contenttitle w-98">Administrador de Clientes</h2>
<div class="span adm_datahead">
    <p class="titulo" style="width:950px">Detalle del Cliente</p>
</div>
<div id="men2">
    <div class="detalle">
        <div class="span w-48">
            <p class="subtitulo" style="width:460px">Información Personal</p>
            <p class="des"><span class="ti">Nombres y Apellidos : </span> {$cliente->cli_nombre}, {$cliente->cli_apellido}</p>
            <p class="des"><span class="ti">País : </span> {$cliente->cli_pais}</p>
            <p class="des"><span class="ti">Ciudad : </span> {$cliente->cli_provincia}</p>
            <p class="des"><span class="ti">Distrito : </span> {$cliente->cli_distrito}</p>
            <p class="des"><span class="ti">Dirección : </span> {$cliente->cli_direccion}</p>
            <p class="des"><span class="ti">Telefono : </span> {$cliente->cli_telefono}</p>
            <p class="des"><span class="ti">Celular : </span> {$cliente->cli_celular}</p>
            <p class="des"><span class="ti">Email : </span> {$cliente->cli_email}</p>
        </div>
        <div class="span w-48">
            <p class="subtitulo" style="width:460px">Información de la Empresa</p>
            <p class="des"><span class="ti">Razón Social : </span> {$cliente->cli_empresa}</p>
            <p class="des"><span class="ti">RUC : </span> {$cliente->cli_ruc}</p>
            <p class="des"><span class="ti">Cargo : </span> {$cliente->cli_cargo}</p>
        </div>
    </div>
</div>
<div class="span adm_datafooter w-98">
    {$footermsg}{$navegacion}
</div>