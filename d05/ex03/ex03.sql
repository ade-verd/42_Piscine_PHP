INSERT INTO `ft_table` (`login`, `group`, `creation_date`)
SELECT `last_name`, 'other', DATE_FORMAT(`birthdate`, "%Y-%m-%d") FROM `user_card`
WHERE 
	LOWER(`last_name`) LIKE "%a%"
	AND LENGTH(`last_name`) < 9
ORDER BY `last_name` ASC
LIMIT 10;

/*
** How to check:
** mysql -u root -p db_ade-verd < ex02.sql
** mysql -u root -p db_ade-verd -e "SELECT * FROM ft_table;"
*/
