<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta charset="UTF-8" />
<title>Desafio Mundial!</title>
<link href="<?echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?echo base_url()?>assets/css/estilos.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?echo base_url()?>assets/css/css.css" rel="stylesheet" type="text/css" />
<link href="<?echo base_url()?>assets/css/css_002.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/x-icon" href="https://www.desafiomundial2014.com.ar/desafioMundial/appMundial/web/favicon.ico" />
</head>
<body>
<div id="contenedorheader">
	<div id="header"> 
	  <a href="login/remover/">
		<div class="logout"></div>
      </a>
	  <a href="mailto:consultas@fanaticosdelmundial.com.ar">
		<div class="consultas"></div>
      </a>
      <div class="header-modulo header-logo-premio"> <img src="<?echo base_url()?>assets/img/logoPremio.png" alt="Tu foto"> </div>
      <div class="header-modulo header-usuario">
        <div class="nombre"><?= $usuario->username?></div>
        <div class="puntos"> <? if ($usuario->puntos!= null) {echo $usuario->puntos;} else {echo 0;} ?> </div>
        <div class="sub-puntos">PUNTOS</div>
      </div>
    </div>
</div>
<div id="contenedor">
  <div id="content">
    <div id="cuerpo">
	<div id="alertSuccess" style="display:none" class="alert alert-success alert-dismissable">Resultado cargado correctamente..</div>
      <ul class="nav nav-tabs mundial-tab">
        <li><a href="#reglamento" data-toggle="tab">REGLAMENTO</a></li>
        <li class="active"><a href="#grupos" data-toggle="tab">FASE DE GRUPOS</a></li>
        <li><a href="#final" data-toggle="tab">FASE FINAL</a></li>
        <li><a href="#posiciones" data-toggle="tab">POSICIONES Y PREMIOS</a></li>
      </ul>
	  <form method="post" accept-charset="utf-8" action="ProdeLucho/dev/partido" >
      <div class="tab-content">
        <div class="tab-pane" id="reglamento"  style="margin-top:20px">
          <?php echo $outReglamento; ?>
        </div>
        <div class="tab-pane active " id="grupos">
			<?php echo $outFaseGrupo; ?>
        </div>
        <div class="tab-pane " id="final">
          <?php echo $outFinal; ?>
        </div>
        <div class="tab-pane" id="posiciones" style="height:645px">
			<?php echo $outPosiciones; ?>
        </div>
      </div>
	  </form>
    </div>
  </div>
  
  <div id="fb-root"></div>
</div>
<div id="pie">
<div id="contenedorpie">
<img src="<?echo base_url()?>assets/img/fondoPie.png"/>
</div>
</div>
<div class="contenedor-detalle-puntaje <?echo base_url()?>assets/js-detalle-puntaje">
  <div class="detalle-puntaje ">
    <div class="titulo">DETALLE DE TU PUNTAJE</div>
    <ul>
      <li class="encabezado-lista">
        <div class="fecha"> FECHA </div>
        <div class="etapa"> ETAPA </div>
        <div class="descripcion"> DESCRIPCIÓN </div>
        <div class="puntos"> PUNTOS </div>
      </li>
      <li class="fila-osc">
        <div class="fecha"> 12/06/2014 </div>
        <div class="etapa"> Grupos </div>
        <div class="descripcion"> Acierta Trivia </div>
        <div class="puntos"> 1 </div>
      </li>
      <li class="fila-clar">
        <div class="fecha"> 12/06/2014 </div>
        <div class="etapa"> Grupos </div>
        <div class="descripcion"> Acierta Prode </div>
        <div class="puntos"> 5 </div>
      </li>
      <li class="fila-osc">
        <div class="fecha"> 13/06/2014 </div>
        <div class="etapa"> Octavos </div>
        <div class="descripcion"> Acierta Prode </div>
        <div class="puntos"> 5 </div>
      </li>
      <li class="fila-clar">
        <div class="fecha"> 14/06/2014 </div>
        <div class="etapa"> Semi </div>
        <div class="descripcion"> Acierta Trivia </div>
        <div class="puntos"> 1 </div>
      </li>
    </ul>
    <div class="total">
      <div class="texto">TOTAL</div>
      <div class="numero">12</div>
    </div>
  </div>
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
<script src="<?echo base_url()?>assets/js/app/service/grupo/grupo.js" type="text/javascript"></script> 
<script src="<?echo base_url()?>assets/js/app/ui/ui.js" type="text/javascript"></script> 
<script src="<?echo base_url()?>assets/js/app/ui/grupos/grupos.js" type="text/javascript"></script> 
<script src="<?echo base_url()?>assets/js/app/ui/premios/premios.js" type="text/javascript"></script> 
<script src="<?echo base_url()?>assets/js/app/ui/trivias/trivias.js" type="text/javascript"></script> 
<script src="<?echo base_url()?>assets/js/app/ui/detallePuntaje/detallePuntaje.js" type="text/javascript"></script> 
<script src="<?echo base_url()?>assets/js/app/ui/reglamento/reglamento.js" type="text/javascript"></script> 
<script src="<?echo base_url()?>assets/js/app/ui/login/login.js" type="text/javascript"></script> 
<script type="text/javascript">
        $(document).on("ready", function () {
            app.ui.init();
            app.ui.grupos.init();
            app.ui.premios.init();
            app.ui.reglamento.init();
            app.ui.detallePuntaje.init();
            app.ui.login.init();
        });
		
		function enviar() {
			var botonActual = $(this);
			var partidoPadre = botonActual.parents(".partido");
			var partido = {};
			var loader = partidoPadre.find(".loader-partido");
			botonActual.hide();
			loader.css("display","inline-block");
			partido.idPartido = 2;
			return $.ajax({
				url: "http://localhost:4880/ProdeLucho/dev/prode/partido/",
				type: 'POST',
				data: {idPartido:2},
				dataType: 'json'
			});
		}
    </script>
</body>
</html>