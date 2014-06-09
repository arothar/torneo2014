DELIMITER $$

DROP PROCEDURE IF EXISTS `bdprode`.`sp_save_partidoMundialPlayoff`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_save_partidoMundialPlayoff`(in p_idPlayoffHijo int, in p_idPlayoffPadre int, in p_idEquipo int)
BEGIN
	
	   DECLARE idPartido int;
	   select idpartidomundial into idPartido from partidomundial where idPlayoff = p_idPlayoffHijo;
	 
	    IF idPartido is null THEN
		insert into partidomundial 
				(
				idEquipoLocal,
				idEquipoVisitante, 
				fechaPartido, 
				idPlayoffEstructura, 
				idplayoff, 
				idTorneo
				)
		VALUES 		(
				p_idEquipo,
				null,
				(select fecha from playoffs where idplayoffs = p_idPlayoffHijo), 
				(select idPlayoffEstructura from playoffestructura where idplayoff = p_idPlayoffHijo and posicion=1 and idPlayoffPadre=p_idPlayoffPadre),
				p_idPlayoffHijo ,
				1
				);
	    ELSE
		UPDATE partidomundial set  idEquipoVisitante = p_idEquipo
		WHERE idPartidoMundial = idPartido;
		
	    END IF;
    END$$

DELIMITER ;