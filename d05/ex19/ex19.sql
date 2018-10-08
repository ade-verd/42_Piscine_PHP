SELECT ABS(DATEDIFF(MAX(`date`), MIN(`date`))) AS 'uptime' FROM member_history;

/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
*/
