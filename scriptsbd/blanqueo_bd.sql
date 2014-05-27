-- Blanqueo de base de datos.

DELETE FROM partidomundial WHERE NOT idplayoff IS NULL;
UPDATE partidomundial SET golesLocal=NULL, golesVisitante=0;
SELECT * FROM  resultadofase;
DELETE FROM usuariopartido;
DELETE FROM usuario WHERE idUsuario > 1;
UPDATE usuario SET puntos=NULL;
