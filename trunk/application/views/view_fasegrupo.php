﻿  <div id="listaGrupos">
	<? foreach ($grupos as $grupo){ ?>
		<div class="grupo">
			<div class="grupo-titulo"> GRUPO <?=$grupo->nombre; ?> </div>
			<div class="lista-partidos">
				<? for ($i=0; $i < count($partidos[$grupo->idGrupo]); $i++){ ?>
					<?
						$fechaPartido = new DateTime($partidos[$grupo->idGrupo][$i]["fechaPartido"]); 
						$CI =& get_instance();
						$horas = $CI->dateTimeDiff($fechaHoy,$fechaPartido);
					
					?>
					<? $idPartido = $partidos[$grupo->idGrupo][$i]["idPartido"]; ?>
					<div class="partido <?if ($horas->d > 2) { echo "partido-inactivo"; }?>" data-id="<?=$idPartido?>">
						<div class="bandera"><img src="assets/img/banderas/<?=$partidos[$grupo->idGrupo][$i]["banderaLocal"]; ?>" title="bandera"></div>
						<div class="equipo equipo-izq"><?=$partidos[$grupo->idGrupo][$i]["equipolocal"]; ?></div>
						<div class="partido-gol">
							<? if ($horas->d <= 2) {?>
								<input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesLocal'] :  "-" ;  ?>" maxlength="2" class="partido-gol-input partido-gol-input-local" disabled="disabled">
							<? } else { ?>
								<input disabled="disabled" class="partido-gol-input">
							<? } ?>
						</div>
						<div class="partido-separacion-input">.</div>
						<div class="partido-gol"><input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesVisitante'] :  "-" ;  ?>" class="partido-gol-input partido-gol-input-visitante" maxlength="2" disabled="disabled"></div>
						<div class="equipo equipo-der"><?=$partidos[$grupo->idGrupo][$i]["equipovisitante"]; ?></div>
						<div class="bandera"><img src="assets/img/banderas/<?=$partidos[$grupo->idGrupo][$i]["banderaVisitante"]; ?>" title="bandera"></div>
						<div class="contenido-derecha">
							<? if ($fechaHoy > $fechaPartido) {?>
								<div class="contenido-derecha">
									<div class="resultado">3-0</div>
									<div class="puntaje">5</div>
								</div>
							<? } else { 
								if ($horas->d <= 2) {?>
									<? if ($horas->d != 0 || $horas->h >= 5) {?>
										<? if (empty($partidosUsuario[$idPartido])) { ?>
											<div class="boton-enviar assets/js-boton-enviar"></div>
										<? } else { ?>
											<div class="boton-editar assets/js-boton-editar"></div>
										<? }?>
									<? }?>
								<? }?>
							<? }?>
						</div>
					</div>
				<? } ?>
			</div>
		</div>
	<? } ?>
	<div class="blank"></div>
  </div>