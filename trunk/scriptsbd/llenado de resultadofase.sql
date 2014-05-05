insert into resultadofase 
select t.idTorneo,t.idGrupo,idEquipo,t.posicion,puntosTotal from 
	(
	select * from (
		select @row_num := IF(@prev_value=idGrupo,@row_num+1,1) AS posicion,idTorneo,idGrupo,idEquipo,nombre,puntosTotal,@prev_value := idGrupo as a from 
		(
			select t.idTorneo,
				t.idGrupo,
				t.idEquipo,
				t.nombre, 
				sum(t.puntos) puntosTotal		
			from (
				select idTorneo, e.idGrupo, idEquipo, nombre, count(idEquipo) * 3 as puntos
				from equipo as e
				inner join (select CASE
						WHEN (golesLocal > golesVisitante) THEN idEquipoLocal
						WHEN (golesLocal < golesVisitante) THEN idEquipoVisitante
						else null end as idGanador,idTorneo
					from partidomundial
					where not golesLocal is null) as p on e.IdEquipo = p.idGanador 
				group by idEquipo
				union
				select idTorneo, e.idGrupo,idEquipo, nombre, count(pml.idPartidoMundial) as puntos
				from equipo as e
					inner join partidomundial pml on e.idEquipo = pml.idEquipoLocal or e.idEquipo = pml.idEquipoVisitante
				where (pml.golesVisitante= pml.golesLocal) and (not pml.golesLocal is null)
				group by idEquipo
				) as t
			group by t.idEquipo
			order by t.idGrupo, puntosTotal desc
		) as j,
		(SELECT @row_num := 1) x,
		(SELECT @prev_value := '') y
	) as tabla 
	where posicion < 3
	) as t
inner join playoffestructura pe on t.idGrupo=pe.idGrupo and t.posicion=pe.posicion;


select * from resultadofase

select * from partidomundial



