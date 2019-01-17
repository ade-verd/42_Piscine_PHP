SELECT 	COUNT(*) AS 'nb_susc',
		FLOOR(AVG(price)) AS 'av_susc',
		MOD(SUM(duration_sub), 42) AS 'ft' FROM subscription;

/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
*/
