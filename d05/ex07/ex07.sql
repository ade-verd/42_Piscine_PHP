SELECT title, summary FROM film
WHERE
	title LIKE "%42%"
	OR
	summary LIKE "%42%"
ORDER BY duration ASC;

/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
*/
