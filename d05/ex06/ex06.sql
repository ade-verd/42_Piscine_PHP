SELECT title, summary FROM film
WHERE
	LOWER(title) like "%vincent%"
	OR
	LOWER(summary) like "%vincent%"
ORDER BY id_film ASC;

/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
** mysql -u root -p db_ade-verd -e "SELECT * FROM ft_table;"
*/
