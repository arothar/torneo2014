select * from partidomundial where not idplayoff is null

select pe.idPlayoffEstructura, pe.idPlayoff, pe.idPlayoffPadre, pg.idGanador from playoffestructura pe
inner join playoffs p on pe.idplayoff= p.idplayoffs
inner join (
		select idPartidoMundial, CASE
			WHEN (golesLocal > golesVisitante) THEN idEquipoLocal
			WHEN (golesLocal < golesVisitante) THEN idEquipoVisitante
			else null end as idGanador,pm.idTorneo,
		p.idPlayoffs
		from partidomundial pm
		-- inner join playoffestructura pe on pm.idPlayoff = pe.idPlayoff
		inner join playoffs p on pm.idPlayoff = p.idPlayoffs
		where not golesLocal is null
			and p.idtipofinal = 8
	   ) pg on pg.idPlayOffs =  pe.idPlayoffPadre
where idTipoFinal=4


select idPartidoMundial, CASE
		WHEN (golesLocal > golesVisitante) THEN idEquipoLocal
		WHEN (golesLocal < golesVisitante) THEN idEquipoVisitante
		else null end as idGanador,pm.idTorneo,
	p.idPlayoffs
	from partidomundial pm
	-- inner join playoffestructura pe on pm.idPlayoff = pe.idPlayoff
	inner join playoffs p on pm.idPlayoff = p.idPlayoffs
	where not golesLocal is null
		and p.idtipofinal = 8



