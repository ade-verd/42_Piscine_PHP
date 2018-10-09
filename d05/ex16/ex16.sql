SELECT COUNT(DISTINCT CONCAT(id_film, `date`)) FROM member_history
WHERE
	(`date` >= "2006-10-30" AND `date` <= "2007-07-27")
	OR (MONTH(`date`) = 12 AND DAY(`date`) = 24);

/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
*/
