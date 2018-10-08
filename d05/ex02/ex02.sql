INSERT INTO `ft_table` (`login`, `group`, `creation_date`)
VALUES	('loki', 'staff', '2013-05-01'),
		('scadoux', 'student', '2014-01-01'),
		('chap', 'staff', '2011-04-27'),
		('bamboo', 'staff', '2014-03-01'),
		('fantomet', 'staff', '2010-04-03');

/*
** How to check:
** mysql -u root -p db_ade-verd < ex02.sql
** mysql -u root -p db_ade-verd -e "SELECT * FROM ft_table;"
*/
