select * from usuario where nombre like '%abregu%'
29

select pm.idPartidoMundial, el.nombre, ev.nombre from partidomundial pm
inner join equipo el on pm.idEquipoLocal = el.idequipo
inner join equipo ev on pm.idEquipoVisitante = ev.idequipo
order by idPartidoMundial
145

select * from usuariopartido

insert into usuariopartido (idUsuario,idPartido,golesLocal,golesVisitante, fechaUpdate) values(29,145,2,1,now())

