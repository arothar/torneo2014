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
		<div id="contentLogin">
			<div id="logologin"> 
				<img src="<?echo base_url()?>assets/img/logoPremio.png"/> 
			</div>
			<div class="contenedor-caja-login">
				<div class="caja-login">
						<div class="encabezado">
							<div class="titulo">FORMULARIO DE ACCESO</div>
						</div>
						<form class="form-login" action="login/autenticar" method="post">
							<input type="hidden" name="_csrf_token" value="ifm3FHPWusdpy1b5FVfw9D8TalnzXbHLaXXHKyIa5Bg" />
							<input class="username_js" name="usuario"  placeholder="Usuario" type="text" value="" required="required" minlength="5"  />
							<input class="username" type="hidden" id="username" name="_username" value=""  />
							<input class="password" placeholder="Password" type="password" id="password" name="_password" required="required" />
							<input class="enviar" type="submit" value="Enviar"/>
						</form>
				</div>
				<input class="js-codigo-empresa" type="hidden" value="edemo" />
				<a class="registrado" href="login/nuevousuario">
					<div class="login-registrar">
						CREAR USUARIO NUEVO
					</div>
				</a>
				<div class="consultasLogin">
					  <a href="mailto:consultas@fanaticosdelmundial.com.ar">
						<div class="consultas"></div>
					  </a>
				</div>
				<div class="exploradores">
					<img src="<?echo base_url()?>assets/img/navegadores/frase.png" /> 
					<a class="registrado" target="blank" href="https://www.google.com/intl/en/chrome/browser/">
						<img src="<?echo base_url()?>assets/img/navegadores/chrome.png" /> 
					</a>
					<a class="registrado" target="blank" href="http://www.mozilla.org/en-US/firefox/new/">
						<img src="<?echo base_url()?>assets/img/navegadores/firefox.png" /> 
					</a>
					<a class="registrado" target="blank" href="http://support.apple.com/kb/dl1531">
						<img src="<?echo base_url()?>assets/img/navegadores/safari.png" /> 
					</a>
					<a class="registrado" target="blank" href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
						<img src="<?echo base_url()?>assets/img/navegadores/explorer.png" /> 
					</a>
				</div>
			</div>
			<div id="logopie"> 
				<img src="<?echo base_url()?>assets/img/logobridgestone.jpg"/>
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
