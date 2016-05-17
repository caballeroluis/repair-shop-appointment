<script src="/web/protected/extensions/jsSHA/src/sha.js" type="text/javascript"></script> <!-- para encriptar las passwrods desde cliente -->
<script src="/web/assets/encriptarSHA.js" type="text/javascript"></script>  <!-- para encriptar las passwrods desde cliente -->

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
      <div id="div-acceso">
        <input id="usuario" type="text" placeholder="Usuario" />
        <input id="password1" type="password" placeholder="Contraseña" />
        <a href="#" id="btn-acceso" style="margin-top: -11px" class="btn btn-small btn-success">Acceder</a>
        <a href="#" id="btn-registro" style="margin-top: -11px" class="btn btn-small btn-primary">Registro</a>
        <a href="./admin" id='btn-admin' style="margin-top: -11px" class="btn btn-small btn-danger">/Admin</a>
      </div>
      <div id="div-registro" style="display: none">
        <input id="password2" type="password" placeholder="Repite contraseña" /><br />
        <input id="nombre" type="text" placeholder="Nombre" /><br />
        <input id="apellido1" type="text" placeholder="Apellido" /><br />
        <input id="apellido2" type="text" placeholder="Segundo apellido" /> *<br />
        <input id="telefono" type="text" placeholder="Teléfono" /> *<br />
        <input id="cp" type="text" placeholder="Código postal" /><br />
        <input id="email" type="email" placeholder="Correo electrónico" /><br />
        <a id="btn-registrarse" style="margin-top: -11px" class="btn btn-small btn-primary">Registrarse</a><br />
        * datos opcionales.
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="span6 "><div class="caja-gris">Box 1</div></div>
    <div class="span6 "><div class="caja-gris">Box 2</div></div>
    <div class="span6 "><div class="caja-gris">Box 3</div></div>
    <div class="span6 "><div class="caja-gris">Box 4</div></div>
    <div class="span6 "><div class="caja-gris">Box 5</div></div>
  </div>
</div>
<script src="/web/assets/calendarioIndex.js" type="text/javascript"></script>