UPDATE `ft_table`
SET `creation_date` = DATE_ADD(`creation_date`, INTERVAL 20 YEAR)
WHERE `id` > 5;

/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
** mysql -u root -p db_ade-verd -e "SELECT * FROM ft_table;"
*/
