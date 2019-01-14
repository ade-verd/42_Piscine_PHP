SELECT floor_number AS 'floor', SUM(nb_seats) AS 'seats' FROM cinema
GROUP BY floor_number
ORDER BY seats DESC;

/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
*/
