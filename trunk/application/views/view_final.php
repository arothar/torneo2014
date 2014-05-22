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
											<div class="boton-enviar <?echo base_url()?>assets/js-boton-enviar"></div>
										<? } else { ?>
											<div class="boton-editar <?echo base_url()?>assets/js-boton-editar"></div>
										<? }?>
									<? }?>
								<? }?>
							<? }?>
						</div>
					  </div>
					</div>
				<? $countCuartos += 1;
				} ?>

                <div class="partido partido-fase-final
                                        semi-1
                    " data-id="121">
                  <div class="partido partido-inactivo" data-id="121">
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                    <div class="equipo equipo-izq">Semi 1</div>
                    <input class="partido-gol-input" disabled="disabled">
                    <br>
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                    <div class="equipo equipo-der">Semi 2</div>
                    <input class="partido-gol-input" disabled="disabled">
                  </div>
                </div>
                <div class="partido partido-fase-final
                                        semi-2
                    " data-id="125">
                  <div class="partido partido-inactivo" data-id="125">
                    <input class="partido-gol-input" disabled="disabled">
                    <div class="equipo equipo-izq">Semi 3</div>
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                    <br>
                    <input class="partido-gol-input" disabled="disabled">
                    <div class="equipo equipo-der">Semi 4</div>
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                  </div>
                </div>
                <div class="partido partido-fase-final final partido-inactivo" data-id="123">
                  <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                  <div class="equipo equipo-izq">Finalista 1</div>
                  <input class="partido-gol-input" disabled="disabled">
                  <div class="partido-separacion-input">.</div>
                  <input class="partido-gol-input" disabled="disabled">
                  <div class="equipo equipo-der">Finalista 2</div>
                  <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                </div>
                <div class="partido partido-fase-final tercer-cuarto partido-inactivo" data-id="124">
                  <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                  <div class="equipo equipo-izq">Equipo 1</div>
                  <input class="partido-gol-input" disabled="disabled">
                  <div class="partido-separacion-input">.</div>
                  <input class="partido-gol-input" disabled="disabled">
                  <div class="equipo equipo-der">Equipo 2</div>
                  <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                </div>
              </div>
            </div>
          </div><br>