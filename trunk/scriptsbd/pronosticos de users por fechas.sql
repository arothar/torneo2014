Select u.nombre, el.Nombre, up.golesLocal, ev.Nombre, up.golesVisitante 
From usuario u
Inner join usuariopartido up on u.idUsuario = up.idUsuario
inner join partidomundial p on up.idPartido = p.idPartidoMundial
inner join equipo el on p.idEquipoLocal = el.IdEquipo
inner join equipo ev on p.idEquipoVisitante = ev.IdEquipo
where u.activo = 1 and DATE_FORMAT(p.fechaPartido , '%d/%m/%Y')= '12/06/2014'