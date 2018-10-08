SELECT * FROM program_grid
WHERE
	(beginning_show >= "2006-10-30" AND beginning_show <= "2007-07-27")
	OR (MONTH(beginning_show) = 12 AND DAY(beginning_show) = 24);

/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
*/
