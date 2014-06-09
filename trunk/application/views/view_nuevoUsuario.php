<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Desafio Mundial!</title>
		<!--<link href="<?echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">-->
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
									<?if ($existeUsuario==1) { ?>
										<ul>
											<li>El nombre de usuario ya existe</li>
										</ul>
									<? } ?>
									<input type="text" id="fos_user_registration_form_username" name="username" required="required" maxlength="255" pattern=".{2,}" oninvalid="setCustomValidity(&quot;Ingrese un nombre de usuario&quot;)" onfocus="setCustomValidity(&quot;&quot;)" />
								</div>
								<div>
									<label for="fos_user_registration_form_email" class="required">Email:</label>
									<?if ($existeEmail==1) { ?>
										<ul>
											<li>El email ya existe</li>
										</ul>
									<? } ?>
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
									<label for="fos_user_registration_form_nombre" class="required">Nombre Completo</label>
									<input type="text" id="fos_user_registration_form_nombre" name="nombre" required="required" oninvalid="setCustomValidity(&quot;Ingrese su nombre&quot;)" onfocus="setCustomValidity(&quot;&quot;)" />
								</div>
                                <div>
									<label for="fos_user_registration_form_nombre" class="required">DNI</label>
									<input type="text" id="fos_user_registration_form_nombre" name="nroDNI" required="required" oninvalid="setCustomValidity(&quot;Ingrese su dni&quot;)" onfocus="setCustomValidity(&quot;&quot;)" />
								</div>
								<div>
									<label for="fos_user_registration_form_nroLegajo" class="required">Nro. Legajo</label>
									<input type="text" id="fos_user_registration_form_nroLegajo" name="nroLegajo" required="required" oninvalid="setCustomValidity(&quot;Ingrese Nro de Legajo&quot;)" onfocus="setCustomValidity(&quot;&quot;)"/> 
								</div>
                                <div style="width:120px;">
									<label for="fos_user_registration_form_bridgestone"> Bridgestone </label> 
									<input style="height:auto; width:auto;" type="checkbox" value="1" id="fos_user_registration_form_bridgestone" name="esBridgestone" />
                                </div>
                                <div style="width:120px;">
									<label for="fos_user_registration_form_adecco"> Manpower  </label> 
									<input style="height:auto; width:auto;" type="checkbox" value="1" id="fos_user_registration_form_manpower" name="esManpower"  />
                                </div>
                                <div style="width:120px;">
									<label for="fos_user_registration_form_adecco"> Adecco  </label> 
									<input style="height:auto; width:auto;" type="checkbox" value="1" id="fos_user_registration_form_adecco" name="esAdecco"  />
                                </div>
								<!--<div>
									<label class="registro-check-terminos-label label-terminos required" for="fos_user_registration_form_terminos">Acepto los Terminos y Condiciones</label>
									<input type="checkbox" id="fos_user_registration_form_terminos" name="terminos" required="required" class="registro-check-terminos input-terminos" oninvalid="setCustomValidity(&quot;Acepte los t�rminos y condiciones&quot;)" onfocus="setCustomValidity(&quot;&quot;)" value="1" />
								</div>-->
                                </div>
                            <div>
                                <input type="submit" value="Registrar" onclick="javascript:return comprobarEspacios();" />
                            </div>
                        </form>
                        <div class="pie">
                            <a href='<?echo base_url()?>assets/uploads/Bases_Promocion_Mundial_interno_FINAL.docx'><div class="terminos-link">TÉRMINOS Y CONDICIONES</div></a>
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
            
				$("#fos_user_registration_form_username").change(function(){
					var espacio_blanco    = /\s/g;  //Expresión regular
					var campo_validar = $("#fos_user_registration_form_username").val();  //Si usamos Jquery podemos obtener el valor con la siguiente línea.
					if(espacio_blanco.test(campo_validar))
					{
						alert("El nombre de usuario no debe contener espacios en blanco.");
						setTimeout(function() {
							$("#fos_user_registration_form_username").focus();
						}, 0);
					}
					
				});
			});
			
			function comprobarEspacios(){
				var espacio_blanco    = /\s/g;  //Expresión regular
				var campo_validar = $("#fos_user_registration_form_username").val();  //Si usamos Jquery podemos obtener el valor con la siguiente línea.
				if(espacio_blanco.test(campo_validar))
				{
					alert("El nombre de usuario no debe contener espacios en blanco.");
					setTimeout(function() {
						$("#fos_user_registration_form_username").focus();
					}, 0);
					return false;
				}else {
					return true;
				}
					
			}
			
			
          </script>
            </body>
</html>
