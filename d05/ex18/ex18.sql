SELECT `name` FROM distrib
WHERE
	id_distrib REGEXP '^(42|6[2-9]|71|88|89|90)$'
	OR
	LOWER(`name`) REGEXP '^([^y]*)y[^y]*y([^y]*)$'
LIMIT 2, 5;

/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
*/
