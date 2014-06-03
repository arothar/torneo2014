          <div class="posiciones">
            <div class="posiciones-temporal">
              <div class="podio">
                <div class="primero">
                  <div class="medalla medalla-oro">
					<? if (isset($usuariosOrdenados[0])==1){
							echo $usuariosOrdenados[0]["puntos"];
						}
					?>
				  </div>
                  <div class="nombre nombre-primero">
						<span class="alineacion-nombre">
							<? if (isset($usuariosOrdenados[0])==1){
									echo $usuariosOrdenados[0]["username"];
								}
							?>
						</span>
				  </div>
                </div>
                <div class="segundo">
                  <div class="medalla medalla-plata">
					<? if (isset($usuariosOrdenados[1])==1){
							echo $usuariosOrdenados[1]["puntos"];
						}
					?>
				  </div>
                  <div class="nombre nombre-segundo">
						<span class="alineacion-nombre">
							<? if (isset($usuariosOrdenados[1])==1){
									echo $usuariosOrdenados[1]["username"];
								}
							?>
						</span>
				   </div>
                </div>
                <div class="tercero">
                  <div class="medalla medalla-bronce">
				  <? if (isset($usuariosOrdenados[2])==1){
						echo $usuariosOrdenados[2]["puntos"];
					}
				?>
				  </div>
                  <div class="nombre nombre-tercero">
						<span class="alineacion-nombre">
							<? if (isset($usuariosOrdenados[2])==1){
									echo $usuariosOrdenados[2]["username"];
								}
							?>
						</span>
				   </div>
                </div>
              </div>
              <div class="lista-resultados">
			  <? for ($i=3; $i < count($usuariosOrdenados); $i++){ ?>
                <div class="resultado">
                  <div class="puesto"><?=$i+1?></div>
                  <div class="nombre"><?=$usuariosOrdenados[$i]["username"]?></div>
                  <div class="puntaje"><?=$usuariosOrdenados[$i]["puntos"]?></div>
                </div>
			  <? } ?>
              </div>
            </div>
            <div class="posiciones-ronda">

            </div>
          </div>
          <div class="contenedor-premios">
            <div class="premios-globales">
              <div class="titulo">PREMIOS TABLA GLOBAL</div>
              <div class="premio">
                <div class="premio-1">
                  <div class="medalla"></div>
                  <div class="imagen"><img src="assets/img/700394.png" alt="Imagen primer premio"></div>
                  <div class="texto">TV LED Samsung 40”</div>
                </div>
                <div class="premio-2">
                  <div class="medalla"></div>
                  <div class="imagen"><img src="assets/img/878829.png" alt="Imagen primer premio"></div>
                  <div class="texto">Tablet Lenovo 8“</div>
                </div>
                <div class="premio-3">
                  <div class="medalla"></div>
                  <div class="imagen"><img src="assets/img/934849.png" alt="Imagen primer premio"></div>
                  <div class="texto">Cámara digital Kodak</div>
                </div>
                <div class="lista-premios">
                  <div class="premio-lista">
                    <div class="posicion">4</div>
                    <div class="texto">Camiseta selección Argentina</div>
                  </div>
                </div>
                   <div class="lista-premios">
                  <div class="premio-lista">
                    <div class="posicion">5</div>
                    <div class="texto">Camiseta selección Argentina</div>
                  </div>
                </div>
                   <div class="lista-premios">
                  <div class="premio-lista">
                    <div class="posicion">6</div>
                    <div class="texto">Pelota de fútbol N°5</div>
                  </div>
                </div>
                   <div class="lista-premios">
                  <div class="premio-lista">
                    <div class="posicion">7</div>
                    <div class="texto">Pelota de fútbol N°5</div>
                  </div>
                </div>
                   <div class="lista-premios">
                  <div class="premio-lista">
                    <div class="posicion">8</div>
                    <div class="texto">Pelota de fútbol N°5</div>
                  </div>
                </div>
                   <div class="lista-premios">
                  <div class="premio-lista">
                    <div class="posicion">9</div>
                    <div class="texto">Pelota de fútbol N°5</div>
                  </div>
                </div>
                   <div class="lista-premios">
                  <div class="premio-lista">
                    <div class="posicion">10</div>
                    <div class="texto">Pelota de fútbol N°5</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="hidden premios-globales-popup-assets/js">
              <div class="premios-globales" style="height:auto;">
                <div class="titulo">PREMIOS TABLA GLOBAL</div>
                <div class="premio">
                  <div class="premio-1">
                    <div class="medalla"></div>
                    <div class="imagen"><img src="assets/img/700394.png" alt="Imagen primer premio"></div>
                    <div class="texto">LCD 32</div>
                  </div>
                  <div class="premio-2">
                    <div class="medalla"></div>
                    <div class="imagen"><img src="assets/img/878829.png" alt="Imagen primer premio"></div>
                    <div class="texto">Camiseta de argentina</div>
                  </div>
                  <div class="premio-3">
                    <div class="medalla"></div>
                    <div class="imagen"><img src="assets/img/934849.png" alt="Imagen primer premio"></div>
                    <div class="texto">Pelota de futbol</div>
                  </div>
                  <div class="lista-premios">
                    <div class="premio-lista">
                      <div class="posicion">4</div>
                      <div class="texto">Pelota de futbol</div>
                    </div>
                    <div class="premio-lista">
                      <div class="posicion">5</div>
                      <div class="texto">Pelota de futbol</div>
                    </div>
                    <div class="premio-lista">
                      <div class="posicion">6</div>
                      <div class="texto">Pelota de futbol</div>
                    </div>
                    <div class="premio-lista">
                      <div class="posicion">7</div>
                      <div class="texto">Pelota de futbol</div>
                    </div>
                    <div class="premio-lista">
                      <div class="posicion">8</div>
                      <div class="texto">Pelota de futbol</div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            
            </div>
          </div>