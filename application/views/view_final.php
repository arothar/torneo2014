<div id="listaFinal">
            <div class="grupo">
              <div class="grupo-titulo"> OCTAVOS DE FINAL </div>
			  <?$separador = 0; 
				foreach ($estructuraOctavos as $val){ ?>
				  <? if ($separador==0 || $separador ==4){ 
						$fechaPartido = new DateTime($partidosOctavos[$val->idPlayoff]["fechaPartido"]); 
						$CI =& get_instance();
						$horas = $CI->dateTimeDiff($fechaHoy,$fechaPartido);
						?>
					<div class="lista-partidos">
				  <? } ?>
						<? $idPartido = $partidosOctavos[$val->idPlayoff]["idPartido"]; ?>
						<div class="partido <? if ($horas->d > 2) { ?> partido-inactivo <? } ?>" data-id="<?=$idPartido?>">
						  <div class="bandera">
							<img src="<?if (isset($partidosOctavos[$val->idPlayoff])) {echo base_url()?>assets/img/banderas/<?=$partidosOctavos[$val->idPlayoff]["banderaLocal"];}else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera">
						  </div>
						  <div class="equipo equipo-izq"><?=$val->posicion1;?>º <?=$val->nombre1;?></div>
							<input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesLocal'] :  "-" ;  ?>" maxlength="2" class="partido-gol-input partido-gol-input-local" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <div class="partido-separacion-input">ó</div>
							<input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesVisitante'] :  "-" ;  ?>" class="partido-gol-input partido-gol-input-visitante" maxlength="2" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <div class="equipo equipo-der"><?=$val->posicion2;?>º <?=$val->nombre2;?></div>
						  <div class="bandera">
							<img src="<?if (isset($partidosOctavos[$val->idPlayoff])) {echo base_url()?>assets/img/banderas/<?=$partidosOctavos[$val->idPlayoff]["banderaVisitante"];}else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera">
						  </div>
						<div class="contenido-derecha">
							<? if ($fechaHoy > $fechaPartido) {?>
								<div class="contenido-derecha">
									<div class="resultado"><?=$partidosOctavos[$val->idPlayoff]["golesLocal"]?>-<?=$partidosOctavos[$val->idPlayoff]["golesVisitante"]?></div>
									<div class="puntaje"><?if (!empty($partidosUsuario[$idPartido])){ echo $partidosUsuario[$idPartido]['puntos'];} ?></div>
								</div>
							<? } else { 
								 if ($horas->d <= 2) {?>
									<? if ($horas->d != 0 || $horas->h >= 5) {?>
										<? if (empty($partidosUsuario[$idPartido])) { ?>
											<div class="boton-enviar <?echo base_url()?>assets/js-boton-enviar"></div>
										<? } else { ?>
											<div class="boton-editar <?echo base_url()?>assets/js-boton-editar"></div>
										<? }?>
									<? }?>
								<? }?>
							<? }?>
						</div>
						</div>
					<? if ($separador==3 || $separador ==7){ ?>
						</div>
					<? } 
					$separador += 1;
				   ?>
			   <? } ?>
            </div>
            <div class="fondo-fase-final">
              <div class="arbol-fase-final">
			    <? $countCuartos = 1;
					$idPartido =0;
					foreach ($estructuraCuartosArray as $val){ 
					if (isset($partidosCuartos[$val['idPlayoff']])==1){
						$fechaPartido = new DateTime($partidosCuartos[$val['idPlayoff']]["fechaPartido"]); 
						$idPartido = $partidosCuartos[$val['idPlayoff']]["idPartido"];
					}
					?>
					<div class="partido partido-fase-final cuartos-<?=$countCuartos?>" data-id="<?=$idPartido?>">
					  <div class="partido-activo" >
						<div class="bandera"><img src="<?if (isset($partidosCuartos[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidosCuartos[$val['idPlayoff']]["banderaLocal"];}else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
						<div class="equipo equipo-izq"><?=$val['estructura'][0]['padre'][0]['posicion'] ?>º <?=$val['estructura'][0]['padre'][0]['nombregrupo'] ?> ó <?=$val['estructura'][0]['padre'][1]['posicion'] ?>º <?=$val['estructura'][0]['padre'][1]['nombregrupo'] ?></div>
						<!--<input class="partido-gol-input" disabled="disabled">-->
						<input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesLocal'] :  "-" ;  ?>" maxlength="2" class="partido-gol-input partido-gol-input-local" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						<br>
						<div class="bandera"><img src="<?if (isset($partidosCuartos[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidosCuartos[$val['idPlayoff']]["banderaVisitante"];}else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
						<div class="equipo equipo-der"><?=$val['estructura'][1]['padre'][0]['posicion'] ?>º <?=$val['estructura'][1]['padre'][0]['nombregrupo'] ?> ó <?=$val['estructura'][1]['padre'][1]['posicion'] ?>º <?=$val['estructura'][1]['padre'][1]['nombregrupo'] ?></div>
						<!--<input class="partido-gol-input" disabled="disabled">-->
						<input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesVisitante'] :  "-" ;  ?>" class="partido-gol-input partido-gol-input-visitante" maxlength="2" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						<div class="contenido-<?if ($countCuartos%2==0) echo "izquierda"; else echo "derecha";?>">
							<? if ($fechaHoy > $fechaPartido) {?>
								<div class="resultado-<?if ($countCuartos%2==0) echo "izquierda"; else echo "derecha";?>">
									<? if (isset($partidosCuartos[$val['idPlayoff']])==1){ ?>
										<div class="resultado"><?=$partidosCuartos[$val['idPlayoff']]["golesLocal"]?>-<?=$partidosCuartos[$val['idPlayoff']]["golesVisitante"]?></div>
										<div class="puntaje"><?if (!empty($partidosUsuario[$idPartido])){ echo $partidosUsuario[$idPartido]['puntos'];} ?></div>
									<? } ?>
								</div>
							<? } else { 
								 if ($horas->d <= 2) {?>
									<? if ($horas->d != 0 || $horas->h >= 5) {?>
										<? if (empty($partidosUsuario[$idPartido] )) { ?>
											<div id="boton-<?=$idPartido?>" class="boton-enviar <?echo base_url()?>assets/js-boton-enviar"></div>
										<? } else { ?>
											<div class="boton-editar <?echo base_url()?>assets/js-boton-editar"></div>
										<? }?>
									<? }?>
								<? }?>
							<? }?>
						</div>
						<div class="ganador">
							<div class="equipo equipo-izq titulo-ganador">Ganador</div>
							<div class="equipo equipo-izq ganador-local">Local</div>
							<input type="radio" data-id="<?=$partidosCuartos[$val['idPlayoff']]["idequipolocal"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
							<div class="equipo equipo-izq ganador-visitante">Visitante</div>
							<input type="radio" data-id="<?=$partidosCuartos[$val['idPlayoff']]["idequipovisitante"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
						</div>
					  </div>
					</div>
				<? $countCuartos += 1;
				} ?>
				<? $countSemis = 1;
					$idPartido =0;
					$nroEquipoSemi = 0;
					foreach ($estructuraSemisArray as $val){ 
						if (isset($partidosSemis[$val['idPlayoff']])==1){
							$fechaPartido = new DateTime($partidosSemis[$val['idPlayoff']]["fechaPartido"]); 
							$idPartido = $partidosSemis[$val['idPlayoff']]["idPartido"];
						}
						$nroEquipoSemi += 1;
						?>
						<div class="partido partido-fase-final semi-<?=$countSemis?>" data-id="<?=$idPartido?>">
						  <div class="partido-activo">
							<div class="bandera"><img src="<?if (isset($partidosSemis[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidosSemis[$val['idPlayoff']]["banderaLocal"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
							<div class="equipo equipo-izq">Semi <?=$nroEquipoSemi?></div>
							<input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesLocal'] :  "-" ;  ?>" maxlength="2" class="partido-gol-input partido-gol-input-local" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
							<br>
							<div class="bandera"><img src="<?if (isset($partidosSemis[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidosSemis[$val['idPlayoff']]["banderaVisitante"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
							<? $nroEquipoSemi += 1;?>
							<div class="equipo equipo-der">Semi <?=$nroEquipoSemi?></div>
							<input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesVisitante'] :  "-" ;  ?>" class="partido-gol-input partido-gol-input-visitante" maxlength="2" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
							<div class="contenido-<?if ($countSemis%2==0) echo "izquierda"; else echo "derecha";?>">
								<? if ($fechaHoy > $fechaPartido) {?>
									<div class="resultado-<?if ($countSemis%2==0) echo "izquierda"; else echo "derecha";?>">
										<? if (isset($partidosSemis[$val['idPlayoff']])==1){ ?>
											<div class="resultado"><?=$partidosSemis[$val['idPlayoff']]["golesLocal"]?>-<?=$partidosSemis[$val['idPlayoff']]["golesVisitante"]?></div>
											<div class="puntaje"><?if (!empty($partidosUsuario[$idPartido])){ echo $partidosUsuario[$idPartido]['puntos'];} ?></div>
										<? } ?>
									</div>
								<? } else { 
									 if ($horas->d <= 2) {?>
										<? if ($horas->d != 0 || $horas->h >= 5) {?>
											<? if (empty($partidosUsuario[$idPartido] )) { ?>
												<div class="boton-enviar <?echo base_url()?>assets/js-boton-enviar"></div>
											<? } else { ?>
												<div class="boton-editar <?echo base_url()?>assets/js-boton-editar"></div>
											<? }?>
										<? }?>
									<? }?>
								<? }?>
							</div>
							<div class="ganador">
								<div class="equipo equipo-izq titulo-ganador">Ganador</div>
								<div class="equipo equipo-izq ganador-local">Local</div>
								<input type="radio" data-id="<?=$partidosSemis[$val['idPlayoff']]["idequipolocal"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
								<div class="equipo equipo-izq ganador-visitante">Visitante</div>
								<input type="radio" data-id="<?=$partidosSemis[$val['idPlayoff']]["idequipovisitante"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
							</div>
						  </div>
						</div>
					<? $countSemis += 1;
				} ?>
				<?	$idPartido =0;
					$nroEquipoFinal = 0;
					foreach ($estructuraFinalisimaArray as $val){ 
						if (isset($partidoFinal[$val['idPlayoff']])==1){
							$fechaPartido = new DateTime($partidoFinal[$val['idPlayoff']]["fechaPartido"]); 
							$idPartido = $partidoFinal[$val['idPlayoff']]["idPartido"];
						}
						$nroEquipoFinal += 1;
						?>
						<div class="partido partido-fase-final final" data-id="<?=$idPartido?>">
						  <div class="bandera"><img src="<?if (isset($partidoFinal[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidoFinal[$val['idPlayoff']]["banderaLocal"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
						  <div class="equipo equipo-izq">Finalista <?=$nroEquipoFinal?></div>
						  <input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesLocal'] :  "-" ;  ?>" maxlength="2" class="partido-gol-input partido-gol-input-local" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <? $nroEquipoFinal += 1;?>
						  <div class="partido-separacion-input">.</div>
						  <input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesVisitante'] :  "-" ;  ?>" class="partido-gol-input partido-gol-input-visitante" maxlength="2" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <div class="equipo equipo-der">Finalista <?=$nroEquipoFinal?></div>
						  <div class="bandera"><img src="<?if (isset($partidoFinal[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidoFinal[$val['idPlayoff']]["banderaVisitante"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
							<div class="contenido-inferior">
								<? if ($fechaHoy > $fechaPartido) {?>
									<div class="resultado-inferior">
										<? if (isset($partidoFinal[$val['idPlayoff']])==1){ ?>
											<div class="resultado"><?=$partidoFinal[$val['idPlayoff']]["golesLocal"]?>-<?=$partidoFinal[$val['idPlayoff']]["golesVisitante"]?></div>
											<div class="puntaje"><?if (!empty($partidosUsuario[$idPartido])){ echo $partidosUsuario[$idPartido]['puntos'];} ?></div>
										<? } ?>
									</div>
								<? } else { 
									 if ($horas->d <= 2) {?>
										<? if ($horas->d != 0 || $horas->h >= 5) {?>
											<? if (empty($partidosUsuario[$idPartido] )) { ?>
												<div class="boton-enviar <?echo base_url()?>assets/js-boton-enviar"></div>
											<? } else { ?>
												<div class="boton-editar <?echo base_url()?>assets/js-boton-editar"></div>
											<? }?>
										<? }?>
									<? }?>
								<? }?>
							</div>
						</div>
				<? } ?>
				<?	$idPartido =0;
					$nroEquipoTercer = 0;
					
					foreach ($estructuraTercerArray as $val){ 
						if (isset($partidoTercer[$val['idPlayoff']])==1){
							$fechaPartido = new DateTime($partidoTercer[$val['idPlayoff']]["fechaPartido"]); 
							$idPartido = $partidoTercer[$val['idPlayoff']]["idPartido"];
						}
						$nroEquipoTercer += 1; ?>
						<div class="partido partido-fase-final tercer-cuarto" data-id="<?=$idPartido?>">
						  <div class="bandera"><img src="<?if (isset($partidoTercer[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidoTercer[$val['idPlayoff']]["banderaLocal"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
						  <div class="equipo equipo-izq">Equipo <?=$nroEquipoTercer?> </div>
						  <input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesLocal'] :  "-" ;  ?>" maxlength="2" class="partido-gol-input partido-gol-input-local" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <? $nroEquipoTercer += 1;?>
						  <div class="partido-separacion-input">.</div>
						  <input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesVisitante'] :  "-" ;  ?>" class="partido-gol-input partido-gol-input-visitante" maxlength="2" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <div class="equipo equipo-der">Equipo <?=$nroEquipoTercer?></div>
						  <div class="bandera"><img src="<?if (isset($partidoTercer[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidoTercer[$val['idPlayoff']]["banderaVisitante"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
							<div class="contenido-inferior">
								<? if ($fechaHoy > $fechaPartido) {?>
									<div class="resultado-inferior">
										<? if (isset($partidoTercer[$val['idPlayoff']])==1){ ?>
											<div class="resultado"><?=$partidoTercer[$val['idPlayoff']]["golesLocal"]?>-<?=$partidoTercer[$val['idPlayoff']]["golesVisitante"]?></div>
											<div class="puntaje"><?if (!empty($partidosUsuario[$idPartido])){ echo $partidosUsuario[$idPartido]['puntos'];} ?></div>
										<? } ?>
									</div>
								<? } else { 
									 if ($horas->d <= 2) {?>
										<? if ($horas->d != 0 || $horas->h >= 5) {?>
											<? if (empty($partidosUsuario[$idPartido] )) { ?>
												<div class="boton-enviar <?echo base_url()?>assets/js-boton-enviar"></div>
											<? } else { ?>
												<div class="boton-editar <?echo base_url()?>assets/js-boton-editar"></div>
											<? }?>
										<? }?>
									<? }?>
								<? }?>
							</div>
						</div>
				<? } ?>
              </div>
            </div>
          </div><br>