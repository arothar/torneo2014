<html>
    <head>
        <meta charset="UTF-8" />
        <title>Desafio Mundial!</title>
		<link href="<?echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
		<link href="<?echo base_url()?>assets/css/estilos.css" rel="stylesheet" type="text/css" media="all">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Bitter:700' rel='stylesheet' type='text/css'>
		<link rel="icon" type="image/x-icon" href="/desafioMundial/appMundial/web/favicon.ico" />
    </head>
    <body>
        <div id="contentRegistro">
    <div class="contenedor-caja-registro">
        <div class="caja-registro">
                                <div class="registro">
                        <div class="encabezado">
                            <div class="titulo">FORMULARIO DE ACCESO</div>
                             <div class="texto">
                                Complete el siguiente formulario con sus datos reales para poder contactarlo en caso de resultar 
                                ganador de algunos de los premios 
                            </div>
                        </div>
                        <form action="<?echo base_url()?>login/registronuevo"  method="POST" class="form-registro fos_user_registration_register">
                            
                            <div id="fos_user_registration_form">
								<div>
									<label for="fos_user_registration_form_username" class="required">Nombre de usuario:</label>
									<input type="text" id="fos_user_registration_form_username" name="username" required="required" maxlength="255" pattern=".{2,}" oninvalid="setCustomValidity(&quot;Ingrese un nombre de usuario&quot;)" onfocus="setCustomValidity(&quot;&quot;)" />
								</div>
								<div>
									<label for="fos_user_registration_form_email" class="required">Email:</label>
									<input type="email" id="fos_user_registration_form_email" name="email" required="required" oninvalid="setCustomValidity(&quot;Ingrese su email&quot;)" onfocus="setCustomValidity(&quot;&quot;)" />
								</div>
								<div>
									<label for="fos_user_registration_form_plainPassword_first" class="required">Contraseña:</label>
									<?if ($passDiferentes==1) { ?>
										<ul>
											<li>Las dos contraseñas no coinciden</li>
										</ul>
									<? } ?>
									<input type="password" id="fos_user_registration_form_plainPassword_first" name="plainPassword[first]" required="required" />
								</div>
								<div>
									<label for="fos_user_registration_form_plainPassword_second" class="required">Repita la contraseña:</label>
									<input type="password" id="fos_user_registration_form_plainPassword_second" name="plainPassword[second]" required="required" />
								</div>
								<div>
									<label for="fos_user_registration_form_nombre" class="required">Nombre</label>
									<input type="text" id="fos_user_registration_form_nombre" name="nombre" required="required" oninvalid="setCustomValidity(&quot;Ingrese su nombre&quot;)" onfocus="setCustomValidity(&quot;&quot;)" />
								</div>
								<div>
									<label for="fos_user_registration_form_direccion" class="required">Direccion</label>
									<input type="text" id="fos_user_registration_form_direccion" name="direccion" required="required" oninvalid="setCustomValidity(&quot;Ingrese su direccion&quot;)" onfocus="setCustomValidity(&quot;&quot;)" />
								</div>
								<div>
									<label for="fos_user_registration_form_provincia" class="required">Provincia</label>
									<select id="fos_user_registration_form_provincia" name="provincia" oninvalid="setCustomValidity(&quot;Ingrese una provincia&quot;)" onfocus="setCustomValidity(&quot;&quot;)">
										<option value="1">Buenos Aires</option>
										<option value="2">Capital Federal</option>
										<option value="3">Catamarca</option>
										<option value="4">Chaco</option>
										<option value="5">Chubut</option>
										<option value="6">Córdoba</option>
										<option value="7">Corrientes</option>
										<option value="8">Entre Ríos</option>
										<option value="9">Formosa</option>
										<option value="10">Jujuy</option>
										<option value="11">La Pampa</option>
										<option value="12">La Rioja</option>
										<option value="13">Mendoza</option>
										<option value="14">Misiones</option>
										<option value="15">Neuquén</option>
										<option value="16">Río Negro</option>
										<option value="17">Salta</option>
										<option value="18">San Juan</option>
										<option value="19">San Luis</option>
										<option value="20">Santa Cruz</option>
										<option value="21">Santa Fe</option>
										<option value="22">Santiago del Estero</option>
										<option value="23">Tierra del Fuego</option>
										<option value="24">Tucumán</option>
									</select>
								</div>
								<div>
									<label for="fos_user_registration_form_localidad" class="required">Localidad</label>
									<input type="text" id="fos_user_registration_form_localidad" name="localidad" required="required" oninvalid="setCustomValidity(&quot;Ingrese su localidad&quot;)" onfocus="setCustomValidity(&quot;&quot;)" />
								</div>
								<div>
									<label for="fos_user_registration_form_telefono" class="required">Telefono</label>
									<input type="text" id="fos_user_registration_form_telefono" name="telefono" required="required" oninvalid="setCustomValidity(&quot;Ingrese su telefono&quot;)" onfocus="setCustomValidity(&quot;&quot;)" />
								</div>
								<div>
									<label for="fos_user_registration_form_dni" class="required">Dni</label>
									<input type="text" id="fos_user_registration_form_dni" name="dni" required="required" oninvalid="setCustomValidity(&quot;Ingrese su DNI&quot;)" onfocus="setCustomValidity(&quot;&quot;)" />
								</div>
								<div>
									<label class="registro-check-terminos-label label-terminos required" for="fos_user_registration_form_terminos">Acepto los Terminos y Condiciones</label>
									<input type="checkbox" id="fos_user_registration_form_terminos" name="terminos" required="required" class="registro-check-terminos input-terminos" oninvalid="setCustomValidity(&quot;Acepte los t�rminos y condiciones&quot;)" onfocus="setCustomValidity(&quot;&quot;)" value="1" />
								</div>
								<input type="hidden" id="fos_user_registration_form__token" name="_token" value="EZ-hO6Fo_7RJCIY9nv0EZl_cZ4MPz2QctDeNiDs9GjA" /></div>
                                
                            <div style="margin-top:-55px; margin-bottom:10px;">
                                <input type="submit" value="Registrar" />
                            </div>
                        </form>
                        <div class="pie">
                            <div class="terminos-link">TÉRMINOS Y CONDICIONES</div>
                        </div>
                </div>
                        <div class="contenedor-terminos">
                                    Terminos y Condiciones               
                             </div>
       
        </div>
    </div>
    <div id="logopie"> 
    <img src="<?echo base_url()?>assets/img/logobridgestone.png"/>
    </div>
</div>

        <script src="<?echo base_url()?>assets/js/lib/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/lib/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/lib/bootbox.min.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/lib/jsrender.min.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/lib/jquery.numberMask.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/lib/jquery.countdown.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/app.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/service/service.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/service/usuario/usuario.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/service/trivia/trivia.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/service/grupo/grupo.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/ui/ui.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/ui/grupos/grupos.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/ui/premios/premios.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/ui/trivias/trivias.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/ui/detallePuntaje/detallePuntaje.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/ui/reglamento/reglamento.js" type="text/javascript"></script>
        <script src="<?echo base_url()?>assets/js/app/ui/login/login.js" type="text/javascript"></script><script type="text/javascript">
            $(document).on("ready",function(){
                app.ui.init();
                app.ui.grupos.init();
                app.ui.premios.init();  
                app.ui.trivias.init();
                app.ui.reglamento.init();
                app.ui.detallePuntaje.init();
                app.ui.login.init();
            });
          </script>
            </body>
</html>
