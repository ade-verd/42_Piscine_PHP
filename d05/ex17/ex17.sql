SELECT 	COUNT(id_member) AS 'nb_susc',
		FLOOR(AVG(price)) AS 'av_susc',
		MOD(SUM(duration_sub), 42) AS 'ft' FROM member
INNER JOIN subscription ON member.id_sub = subscription.id_sub;

/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
*/
