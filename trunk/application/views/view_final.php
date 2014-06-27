<div id="listaFinal">
            <div class="grupo">
              <div class="grupo-titulo"> OCTAVOS DE FINAL </div>
			  <?$separador = 0; 
				foreach ($estructuraOctavos as $val){ ?>
				  <? if ($separador==0 || $separador ==4){ ?>
					<div class="lista-partidos">
				  <? } ?>
						<? 
						$fechaPartido = null;
						$idPartido = 0;
						if (isset($partidosOctavos[$val->idPlayoff])==1){
							$fechaPartido = new DateTime($partidosOctavos[$val->idPlayoff]["fechaPartido"]); 
							$CI =& get_instance();
							$horas = $CI->dateTimeDiff($fechaHoy,$fechaPartido);
							$idPartido = $partidosOctavos[$val->idPlayoff]["idPartido"];
						}?>
						<div class="partido <? if ($fechaPartido == null) { ?> partido-inactivo <? } ?>" data-id="<?=$idPartido?>">
						  <div class="bandera">
							<img src="<?if (isset($partidosOctavos[$val->idPlayoff])) {echo base_url()?>assets/img/banderas/<?=$partidosOctavos[$val->idPlayoff]["banderaLocal"];}else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera">
						  </div>
						  <div class="equipo equipo-izq">
							  <? if (!isset($partidosOctavos[$val->idPlayoff])==1){
									echo $val->posicion1 . "º " . $val->nombre1;
								}else{
									echo $partidosOctavos[$val->idPlayoff]["equipolocal"];
								}
							  ?>
							<? if (isset($partidosOctavos[$val->idPlayoff])==1){ ?>
								<div class="ganador" style="display:none">
									<input type="radio" data-id="<?=$partidosOctavos[$val->idPlayoff]["idequipolocal"]?>" name="partido-<?=$idPartido?>" class=" radioGanador" <? if(isset($partidosUsuario[$idPartido]['idGanador'])==1 && $partidosUsuario[$idPartido]['idGanador']== $partidosOctavos[$val->idPlayoff]["idequipolocal"]) { ?>  checked <? } ?> />
								</div>
							<? } ?>
						  </div>
							<input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesLocal'] :  "-" ;  ?>" maxlength="2" class="partido-gol-input partido-gol-input-local" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <div class="partido-separacion-input">ó</div>
							<input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesVisitante'] :  "-" ;  ?>" class="partido-gol-input partido-gol-input-visitante" maxlength="2" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <div class="equipo equipo-der">
							  <? if (!isset($partidosOctavos[$val->idPlayoff])==1){
									echo $val->posicion2 . "º " . $val->nombre2;
								}else{
									echo $partidosOctavos[$val->idPlayoff]["equipovisitante"];
								}
							  ?> 
							<? if (isset($partidosOctavos[$val->idPlayoff])==1){ ?>
								<div class="ganador" style="display:none">
									<input type="radio" data-id="<?=$partidosOctavos[$val->idPlayoff]["idequipolocal"]?>" name="partido-<?=$idPartido?>" class=" radioGanador" <? if(isset($partidosUsuario[$idPartido]['idGanador'])==1 && $partidosUsuario[$idPartido]['idGanador']== $partidosOctavos[$val->idPlayoff]["idequipovisitante"]) { ?>  checked <? } ?> />
								</div>
							<? } ?>
						   </div>
						  <div class="bandera">
							<img src="<?if (isset($partidosOctavos[$val->idPlayoff])) {echo base_url()?>assets/img/banderas/<?=$partidosOctavos[$val->idPlayoff]["banderaVisitante"];}else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera">
						  </div>
						<div class="contenido-derecha">
							<? if ($fechaHoy > $fechaPartido) {?>
								<div class="contenido-derecha">
									<? if (isset($partidosOctavos[$val->idPlayoff])==1){ ?>
										<div class="resultado"><?=$partidosOctavos[$val->idPlayoff]["golesLocal"]?>-<?=$partidosOctavos[$val->idPlayoff]["golesVisitante"]?></div>
										<div class="puntaje"><?if (!empty($partidosUsuario[$idPartido])){ echo $partidosUsuario[$idPartido]['puntos'];} ?></div>
									<? } ?>
								</div>
							<? } else { 
								 if ($horas->d <= 8) {?>
									<? if ($horas->d != 0 || $horas->h >= 2) {?>
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
						$CI =& get_instance();
						$horas = $CI->dateTimeDiff($fechaHoy,$fechaPartido);
					}
					?>
					<div class="partido partido-fase-final cuartos-<?=$countCuartos?>" data-id="<?=$idPartido?>">
					  <div class="partido-activo" >
						<div class="bandera"><img src="<?if (isset($partidosCuartos[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidosCuartos[$val['idPlayoff']]["banderaLocal"];}else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
						<div class="equipo equipo-izq">
							<?if (!isset($partidosCuartos[$val['idPlayoff']])) 
							{
								echo $val['estructura'][0]['padre'][0]['posicion'] . "º " . $val['estructura'][0]['padre'][0]['nombregrupo'] . " ó ".  $val['estructura'][0]['padre'][1]['posicion'] . "º " . $val['estructura'][0]['padre'][1]['nombregrupo'] ;
							}else {
								echo $partidosCuartos[$val['idPlayoff']]["equipolocal"];
							}
							 ?>
						</div>
						<!--<input class="partido-gol-input" disabled="disabled">-->
						<input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesLocal'] :  "-" ;  ?>" maxlength="2" class="partido-gol-input partido-gol-input-local" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						<br>
						<div class="bandera"><img src="<?if (isset($partidosCuartos[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidosCuartos[$val['idPlayoff']]["banderaVisitante"];}else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
						<div class="equipo equipo-der">
							<?if (!isset($partidosCuartos[$val['idPlayoff']])) 
							{
								echo $val['estructura'][1]['padre'][0]['posicion'] . "º " . $val['estructura'][1]['padre'][0]['nombregrupo'] . " ó ".  $val['estructura'][1]['padre'][1]['posicion'] . "º " . $val['estructura'][1]['padre'][1]['nombregrupo'] ;
							}else {
								echo $partidosCuartos[$val['idPlayoff']]["equipovisitante"];
							}
							 ?>
						</div>
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
									<? if ($horas->d != 0 || $horas->h >= 2) {?>
										<? if (empty($partidosUsuario[$idPartido] )) { ?>
											<div id="boton-<?=$idPartido?>" class="boton-enviar <?echo base_url()?>assets/js-boton-enviar"></div>
										<? } else { ?>
											<div class="boton-editar <?echo base_url()?>assets/js-boton-editar"></div>
										<? }?>
									<? }?>
								<? }?>
							<? }?>
						</div>
						<? if (isset($partidosCuartos[$val['idPlayoff']])==1){ ?>
							<div class="ganador" style="display:none">
								<div class="equipo equipo-izq titulo-ganador">Ganador</div>
								<div class="equipo equipo-izq ganador-local">Local</div>
								<input type="radio" data-id="<?=$partidosCuartos[$val['idPlayoff']]["idequipolocal"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
								<div class="equipo equipo-izq ganador-visitante">Visitante</div>
								<input type="radio" data-id="<?=$partidosCuartos[$val['idPlayoff']]["idequipovisitante"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
							</div>
						<? } ?>
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
							$CI =& get_instance();
							$horas = $CI->dateTimeDiff($fechaHoy,$fechaPartido);

						}
						$nroEquipoSemi += 1;
						?>
						<div class="partido partido-fase-final semi-<?=$countSemis?>" data-id="<?=$idPartido?>">
						  <div class="partido-activo">
							<div class="bandera"><img src="<?if (isset($partidosSemis[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidosSemis[$val['idPlayoff']]["banderaLocal"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
							<div class="equipo equipo-izq">
							<?if (!isset($partidosSemis[$val['idPlayoff']])) 
							{
								echo "Semi " . $nroEquipoSemi;
							}else {
								echo $partidosSemis[$val['idPlayoff']]["equipolocal"];
							}
							 ?>
							</div>
							<input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesLocal'] :  "-" ;  ?>" maxlength="2" class="partido-gol-input partido-gol-input-local" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
							<br>
							<div class="bandera"><img src="<?if (isset($partidosSemis[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidosSemis[$val['idPlayoff']]["banderaVisitante"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
							<? $nroEquipoSemi += 1;?>
							<div class="equipo equipo-der">
							<?if (!isset($partidosSemis[$val['idPlayoff']])) 
							{
								echo "Semi " . $nroEquipoSemi;
							}else {
								echo $partidosSemis[$val['idPlayoff']]["equipovisitante"];
							}
							 ?>
							</div>
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
										<? if ($horas->d != 0 || $horas->h >= 2) {?>
											<? if (empty($partidosUsuario[$idPartido] )) { ?>
												<div class="boton-enviar <?echo base_url()?>assets/js-boton-enviar"></div>
											<? } else { ?>
												<div class="boton-editar <?echo base_url()?>assets/js-boton-editar"></div>
											<? }?>
										<? }?>
									<? }?>
								<? }?>
							</div>
							<? if (isset($partidosSemis[$val['idPlayoff']])==1){ ?>
								<div class="ganador" style="display:none">
									<div class="equipo equipo-izq titulo-ganador">Ganador</div>
									<div class="equipo equipo-izq ganador-local">Local</div>
									<input type="radio" data-id="<?=$partidosSemis[$val['idPlayoff']]["idequipolocal"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
									<div class="equipo equipo-izq ganador-visitante">Visitante</div>
									<input type="radio" data-id="<?=$partidosSemis[$val['idPlayoff']]["idequipovisitante"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
								</div>
							<? } ?>
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
							$CI =& get_instance();
							$horas = $CI->dateTimeDiff($fechaHoy,$fechaPartido);

						}
						$nroEquipoFinal += 1;
						?>
						<div class="partido partido-fase-final final" data-id="<?=$idPartido?>">
							
							<? if (isset($partidoFinal[$val['idPlayoff']])==1){ ?>
								<div class="ganador" style="display:none">
									<input type="radio" data-id="<?=$partidoFinal[$val['idPlayoff']]["idequipolocal"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
								</div>
							<? } ?>
							
						<div class="bandera"><img src="<?if (isset($partidoFinal[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidoFinal[$val['idPlayoff']]["banderaLocal"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
						  <div class="equipo equipo-izq">
							<?if (!isset($partidoFinal[$val['idPlayoff']])) 
							{
								echo "Finalista " . $nroEquipoFinal;
							}else {
								echo $partidoFinal[$val['idPlayoff']]["equipolocal"];
							}
							 ?>
						  </div>
						  <input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesLocal'] :  "-" ;  ?>" maxlength="2" class="partido-gol-input partido-gol-input-local" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <? $nroEquipoFinal += 1;?>
						  <div class="partido-separacion-input">.</div>
						  <input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesVisitante'] :  "-" ;  ?>" class="partido-gol-input partido-gol-input-visitante" maxlength="2" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <div class="equipo equipo-der">
							<?if (!isset($partidoFinal[$val['idPlayoff']])) 
							{
								echo "Finalista " . $nroEquipoFinal;
							}else {
								echo $partidoFinal[$val['idPlayoff']]["equipovisitante"];
							}
							 ?>
						  </div>
						  <div class="bandera"><img src="<?if (isset($partidoFinal[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidoFinal[$val['idPlayoff']]["banderaVisitante"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
						  
							<? if (isset($partidoFinal[$val['idPlayoff']])==1){ ?>
								<div class="ganador-izq" style="display:none">
									<input type="radio" data-id="<?=$partidoFinal[$val['idPlayoff']]["idequipovisitante"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
								</div>
							<? } ?>
						  
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
										<? if ($horas->d != 0 || $horas->h >= 2) {?>
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
							$CI =& get_instance();
							$horas = $CI->dateTimeDiff($fechaHoy,$fechaPartido);

						}
						$nroEquipoTercer += 1; ?>
						<div class="partido partido-fase-final tercer-cuarto" data-id="<?=$idPartido?>">
						  
							<? if (isset($partidoTercer[$val['idPlayoff']])==1){ ?>
								<div class="ganador" style="display:none">
									<input type="radio" data-id="<?=$partidoTercer[$val['idPlayoff']]["idequipolocal"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
								</div>
							<? } ?>
						  
						  <div class="bandera"><img src="<?if (isset($partidoTercer[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidoTercer[$val['idPlayoff']]["banderaLocal"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
						  <div class="equipo equipo-izq">
							<?if (!isset($partidoTercer[$val['idPlayoff']])) 
							{
								echo "Equipo " . $nroEquipoTercer;
							}else {
								echo $partidoTercer[$val['idPlayoff']]["equipolocal"];
							}
							 ?>
						  </div>
						  <input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesLocal'] :  "-" ;  ?>" maxlength="2" class="partido-gol-input partido-gol-input-local" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <? $nroEquipoTercer += 1;?>
						  <div class="partido-separacion-input">.</div>
						  <input value="<?=(!empty($partidosUsuario[$idPartido])) ? $partidosUsuario[$idPartido]['golesVisitante'] :  "-" ;  ?>" class="partido-gol-input partido-gol-input-visitante" maxlength="2" <?if (!empty($partidosUsuario[$idPartido])) { ?> disabled="disabled" <? } ?>>
						  <div class="equipo equipo-der">
							<?if (!isset($partidoTercer[$val['idPlayoff']])) 
							{
								echo "Equipo " . $nroEquipoTercer;
							}else {
								echo $partidoTercer[$val['idPlayoff']]["equipovisitante"];
							}
							 ?>
						  </div>
						  <div class="bandera"><img src="<?if (isset($partidoTercer[$val['idPlayoff']])) {echo base_url()?>assets/img/banderas/<?=$partidoTercer[$val['idPlayoff']]["banderaVisitante"];} else { echo "assets/img/banderas/16702.jpg";} ?>" title="bandera"></div>
						  
							<? if (isset($partidoTercer[$val['idPlayoff']])==1){ ?>
								<div class="ganador-izq" style="display:none">
									<input type="radio" data-id="<?=$partidoTercer[$val['idPlayoff']]["idequipovisitante"]?>" name="partido-<?=$idPartido?>" class=" radioGanador"/>
								</div>
							<? } ?>
						  
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
										<? if ($horas->d != 0 || $horas->h >= 2) {?>
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