<div id="listaFinal">
            <div class="grupo">
              <div class="grupo-titulo"> OCTAVOS DE FINAL </div>
			  <?$separador = 0; 
				foreach ($estructuraOctavos as $val){ ?>
				  <? if ($separador==0 || $separador ==4){ ?>
					<div class="lista-partidos">
				  <? } ?>
						<div class="partido partido-inactivo" data-id="108">
						  <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
						  <div class="equipo equipo-izq"><?=$val->posicion1;?>º <?=$val->nombre1;?></div>
						  <input class="partido-gol-input" disabled="disabled">
						  <div class="partido-separacion-input">ó</div>
						  <input class="partido-gol-input" disabled="disabled">
						  <div class="equipo equipo-der"><?=$val->posicion2;?>º <?=$val->nombre2;?></div>
						  <div class="bandera"><img src="assets/img/banderas/16702.jpg" title="bandera"></div>
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
                <div class="partido partido-fase-final
                                        cuartos-1
                    " data-id="117">
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
                <div class="partido partido-fase-final
                                        cuartos-2
                    " data-id="118">
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
                <div class="partido partido-fase-final
                                        cuartos-3
                    " data-id="119">
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
                <div class="partido partido-fase-final
                                        cuartos-4
                    " data-id="120">
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