/*
** Run before:
** mysql -u root -p db_ade-verd < resources/base-student.sql
*/

CREATE TABLE `ft_table` (
				`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				`login` VARCHAR(8) DEFAULT 'toto' NOT NULL,
				`group` ENUM('staff', 'student', 'other') NOT NULL,
				`creation_date` DATE NOT NULL); 

/*
** How to check:
** mysql -u root -p db_ade-verd < ex01.sql
** mysql -u root -p db_ade-verd -e "DESCRIBE ft_tables;"
*/
