SELECT last_name, first_name FROM user_card
WHERE
	lower(last_name) REGEXP '[^a-z]+'
	OR
	lower(first_name) REGEXP '[^a-z]+'
ORDER BY last_name ASC, first_name ASC;
/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
*/
