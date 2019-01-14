SELECT `name` FROM distrib
WHERE
	id_distrib REGEXP '^(42|6[2-9]|71|88|89|90)$'
	OR
	`name` REGEXP '(.*[yY].*){2}'
LIMIT 2, 5;

/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
*/
