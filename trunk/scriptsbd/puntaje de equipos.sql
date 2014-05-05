set @rank=0;
SELECT @rank:=@rank+1 AS rank,COUNT(*) as ordercount
FROM partidomundial
GROUP BY idEquipoLocal ORDER BY rank asc;


select idEquipo, nombre, count(idEquipo) * 3
from equipo as e
inner join (select CASE
		WHEN (golesLocal > golesVisitante) THEN idEquipoLocal
		WHEN (golesLocal < golesVisitante) THEN idEquipoVisitante
		else null end as idGanador
	from partidomundial
	where not golesLocal is null) as p on e.IdEquipo = p.idGanador
group by idEquipo;
union
select idEquipo, nombre, count(idEquipo)
from equipo as e
	inner join partidomundial pml on e.idEquipo = pml.idEquipoLocal
	inner join partidomundial pmv on e.idEquipo = pmv.idEquipoVisitante
where (pml.golesVisitante= pml.golesLocal 
	or pmv.golesVisitante= pmv.golesLocal)
 	and (not pmv.golesLocal is null or not pml.golesLocal is null)
group by idEquipo;


select * from partidomundial where idEquipoLocal= 1 or idEquipoVisitante=1

