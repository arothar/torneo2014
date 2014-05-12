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
									<div class="resultado"><?=$partidos[$grupo->idGrupo][$i]["golesLocal"]?>-<?=$partidos[$grupo->idGrupo][$i]["golesVisitante"]?></div>
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
                <div class="partido partido-fase-final cuartos-1" data-id="117">
                  <div class="partido partido-inactivo" data-id="117">
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                    <div class="equipo equipo-izq">1º A ó 2º B</div>
                    <input class="partido-gol-input" disabled="disabled">
                    <br>
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                    <div class="equipo equipo-der">1º C ó 2º D</div>
                    <input class="partido-gol-input" disabled="disabled">
                  </div>
                </div>
                <div class="partido partido-fase-final cuartos-2" data-id="118">
                  <div class="partido partido-inactivo" data-id="118">
                    <input class="partido-gol-input" disabled="disabled">
                    <div class="equipo equipo-izq">1º E ó 2º F</div>
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                    <br>
                    <input class="partido-gol-input" disabled="disabled">
                    <div class="equipo equipo-der">1º G ó 2º H</div>
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                  </div>
                </div>
                <div class="partido partido-fase-final cuartos-3" data-id="119">
                  <div class="partido partido-inactivo" data-id="119">
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                    <div class="equipo equipo-izq">1º B ó 2º A</div>
                    <input class="partido-gol-input" disabled="disabled">
                    <br>
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                    <div class="equipo equipo-der">1º D ó 2º C</div>
                    <input class="partido-gol-input" disabled="disabled">
                  </div>
                </div>
                <div class="partido partido-fase-final cuartos-4 " data-id="120">
                  <div class="partido partido-inactivo" data-id="120">
                    <input class="partido-gol-input" disabled="disabled">
                    <div class="equipo equipo-izq">1º F ó 2º E</div>
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                    <br>
                    <input class="partido-gol-input" disabled="disabled">
                    <div class="equipo equipo-der">1º H ó 2º G</div>
                    <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
                  </div>
                </div>
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