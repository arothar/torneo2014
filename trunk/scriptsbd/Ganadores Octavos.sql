


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



