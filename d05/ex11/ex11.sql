SELECT UPPER(last_name) AS "NAME", first_name, price FROM user_card
INNER JOIN member ON user_card.id_user = member.id_user_card
INNER JOIN subscription ON subscription.id_sub = member.id_sub
WHERE price > 42
ORDER BY last_name ASC, first_name ASC;


/*
** How to check:
** mysql -u root -p db_ade-verd < ex##.sql
*/
